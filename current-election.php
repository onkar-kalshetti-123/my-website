<?php
session_start();
error_reporting(0);
include ('includes/config.php');
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="theme-color" content="#3e454c">

<title>Online Voting System |Admin Current Election</title>

<!-- Font awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">
<!-- Sandstone Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Bootstrap Datatables -->
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
<!-- Bootstrap social button library -->
<link rel="stylesheet" href="css/bootstrap-social.css">
<!-- Bootstrap select -->
<link rel="stylesheet" href="css/bootstrap-select.css">
<!-- Bootstrap file input -->
<link rel="stylesheet" href="css/fileinput.min.css">
<!-- Awesome Bootstrap checkbox -->
<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
<!-- Admin Stye -->
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="./current-election.js"></script>
<style>
.errorWrap {
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #dd3d36;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
}

.succWrap {
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #5cb85c;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
}

.btn {
	margin: 30px 30px;
}
</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Current Election</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Election Details:</div>

							<table id="zctb"
								class="display table table-striped table-bordered table-hover"
								cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<th>Id</th>
										<th>Election type</th>
										<th>Start date</th>
										<th>End date</th>
										<th>Finished Status</th>
										<th>Voting Status</th>
										<th>Winner</th>
									</tr>
								</thead>

								<tbody>
<?php
$sql = "SELECT * FROM election WHERE finish_status='0'";
$result = $connect->query($sql);
$srno = 1;
$eid;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>						
										<tr>
										<td><?php echo $srno ;?></td>
										<?php $eid=$row["election_id"];?>
										<td><?php echo $row["election_id"] ;?></td>

										<td><?php echo $row["type"] ;?></td>
										<td><?php echo $row["start_date"] ;?></td>
										<td><?php echo $row["end_date"] ;?></td>

										<td><?php echo $row["finish_status"] ;?></td>
										<td><?php echo $row["voting_status"] ;?></td>
										<td><?php echo $row["winner"] ;?></td>

				
									</tr>
 <?php }}?>
										
										
									</tbody>
							</table>



						</div>



					</div>
				</div>
				<div class="row">
					<div class="col-md-12">



						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Election Actions:</div>
							<div class="panel-body">
								<div class="col-md-12 col-sm-offset-3">

									<button class="btn btn-primary" name="submit" type="submit"
										data-eid='<?php echo $eid?>'
										onclick="startVoting(this);">Start Voting</button>
									<button class="btn btn-primary" name="submit" type="submit"
										data-eid='<?php echo $eid?>'
										onclick="endVoting(this);">End Voting</button>
									<button class="btn btn-primary" name="submit" type="submit"
										data-eid='<?php echo $eid?>'
										onclick="declareResult(this);">Declare Result</button>
								</div>



							</div>




						</div>
					</div>


				</div>
			</div>
		</div>

	</div>
	</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>