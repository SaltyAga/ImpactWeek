<?php
class Friend_model extends CI_model
{
  
  public function add_post($post){

    $this->db->insert('posts', $post);

  }
  public function add_comm($com){

  $this->db->insert('comments', $com);
  }

  public function get_all_post()
  {
    return $this->db->query("
    SELECT
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
    comments.created_at AS comm_time ,
    comments.comment
    from comments
    join posts on comments.post_id = posts.post_id
    WHERE posts.post_id = $p_id
    ORDER BY comm_time DESC ;
    ")->result_array();
  }



}


?>