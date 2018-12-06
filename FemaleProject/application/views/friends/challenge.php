<div style="margin-top: 110px; " class="container">
    <div style="background-color:  #AACACD; color: white; padding: 25px; border-radius: 15px; margin: 15px;" class=" col-md-4 ">
      <h3><?php echo $this->session->userdata('first_name'); ?></h3>
        <form role="form" method="post" action="add_post">
            <div class="form-group">
                <input type="text" placeholder="The Title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" placeholder="your post" name="posty" class="form-control" style="height: 300px;"></textarea>
            </div>
            <input type='radio' name='public_private' value=0>
              <label>Public</label>
            <input type='radio'name='public_private' value=1>
              <label>Private</label>
            <input type="submit" value=" Add " class="btn btn-default" id="bt-add">
        </form>
    </div>
    <!-- add post + title -->
    <div style="background-color:  #AACACD; color:  #588d8d; padding: 25px; border-radius: 15px; margin: 15px;" class="col-md-7 ">
    <?php
    $user_id=$this->session->userdata('id');
    $user_admin=$this->session->userdata('admin');
     if($all_post){
     foreach ($all_post as $value)
     {
      echo "<hr>";
     ?>
<div style="background-color: #dfebec; border-radius: 10px; padding: 10px;">
     <!-- delete the post if this post for you or you are admin -->
     <div style="text-align: right;">
    <form method="post" action="<?php echo base_url('friends/delete_post'); ?>">
        <input name="post_id" type="hidden" value="<?php echo $value['post_id']; ?>">
        <input class="btn btn-default" type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete post"  >
    </form>
    </div>

    <!-- print all the titles with author of Post -->
    <img style="width: 15%;" class="img-circle img-thumbnail" src="/assets/images/profile/default.jpg" alt="Profile image example"/>
    <h3 style="margin-top: 0;"><?php echo $value['first_name'];?></h3>
    <h5><?php echo " at:".$value['pos_time']; ?></h5>
    <form style="display: inline;" method="post" action="<?php echo base_url('all_comm'); ?>">
      <input type="hidden" name="post_id" value="<?php  echo $value['post_id']; ?>" >
      <input type="hidden" name="post" value="<?php echo $value['post']; ?>" >
        <h4><?php echo $value['post_title']; ?></h4>
        <p>This sidebar is as tall as its content (the links), and is always shown.

Scroll this window to see the "fixed" effect.

Some text to enable scrolling.. Lorem ipsum dolor sit amet, illum definitiones no quo, maluisset concludaturque et eum, altera fabulas ut quo. Atqui causae gloriatur ius te, id agam omnis evertitur eum. Affert laboramus repudiandae nec et.....</p>
      <input class="btn btn-info" type="submit" value="See the post">
    </form>
    
  </div>
    <?php
    } 
    }
    ?>

  </div>
</div>
