<html class=""><head><meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style><style type="text/css"></style>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/bootstrap-dropdown.js"></script><meta name="robots" content="noindex"><link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://s.codepen.io/assets/reset/normalize.css">
<link rel="stylesheet" href="style.css">
<<<<<<< HEAD
<!--?php include("server.php"); ?-->
<style type="text/css"></style><style type="text/css"></style></head><body>
=======
<?php include("server.php"); ?>
<style type="text/css"></style></head><body>
>>>>>>> 83d40c5228aa94504b7b67ca0def7216177fb345
<div class="form">
      <div class="tab-content">
        <div id="addClass" style="display: block;">   
          <h1>Add a Class</h1>
          
<?php
if ( isset($_POST['class']) )
echo $_POST['class'];
if ( isset($_POST['semseter']) )
echo $_POST['semester'];
if ( isset($_POST['year']) )
echo $_POST['year'];
?>

          <form action="addClass.php" method="post" style="margin-bottom: 16px;">  
            <div style="margin-bottom: 20px;" class="field-wrap">
            <label class="">Class Name<span class="req">*</span>
            </label>
            <input name="class" type="class" required="" autocomplete="off">
          </div>
          <p class="forgot" style="margin-bottom: 0px;"><a>e.g. CS200</a></p>

      <div class="container" style="margin-bottom: 20px;">
      <div class="dropdown">
        <button name="semester" class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" aria-expanded="false">Semester
	<span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fall</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Winter</a></li>  
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Spring</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Summer</a></li>
        </ul>
      </div>
    </div>

	<div class="field-wrap" style="margin-bottom: 20px;">
            <label class="">Year<span class="req">*</span>
        </label>
        <input name="year" type="class" required="" autocomplete="off">
        </div><p class="forgot"><a>e.g. 2015</a></p>

	<button class="button button-block">Search</button>
	</form>

	<form action="selectClass.php" method="post">
	<button class="button button-block">Back</button>
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
