<?php
	require_once('config/config.php');
	$id = $_GET['v'];
	$select = "SELECT * FROM blog_post WHERE id='$id'";
	$query  = mysqli_query($con,$select);
	$result	= mysqli_fetch_array($query);
?>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Single post</li>
</ol>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="post-thumb">
						
					</div>
					<h1><?= $result['title'];?></h1>
					<p><?= $result['description']; ?></p>
					<br />
					<p>Author: <?= $result['author'];?> <span class="pull-right"> Published: <?= substr($result['created'],0,10);?> </span></p>
				</div>
			</div>
		</div>
	</div>
</div>