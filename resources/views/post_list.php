<!-- View stored in resources/views/greeting.blade.php -->

<html>
    <body>
	<a href="<?php echo action('LoginController@logout');?>">Logout</a><br>
        <h1>Posts</h1>
		<a href="<?php echo action('PostController@add');?>">Add Post</a><br>
		<table>
		<tr>
				<td>ID</td>
				<td>Title</td>
				<td>Body</td>
				<td>Date</td>
				<td>Action</td>
			</tr>
		<?php foreach($data as $val) { ?>
			
			<tr>
				<td><?php echo $val->id;?></td>
				<td><?php echo $val->title;?></td>
				<td><?php echo $val->body;?></td>
				<td><?php echo $val->created_at;?></td>
				<td>
				<?php if(Session::get('user_id')==$val->user_id || Session::get('role')==1) { ?>
				<a href="<?php echo url("post/edit/".$val->id);?>">Edit Post</a>
				<?php } ?>
				</td>
			</tr>
		<?php } ?>
		</table>
    </body>
</html>