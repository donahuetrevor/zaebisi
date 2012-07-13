<h1>Admin login</h1>

<div id="login-content">
    <form id="login" class="forms" name="login" action="" method="post">
        <label class="litem" for="username"><?=ucfirst(_('username'))?>:</label>
        <div><input id="username" name="username" type="text" value=""></div>
        <div class="clear"></div>
        <label class="litem" for="pass"><?=ucfirst(_('password'))?>:</label>
        <div><input id="pass" name="pass" type="password" value=""></div>
        <div class="clear"></div>
        <label class="ui-button ui-buttonBig submit">
            <input type="submit" name="submit" value="<?=ucfirst(_('login'))?>">
        </label>
        <div class="clear"></div>
    </form>
    <a href="<?=site_url('invited/')?>" id="invited">
        <span><?=_('invited')?>!</span>
    </a>
    <div class="clear"></div>
</div>




<?php /*

<div class='mainInfo'>

	<div class="pageTitle">Login</div>
    <div class="pageTitleBorder"></div>
	<p>Please login with your email address and password below.</p>
	
	<div id="infoMessage"><?php echo $message;?></div>
	
    <?php echo form_open("auth/login");?>
    	
      <p>
      	<label for="email">Email:</label>
      	<?php echo form_input($email);?>
      </p>
      
      <p>
      	<label for="password">Password:</label>
      	<?php echo form_input($password);?>
      </p>
      
      <p>
	      <label for="remember">Remember Me:</label>
	      <?php echo form_checkbox('remember', '1', FALSE);?>
	  </p>
      
      
      <p><?php echo form_submit('submit', 'Login');?></p>

      
    <?php echo form_close();?>

</div>
*/