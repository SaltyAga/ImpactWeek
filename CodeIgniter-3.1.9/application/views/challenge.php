<!DOCTYPE html>
<html>
<head>
  <title></title>

</head>
<body>
<form role="form" method="post" action="<?php echo base_url('friends/add_post'); ?>">
  <input type="text" placeholder="The Title" name="title">
  <textarea type="text" placeholder="your post" name="posty" ></textarea>
  <input type="submit" value=" Add ">
</form>



<div>

<?php
 if($all_post){
 foreach ($all_post as $value)
 {//echo $value['post_id']; die();

//$this->session->set_userdata('post_id', $value['post_id']);
//$this->session->set_userdata('post', $value['post']);
echo "<hr>";
echo $value['first_name']." at:".$value['pos_time']." The title is: ";
?>
<form style="display: inline;" method="post" action="<?php echo base_url('friends/all_comm'); ?>">
  <input type="hidden" name="post_id" value="<?php  echo $value['post_id']; ?>" >
  <input type="hidden" name="post" value="<?php echo $value['post']; ?>" >
  <input type="submit" value="<?php echo $value['post_title']; ?>">
</form>
<?php
} 
}
?>
</div>
</body>
</html>