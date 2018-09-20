<?php 
	require_once('config/config.php');
	//data submit to database
	$msg = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$title  = htmlentities($_POST['title'],ENT_QUOTES);
		$des    = htmlentities($_POST['description'],ENT_QUOTES);
		$author = "Mahbub";
		
		if(empty($title)){
			$msg .= "<li class='alert bg_color4'>". "Title is empty" . "</li>";
		}
		if(!$msg){
			$insert = "INSERT INTO blog_post (`title`,`description`,`author`) VALUES ('$title','$des','$author')";
			if(mysqli_query($con,$insert)){
				$msg .= "<li class='alert bg_color3'>". "Post Submitted" . "</li>";
			}else{
				$msg .="<li class='alert bg_color4'>". "Failed to submit this post" . "</li>";
			}
		}
		
	}
	
	//Data Fetch from database
	$sel = "SELECT * FROM blog_post ORDER BY id DESC";
	$qri = mysqli_query($con,$sel);

	
?>
<br /><br /><br /><br /><br />
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
							<input type="text" placeholder="Title"  class="form-control" name="title" id="title"/>
						</div>
						<div class="form-group">
							<label for="class_id">Description</label>
							<textarea name="description" id="description" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button type="submit"  name="create_class" id="create_class" class="btn btn-info">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-list"></i> Post list
					<div class="widget_buttons">
						<a class="dropdn" role="button" data-toggle="collapse" href="#cls" aria-expanded="true" aria-controls="cls"></a>
						<span id="classinfo_refresh"><i class="fa fa-refresh"></i></span>

					</div>
				</div>
				<div class="panel-body collapse in" id="cls" >
					<div class="overlay" ><span id="wloader"></span></div>
					<div id="loader" class="" style=""><img src="preloader.gif" alt="" /></div>
					
					<div id="display_data">
						<ul class="list-group">
						<?php while($res = mysqli_fetch_array($qri)){?>
						  <li class="list-group-item">
							<a href="single.php?v=<?= $res['id'];?> "><?= $res['title'];?> </a>
							<span class="pull-right">
								<a href="edit.php?e=<?= $res['id'];?> " ><i class="fa fa-edit"></i></a>
								<a href="delete.php?d=<?= $res['id'];?> " ><i class="fa fa-trash"></i></a>
							</span>
						  </li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
