<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
	<a href="<?php echo action('LoginController@logout');?>">Logout</a><br>
        <h1>Add New Post</h1>
		
		<form method="post" action="<?php echo action('PostController@store');?>">
		
			Title<input type="text" name="title"><?php echo $errors->first('title');?><br>
			Body<input type="text" name="body"><?php echo $errors->first('body');?><br>
			<input name="_token" type="hidden" value="<?php echo csrf_token();?>"/>

			<input type="submit" name="submit">
		</form>
    </body>
</html>