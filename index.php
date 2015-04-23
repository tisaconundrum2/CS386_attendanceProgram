<html class="">
   <head>
      <meta charset="UTF-8">
      <meta name="robots" content="noindex">
      <link rel="canonical" href="http://codepen.io/anon/pen/XJvKrY">
      <link href="http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://s.codepen.io/assets/reset/normalize.css">
      <link rel="stylesheet" href="style.css">
      <?php
         include("server.php");
         ?>
      <div class="form">
      <ul class="tab-group">
         <?php if (isset($_GET['p'])&&$_GET['p']=='l'){ ?>
         <li class="tab"><a href="#signup">Sign Up</a></li>
         <li class="tab active"><a href="#login">Log In</a></li>
         <?php } else { ?>
         <li class="tab active"><a href="#signup">Sign Up</a></li>
         <li class="tab"><a href="#login">Log In</a></li>
         <?php } ?>
      </ul>
      <div class="tab-content">
      <?php if (isset($_GET['p'])&&$_GET['p']=='l'){ ?>
      <div id="signup" style="display: none;">
         <?php } else { ?> 
         <div id="signup" style="display: block;">
            <?php } ?>
            <h1>Sign Up for Free</h1>
            <form action="signup.php" method="post">
               <div class="top-row">
                  <div class="field-wrap">
                     <label>
                     First Name<span class="req">*</span>
                     </label>
                     <input name="fname" type="text" required="" autocomplete="off">
                  </div>
                  <div class="field-wrap">
                     <label>
                     Last Name<span class="req">*</span>
                     </label>
                     <input name="lname" type="text" required="" autocomplete="off">
                  </div>
               </div>
               <div class="field-wrap">
                  <label>
                  Email Address<span class="req">*</span>
                  </label>
                  <input name="email" type="email" required="" autocomplete="off">
               </div>
               <div class="field-wrap">
                  <label>
                  Set A Password<span class="req">*</span>
                  </label>
                  <input name="password" type="password" required="" autocomplete="off">
               </div>
               <button name="submit"type="submit" class="button button-block">Get Started</button>
            </form>
         </div>
         <?php if (isset($_GET['p'])&&$_GET['p']=='l'){ ?>
         <div id="login" style="display: block;">
            <?php } else { ?> 
            <div id="login" style="display: none;">
               <?php } ?>
               <h1>Welcome Back!</h1>
               <form action="login.php" method="post">
                  <div class="field-wrap">
                     <label>
                     Email Address<span class="req">*</span>
                     </label>
                     <input name="email-r" type="email" required="" autocomplete="off">
                  </div>
                  <div class="field-wrap">
                     <label>
                     Password<span class="req">*</span>
                     </label>
                     <input name="password-r" type="password" required="" autocomplete="off">
                  </div>
                  <p class="forgot"><a href="#">Forgot Password?</a></p>
                  <button name="submit-r" class="button button-block">Log In</button>
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