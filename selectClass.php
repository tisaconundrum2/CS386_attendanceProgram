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
          
        <form action="/" id="closeup" method="post">
  	<button class="button button-block">CS 136</button>
        </form>

	<form action="/" id="closeup" method="post">
	<button class="button button-block">Add New Class</button>
	</form>

<form action="/" id="faraway" method="post">
<button class="button button-block">My Page</button>
</form>

<form action="logout.php" id="faraway" method="post">
<button class="button button-block">LogOut</button>
</form>
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