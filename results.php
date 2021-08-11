<?php
$connection = mysqli_connect("localhost:3307", "root", "", "voting");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Results</title>
<style type="text/css">
#navbar-result {
	background-color: #003153;
}
</style>
<!-- Stylesheets -->
<link rel="icon" href="../images/logo.png" type="image/*">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<link rel="stylesheet" type="text/css"
	href="../bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./style.css">
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
	crossorigin="anonymous">
<script
	src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
	integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
	crossorigin="anonymous"></script>
<script
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
	integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
	crossorigin="anonymous"></script>
<script type="text/javascript" src="./customjs.js"></script>
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="./s.css">
<script type="text/javascript" src="./assets/js/customjs.js"></script>
<!-- Stylesheets -->
</head>
<body>

	<!-- navigation -->
	<nav id="navbar-result" class="navbar navbar-expand-sm navClass">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#Navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="Navbar">
				<ul class="navbar-nav mr-auto menu">
					<li class="nav-item"><a class="nav-link" href="./voter-index.php"><i
							class="fa fa-home fa-sm"></i> Home</a></li>
					<li class="nav-item"><a class="nav-link"
						href="./active-elections.php"><i class="fa fa-poll"></i> Active
							Election</a></li>
					<li class="nav-item active"><a class="nav-link" href="results.php"><i
							class="fa fa-person-booth"></i> Results</a></li>
					<li class="nav-item prf"><a class="nav-link" href="#"><i
							class="fa fa-user fa-sm"></i> Profile</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- navigation -->
	<button class="bg-danger" id="exit" onclick="logout()">
		<i class="fa fa-sign-out-alt"></i> Logout
	</button>
	<!-- main content -->
	<div class="container">
		<div class="jumbotron bg-alert">
			<h2>Online Voting System - Results</h2>
			<!-- 			<h2> Results Of Current Election</h2> -->
		</div>
		<?php
$query = "SELECT voter.voter_id as 'vid',fname,lname,election_id, start_date, end_date, winner , type, finish_status FROM election join voter
            on voter_id=winner where election_id IN(select max(election_id) from election where finish_status='1');";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    ?>
		<div class="row">

			<div class="col-md-6 col-sm-12">

				<div class="card" style="width: 100%;">
					<img src="./Uploads/<?php echo $row['vid'];?>" class="card-img-top"
						alt="...">
					<div class="card-body">
						<h5 class="card-title"><?php echo $row['fname']." ".$row['lname'];?></h5>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button" type="button"
								data-bs-toggle="collapse" data-bs-target="#collapseOne"
								aria-expanded="true" aria-controls="collapseOne">Election Detail
							</button>
						</h2>
						<div id="collapseOne" class="accordion-collapse collapse show"
							aria-labelledby="headingOne" data-bs-parent="#accordionExample">
							<div class="accordion-body">
								<strong>Winner: </strong> <?php echo $row['fname']." ".$row['lname'];?> <br>
								<strong>Start date: </strong> <?php echo $row['start_date'];?> <br>
								<strong>End date:</strong> <?php echo $row['end_date'];?> <br>
							</div>
						</div>
					</div>

				</div>

				<p id="congrats-text">!!!Congrats To Candidate!!!</p>
			</div>
		</div>
		<?php }else{echo "<h1 id=\"result-details\">No results announced yet.</h1>";}?>

	</div>
	<!-- main content -->
	<script type="text/javascript" src="../jQuery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../popper/dist/popper.min.js"></script>
	<script type="text/javascript"
		src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./script.js"></script>

</body>
</html>