<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
        <h1>Login</h1>
		<?php echo Session::get('message');?>
		<form method="post" action="<?php echo action('LoginController@login');?>">
		
			Username<input type="text" name="username"><?php echo $errors->first('username');?><br>
			Password<input type="text" name="password"><?php echo $errors->first('password');?><br>
			<input name="_token" type="hidden" value="<?php echo csrf_token();?>"/>

			<input type="submit" name="submit">
		</form>
    </body>
</html>