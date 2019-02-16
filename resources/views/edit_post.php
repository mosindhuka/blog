

<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
	<a href="<?php echo action('LoginController@logout');?>">Logout</a><br>
        <h1>Edit Post</h1>
		
		<form method="post" action="<?php echo action('PostController@update');?>">
		
			Title<input type="text" name="title" value="<?php echo $data->title;?>"><?php echo $errors->first('title');?><br>
			Body<input type="text" name="body" value="<?php echo $data->body;?>"> <?php echo $errors->first('body');?><br>
			<input name="_token" type="hidden" value="<?php echo csrf_token();?>"/>
			<input name="id" type="hidden" value="<?php echo $data->id;?>"/>
			<input type="submit" name="submit">
		</form>
    </body>
</html>