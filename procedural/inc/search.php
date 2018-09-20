<?php
	require_once('config/config.php');
	$search = $_GET['field'];
	$select = "SELECT * FROM blog_post WHERE title LIKE '%".$search."%' ";

	$query  = mysqli_query($con,$select);
?>

<?php
	
	
?>
<ol class="breadcrumb">
  <li><a href="index.php">Home</a></li>
  <li>Single post</li>
</ol>
<div class="col-md-12">
	<div class="display-error" >
		<strong>You searched for - </strong>
		<div class="error_msg">
			<ul class="list-group">
				<?= $search; ?>
			</ul>
		</div>
		
	</div>
</div>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-body">
					<?php while($res = mysqli_fetch_array($query)){?>
					<li><a href="single.php?v=<?= $res['id']; ?>"><?= $res['title']; ?></a></li>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>