<?php 
class Friends extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Friend');
	}

	public function index()
	{
		if ($this->session->userdata('id') !== null) {
        	redirect('all_posts');
        } else {
        	$this->load->view('/friends/index');
        }
	}

	public function registration()
	{
        $post = $this->input->post(NULL, true);
		$this->load->model('Friend');
		$result = $this->Friend->validate_registration($post);
		if ($result == 'valid') {
			$this->load->model('Friend');
			$this->Friend->insert_user($post);
			redirect('friends');
		} else {
			$this->load->view('/friends/index');
		}
	}

	public function login()
	{
        $post = $this->input->post(NULL, true);
		$this->load->model('Friend');
		$result = $this->Friend->validate_login($post);
		if ($result == 'valid') {
			redirect('all_posts');
		} else {
			$this->load->view('friends/index');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('http://localhost');
	}


	public function members()
		{
	        $this->load->model('Friend');
	        $users = $this->Friend->get_all_users();
	        $this->load->view('friends/friends_page', ['users' => $users]);
		}

			public function friend_request()
		{
	        $post = $this->input->post(NULL, true);
	        $this->load->model('Friend');
	        $this->Friend->friend_request($post);
	        redirect('members');
		}
		public function friend_profile()
		{
	        $post = $this->input->post(NULL, true);
	        
	        if(count($post) !== 0){
		        $this->session->set_userdata('profile_id', $post['profile_id']);
		    }
		        $this->load->model('Friend');
		        $profile = $this->Friend->friend_profile();

	        $this->load->view('friends/friend_profile', ['profile' => $profile]);
		}
		public function show_friends()
		{
			$this->load->model('Friend');
		    $friends = $this->Friend->get_friends();
		    // var_dump($friends);
		    // die();
		    $this->load->view('friends/friends', ['friends' => $friends]);
		}
		public function profile()
		{
			$this->load->model('Friend');
		    $profile = $this->Friend->get_profile();
		    // var_dump($profile);
		    // die();
		    $this->load->view('friends/profile', ['profile' => $profile]);
		}
		public function my_friends()
		{
			$this->load->model('Friend');
		    $friends = $this->Friend->get_my_friends();
		    // var_dump($friends);
		    // die();
		    $this->load->view('friends/myfriends', ['friends' => $friends]);
		}

		


  	public function add_post()
  	{
  		$this->form_validation->set_rules('posty','post','required');
  		if ($this->form_validation->run() == FALSE)
      	{
			redirect('all_posts');
      	}
      	else
      	{
			$post=array(
			'post_title'=>$this->input->post('title'),
			'post'=>$this->input->post('posty'),
/*@*/		'user_id'=>$this->session->userdata('id')   // we need here the user id 
		);                         
	    $this->Friend->add_post($post);
	    redirect('all_posts');
	    }
	}

    public function all_posts()
    {
	    $all_data_p['all_post']=$this->Friend->get_all_posts();
	    $this->load->view('friends/challenge', $all_data_p );
  	}

	public function add_comm()
	{
	    $this->form_validation->set_rules('comment','Comment','required'); 
	    if ($this->form_validation->run() == FALSE)
    	{
      		redirect('all_comm');
    	}
    	else
    	{         
		    $post_id=$this->input->post('post_id');
		    $this->session->set_userdata('post_id',$post_id);
		    $comm=array(
		    'comment'=>$this->input->post('comment'),
		    'post_id'=>$post_id,
		    'user_id'=>$this->input->post('user_id')
		    );                         
		    $this->Friend->add_comm($comm);
		    redirect('all_comm');
    	}
  	}

  	public function all_comm()
  	{
    	$p_id=$this->input->post('post_id');
    	if(!$p_id)
      	{
        	$p_id=$this->session->userdata('post_id');
      	}
    	$this->session->set_userdata('post_id',$p_id);
    	$post_main=$this->input->post('post');
    
    	if($post_main)
      	{
        	$this->session->set_userdata('post_main',$post_main);
      	}
    	$all_data_c['all_comm']=$this->Friend->get_all_comm($p_id);
    	$post_data = $this->Friend->get_all_comm($p_id);
    	$this->load->view('friends/comments', $all_data_c);
  	}

  	public function delete_comm()
        {
          	$comm_id=$this->input->post('comm_id');
          	$this->Friend->delete_comm($comm_id);
          	redirect('all_comm');
        }

  	public function delete_post()
        {
          	$post_id=$this->input->post('post_id');
          	$this->Friend->delete_post($post_id);
          	redirect('all_posts');
        }


}