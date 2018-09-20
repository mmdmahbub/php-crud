<?php
	require_once('config/config.php');
	$id = $_GET['e'];
	$select = "SELECT * FROM blog_post WHERE id='$id'";
	$query  = mysqli_query($con,$select);
	$result	= mysqli_fetch_array($query);
?>

<?php
	$msg = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$title = htmlentities($_POST['title'],ENT_QUOTES);
		$des   = htmlentities($_POST['description'],ENT_QUOTES);
		if(empty($title)){
			$msg .= "<li class='alert bg_color4'>". "Title is empty" . "</li>";
		}
		if(!$msg){
			$update = "UPDATE blog_post SET `title`='$title', `description`='$des' WHERE id='$id'";
			if(mysqli_query($con,$update)){
				$msg .= "<li class='alert bg_color3'>". "Post updated" . "</li>";
			}
		}
	}
?>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Single post</li>
</ol>
<div class="col-md-12">
	<div class="display-error" >
		<div class="error_msg">
			<ul class="list-group">
				<?= $msg; ?>
			</ul>
		</div>
		
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-plus"></i> Form</div>
				<div class="panel-body">
					<form action="<?php $_SERVER['PHP_SELF']?>" method="post" id="create_class">
						<div class="form-group">
							<label for="class_name">Post title</label>
							<input type="text" placeholder="Title" value="<?= $result['title']; ?>" class="form-control" name="title" id="title"/>
						</div>
						<div class="form-group">
							<label for="class_id">Description</label>
							<textarea name="description"  id="description" class="form-control">
								<?= $result['description']; ?>
							</textarea>
						</div>
						<div class="form-group">
							<button type="submit"  name="create_class" id="create_class" class="btn btn-info">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>