<html class=""><head><meta charset="UTF-8"><meta name="robots" content="noindex"><link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
<link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://s.codepen.io/assets/reset/normalize.css">
<link rel="stylesheet" href="style.css">

<?php include("server.php"); ?>

<style type="text/css"></style></head><body>
<div class="form">
      <div class="tab-content">
        <div id="enterKey" style="display: block;">   
          <h1>
<?php if(is_prof($_SESSION['user'])) { ?>
Set Keyword for 
<?php } else { ?>
Enter Keyword for 
<?php } 
$result=$mysqli->query("select c_number from se_class where c_id = $_GET[id]");
$row=$result->fetch_array(MYSQLI_NUM);
echo $row[0];
?>
</h1>
<?php
          echo '<form action="submitKeyword.php?id='.$_GET['id'].'" method="post">';
?>
          <div class="field-wrap">
            <label class="">Keyword<span class="req">*</span>
            </label>
            <input name="key" type="class" required="" autocomplete="off">
          </div>
          
<?php if(is_prof($_SESSION['user'])) { ?>
	  <button class="button button-block">Set Keyword</button>
<?php } else { ?>
          <button class="button button-block">Verify my Attendance</button>
<?php } ?>
          </form>
<?php if(is_prof($_SESSION['user'])) {
	echo '<form action="viewReport.php?id='.$_GET['id'].'" method="post" style="margin-top: 16px;">';
        echo '<button class="button button-block">View Report</button>';
        echo '</form>';
}
?>
	       <form action="selectClass.php" method="post" style="margin-top: 16px;">
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
