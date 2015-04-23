<html class="">
   <head>
      <meta charset="UTF-8">
      <meta name="robots" content="noindex">
      <link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
      <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://s.codepen.io/assets/reset/normalize.css">
      <link rel="stylesheet" href="style.css">
      <style type="text/css"></style>
      <style type="text/css"></style>
   </head>
<?php include("server.php"); ?>
   <body>
      <div class="form">
         <div class="tab-content">
            <div id="enterKey" style="display: block;">
               <h1>View User</h1>
               
               <div class="field-wrap">
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$result=$mysqli->query("select u_id, u_lname, u_fname, u_email, u_privlidge from se_user where u_id=$_GET[id]");
if(!$result){
	echo "</br>failed";
	echo $mysqli->error;
}
$fetch = $result->fetch_assoc();
	echo '<p class="forgot" style="color: #FFFFFF;" span="left-align">'.$fetch['u_fname'].' '.$fetch['u_lname'].'</p>';
	echo '<p class="forgot" style="color: #FFFFFF;" span="left-align">'.$fetch['u_email'].'</p>';
?>
               </div>
<?php if(is_prof($_SESSION['user']) && $fetch['u_privlidge']=='n'){
		echo '<form action="promoteUser.php?id='.$_GET['id'].'" method="post">';
                  echo '<button class="button button-block">Promote to Professor</button>';
               echo '</form>';
}
?>
		<form action="selectClass.php" method="post">
                  <button class="button button-block">Back</button>
               </form>
            </div>
         </div>
         <!-- tab-content -->
      </div>
      <!-- /form -->
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script>
         $('.form').find('input, textarea').on('keyup blur focus', function (e) {
             var $this = $(this), label = $this.prev('label');
             if (e.type === 'keyup') {
                 if ($this.val() === '') {
                     label.removeClass('active highlight');
                 } else {
                     label.addClass('active highlight');
                 }
             } else if (e.type === 'blur') {
                 if ($this.val() === '') {
                     label.removeClass('active highlight');
                 } else {
                     label.removeClass('highlight');
                 }
             } else if (e.type === 'focus') {
                 if ($this.val() === '') {
                     label.removeClass('highlight');
                 } else if ($this.val() !== '') {
                     label.addClass('highlight');
                 }
             }
         });
         $('.tab a').on('click', function (e) {
             e.preventDefault();
             $(this).parent().addClass('active');
             $(this).parent().siblings().removeClass('active');
             target = $(this).attr('href');
             $('.tab-content > div').not(target).hide();
             $(target).fadeIn(600);
         });
         //@ sourceURL=pen.js
      </script>
      <script src="http://codepen.io/assets/editor/live/css_live_reload_init.js"></script>
   </body>
</html>
