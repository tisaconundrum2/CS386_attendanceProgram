<html class=""><head><meta charset="UTF-8"><meta name="robots" content="noindex"><link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://s.codepen.io/assets/reset/normalize.css">
<link rel="stylesheet" href="style.css">
<?php include("server.php"); ?>
<style type="text/css"></style></head><body>
<div class="form">
  
      <div class="tab-content">
        
        <div id="selClass" style="display: block;">   
          <h1>E Attendance</h1>
<?php
$result=$mysqli->query("select u_fname, u_lname from se_user where u_id='$_SESSION[user]'");
$fetch = $result->fetch_array(MYSQLI_NUM);

	echo '<p class="forgot" style="margin-bottom: 0px; color: #FFFFFF;"><a></a>'.$fetch[1].' '.$fetch[0].'</p>';
          

$result=$mysqli->query("select c_id, c_title, c_number from se_uc natural join se_class where u_id ='$_SESSION[user]'");
while ( $fetch = $result->fetch_assoc() ) { 
	echo '<form action="/" method="post" style="margin-bottom: 0px;">';
  	echo '<button class="button button-block">('.$fetch['c_number'].') '.$fetch['c_title'].'</button>';
	echo '</form>';
} $result->free();
?>
	
	<form action="addClass.php" >
	<button class="button button-block" style="margin-top: 16px;">
<?php
if (is_prof($_SESSION['user']))
	echo "Create New Class";
else
	echo "Add New Class";
?>

</button>
  	</form>

<form action="/" method="post">
<button class="button button-block">My Page</button>
</form>

<form action="logout.php" method="post">
<button class="button button-block">LogOut</button>
</form>


        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
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

</body></html>
