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
               <h1>View Report</h1>
               
               <div class="field-wrap">
<?php
$result=$mysqli->query("select u_id, u_lname, count(*) x from se_keyword natural join se_uc natural join se_user where c_id =$_GET[id] and u_id !=(select u_professor from se_class where c_id=$_GET[id]) group by u_id order by u_lname");
if(!$result){
	echo "</br>failed";
	echo $mysqli->error;
}
while ( $fetch = $result->fetch_assoc() ) {
	$subresult=$mysqli->query("select u_lname, u_fname from se_user where u_id=$fetch[u_id]");
	$row=$subresult->fetch_array(MYSQLI_NUM);
	echo '<a href="userPage.php?id='.$fetch['u_id'].'">'.$row[0].', '.$row[1].'</a>      <p class="forgot" style="margin-bottom: 0px; color: #FFFFFF;" span="right-align">'.$fetch['x'].'</p>';
	$subresult->free();
} $result->free();
?>
               </div>
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
