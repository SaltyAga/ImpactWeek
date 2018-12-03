<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<? echo base_url('assets/css/style4.css');?>">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-fixed-top sticky" id="navbar">
    <div class="nav-container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand" ><img src="/assets/logos/Logo_White.png" alt="logo" id="logo"></a>
                <button class="navbar-toggle" data-toggle ="collapse" data-target =".navHeaderCollapse">
                    <span class="glyphicon glyphicon-menu-hamburger" style="color:white; font-size:35px;"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">  
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Events</a></li>
                    <li><a href="all_posts">Forum</a></li>
                    <li><a href="members">Friends</a></li>
                    <li><a href="profile">Profile</a></li>
                    <li><a href="">Contact</a></li> 
                    <button class="btn" id="button"><a href="logout">Logout</a></button>
                </ul>
            </div>    
    </nav> 
    </div>
    <div class="post-container col-12 col-md-8 col-md-offset-4">
        <form role="form" method="post" action="<?php echo base_url('friends/add_post'); ?>">
            <div class="form-group">
                <input type="text" placeholder="The Title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <textarea type="text" placeholder="your post" name="posty" class="form-control"></textarea>
            </div>
            <input type="submit" value=" Add " class="btn btn-default" id="bt-add">
        </form>
    </div>
    <!-- add post + title -->
    <?php
    $user_id=$this->session->userdata('id');
/*@*/ $user_admin=$this->session->userdata('admin'); //we need here to know if this user admin or not. 
     if($all_post){
     foreach ($all_post as $value)
     {echo "<hr>";
     ?>

     <!-- delete the post if this post for you or you are admin -->
    <form method="post" action="<?php echo base_url('friends/delete_post'); ?>">
        <input name="post_id" type="hidden" value="<?php echo $value['post_id']; ?>">
        <input type="<?php if( ($user_admin == 1 )||($value['user_id']==$user_id) ) {echo 'submit';}else{echo 'hidden';} ?>" value="Delete post"  >
    </form>

    <!-- print all the titles with author of Post -->
    <?php
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
</body>
</html>