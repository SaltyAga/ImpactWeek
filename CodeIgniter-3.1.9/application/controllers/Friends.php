<?php

class Friends extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Friend_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
        {
        redirect('friends/all_posts');
        }
  public function add_post()
  {
  	$this->form_validation->set_rules('posty','post','required');

  	if ($this->form_validation->run() == FALSE)
      {
		redirect('friends/all_posts');
      }
      else
      {
		$post=array(
		'post_title'=>$this->input->post('title'),
		'post'=>$this->input->post('posty'),
/*@*/			'user_id'=>1   // we need here the user id 
		);                         
    $this->Friend_model->add_post($post);
    redirect('friends/all_posts');
    }
	}

  public function all_posts()
  {

    $all_data_p['all_post']=$this->Friend_model->get_all_post();
    $this->load->view('challenge', $all_data_p );
    //redirect('friends/all_comments');
  }

  public function add_comm()
  {
    $this->form_validation->set_rules('comment','Comment','required'); 

    if ($this->form_validation->run() == FALSE)
    {
      redirect('friends/all_comm');
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
      $this->Friend_model->add_comm($comm);
      redirect('friends/all_comm');
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
    $all_data_c['all_comm']=$this->Friend_model->get_all_comm($p_id);
    $this->load->view('comments', $all_data_c);
  }




}


?>