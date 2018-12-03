<?php
class Friend extends CI_Model {
	public function validate_registration($post)
	{
		$this->form_validation->set_data($post);
		
		//----------------first name validation-------
		$this->form_validation->set_rules('first_name', $post['first_name'], 'trim|required|alpha', 
			array('required'=>'Please fill in First Name field!', 
			'alpha'=>'No numbers please!'));
		//----------------last name validation-------
		$this->form_validation->set_rules('last_name', $post['last_name'], 'trim|required|alpha', 
			array('required'=>'Please fill in Last Name field!', 
			'alpha'=>'No numbers please!'));
		//-----------------valid_email----------------------
		$this->form_validation->set_rules('email', $post['email'], 'trim|required|valid_email|is_unique[users.email]', 
			array('required'=>'Please fill in Email field!', 
			'valid_email'=>'Please check if your email is correct (includes @, . etc)', 'is_unique'=>'This email already exists'));
		//--------------password length validation----------------
		$this->form_validation->set_rules('password', $post['password'], 'trim|required|min_length[8]', 
			array('required'=>'Please fill in Password field!', 
			'min_length'=>'Your password should contain at least 8 characters'));
		//-----------confirm password validation-------------------
		$this->form_validation->set_rules('confirm_password', $post['confirm_password'], 'trim|required|matches[password]', 
			array('required'=>'Please fill in Confirm Password field!', 
			'matches'=>'You entered different passwords'));

		if ($this->form_validation->run())
		{
			return "valid";
		}
	}

	//---------------Login validation (optional)------------
		public function validate_login($post)
	{
		$this->form_validation->set_data($post);
		$this->session->unset_userdata('error_email_log');
		$this->session->unset_userdata('error_pass_log');
		$email = $post['email_log'];
		$query = $this->db->query("SELECT user_id FROM users WHERE email='{$email}'");
		$id_check = $query->row();

		if (!isset($id_check)) {
			$this->session->set_userdata('error_email_log', 'Please, register first');
		} else {
			$query = $this->db->query("SELECT password FROM users WHERE email='{$email}'");
			$pass = $query->row();
			$query = $this->db->query("SELECT salt FROM users WHERE email='{$email}'");
			$salt = $query->row();
			if ($pass->password != md5($post['password_log'] . $salt->salt)) {
				$this->session->set_userdata('email_log', $post['email_log']);
				$this->session->set_userdata('error_pass_log', 'User/password combination is incorrect');

			} else {
				$query = $this->db->query("SELECT * FROM users WHERE email='{$email}'");
				foreach ($query->result_array() as $row) {
					$fn = $row['first_name'];
					$ln = $row['last_name'];
					$em = $row['email'];
					$id = $row['user_id'];
					$admin = $row['user_admin'];
				}
				$this->session->set_userdata('first_name', $fn);
				$this->session->set_userdata('last_name', $ln);
				$this->session->set_userdata('email', $em);
				$this->session->set_userdata('id', $id);
				$this->session->set_userdata('admin', $admin);
				return "valid";
			}
		}
	}

	//-------------insert user------------------
		public function insert_user($post)
	{
		$this->form_validation->set_data($post);
		$query = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$salt = bin2hex(openssl_random_pseudo_bytes(22));
		$values = [$post['first_name'], $post['last_name'], $post['email'], md5($post['password'] . $salt), $salt,
		date("Y-m-d, H:i:s"), date("Y-m-d, H:i:s")];
		$this->db->query($query, $values);
	}

	public function get_all_users()
	{	
		return $this->db->query("SELECT * FROM users")->
		result_array();
	}

		public function friend_request($post)
	{	
		$query = "INSERT INTO requests (from_user, to_user) VALUES (?, ?)";
		$values = [$this->session->userdata('id'), $post['request_id']];
		$this->db->query($query, $values);
	}
	public function friend_profile()
	{	
		$query = "SELECT * FROM users WHERE user_id=?";
		$values = [$this->session->userdata('profile_id')];
		return $this->db->query($query, $values)->row_array();
	}
	public function get_friends()
	{	
		$query = "SELECT * FROM users JOIN friends ON 
		users.user_id = friends.friend_id WHERE friends.user_id=?";
		$values = [$this->session->userdata('profile_id')];
		return $this->db->query($query, $values)->result_array();
	}
	public function get_my_friends()
	{	
		$query = "SELECT * FROM users JOIN friends ON 
		users.user_id = friends.friend_id WHERE friends.user_id=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->result_array();
	}

	public function get_profile()
	{	
		$query = "SELECT * FROM users WHERE user_id=?";
		$values = [$this->session->userdata('id')];
		return $this->db->query($query, $values)->row_array();
	}


	public function add_post($post)
	{
   		$this->db->insert('posts', $post);
  	}

  	public function add_comm($com)
  	{
 		$this->db->insert('comments', $com);
  	}

  	public function get_all_posts()
  	{
	    return $this->db->query("
	    SELECT
	    users.user_id,
	    users.user_admin,
	    users.first_name,
	    posts.post_id ,
	    posts.post_title,
	    posts.post,
	    posts.created_at AS pos_time ,
	    posts.updated_at AS pos_up_time
	    from users
	    join posts
	    on users.user_id = posts.user_id
	    ORDER BY pos_time DESC 
	    ")->result_array();
  	}

  	public function get_all_comm($p_id)
  	{
	    return $this->db->query("
	    SELECT 
	    users.user_id,
	    users.first_name,
	    users.user_admin,
	    posts.post_title,
	    posts.post,
	    comments.comment_id,
	    comments.created_at AS comm_time ,
	    comments.comment
	    from comments
	    join posts on comments.post_id = posts.post_id
	    join users on comments.user_id = users.user_id
	    WHERE posts.post_id = $p_id
	    ORDER BY comm_time DESC ;
	    ")->result_array();
  	}
  
  	public function delete_comm($id)
  	{
      	$this->db->query("
        DELETE from comments
        WHERE comment_id = $id ;
     	");
    }
  	public function delete_post($id)
  	{
    	$this->db->query("
        DELETE from posts
        WHERE post_id = $id ;
    	");
  }
}