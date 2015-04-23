<html class="">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <style type="text/css"></style>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <script src="js/bootstrap-dropdown.js"></script>
      <meta name="robots" content="noindex">
      <link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
      <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="style.css">
      <style type="text/css"></style>
<?php include("server.php"); ?>
   </head>
   <body>
      <div class="form">
         <div class="tab-content">
            <div id="addClass" style="display: block;">
               <h1>
<?php
if (is_prof($_SESSION['user']))
	echo "Create a Class";
else
	echo "Add a Class";
?>
		</h1>
<?php 

if(isset($_POST['classno'])&&isset($_POST['semester'])&&isset($_POST['year'])){
	$class=$_POST['classno'];
	$semester=$_POST['semester'];
	$year=$_POST['year'];

	$result=$mysqli->query("select c_id, c_times, u_lname from se_class left join se_user on se_class.u_professor=se_user.u_id where c_number='$class' and c_semester='$semester$year'");
	while ( $fetch = $result->fetch_assoc() ) { 
		echo ' <form action="submitAddition.php?id='.$fetch['c_id'].'" method="post" style="margin-bottom: 0px;">';
  		echo '<button class="button button-block">'.$fetch['u_lname'].' ('.$fetch['c_times'].')</button>';
		echo '</form>';
	}
	if($result)
		echo '</br></br>';
$result->free();
}

if(is_prof($_SESSION['user'])){ ?>
               <form action="createClass.php" method="post" style="margin-bottom: 16px;">
<?php } else { ?>
	       <form action="addClass.php" method="post" style="margin-bottom: 16px;">
<?php }

if(is_prof($_SESSION['user'])){
?>
		<div style="margin-bottom: 20px;" class="field-wrap">
                     <label class="">Class Title<span class="req">*</span>
                     </label>
                     <input name="title" type="class" required="" autocomplete="off">
                  </div>
                  <p class="forgot" style="margin-bottom: 0px;"><a>e.g. Introduction to Computers</a></p>
		  </br>
<?php } ?>
                  <div style="margin-bottom: 20px;" class="field-wrap">
                     <label class="">Class Number<span class="req">*</span>
                     </label>
                     <input name="classno" type="class" required="" autocomplete="off">
                  </div>
                  <p class="forgot" style="margin-bottom: 0px;"><a>e.g. CS200</a></p>
		  </br>
                  <div class="container" style="
                     margin-bottom: 20px;
                     ">
                     <div class="dropdown">
                        <select name="semester" style="display: block">
                           <option>FALL</option>
                           <option>WINTER</option>
                           <option>SPRING</option>
                           <option>SUMMER</option>
                        </select>
                     </div>
                  </div>
                  <div class="field-wrap" style="margin-bottom: 20px;">
                     <label class="">Year<span class="req">*</span>
                     </label>
                     <input name="year" type="class" required="" autocomplete="off">
                  </div>
                  <p class="forgot"><a>e.g. 2015</a></p>
<?php if(is_prof($_SESSION['user'])){ ?>
		  <div class="field-wrap" style="margin-bottom: 20px;">
                     <label class="">Time<span class="req">*</span>
                     </label>
                     <input name="time" type="class" required="" autocomplete="off">
                  </div>
                  <p class="forgot"><a>e.g. MWF 1:00-2:35</a></p>
<?php } ?>
                  <button class="button button-block">
<?php if(is_prof($_SESSION['user'])){ ?>
			Create
<?php } else { ?>
			Search
<?php } ?>	  </button>
               </form>
               <form action="selectClass.php" method="post" style="margin-top: 16px;">
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
