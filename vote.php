<?php
$connection = mysqli_connect("localhost:3307", "root", "", "voting");
if (! empty($_GET) && isset($_GET['election_id']) && isset($_GET['voter_id'])) {
    $eid = $_GET['election_id'];
    $vid = $_GET['voter_id'];
    $query = "select * from voting 
              where election_id='$eid' and voter_id='$vid' and voting_status='1';";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        echo "You have already voted for this election. See results <a href=\"./results.php\">here</a>";
        return;
    }
}
?>

<?php
if (! empty($_GET) && isset($_GET['election_id']) && isset($_GET['candidate_id']) && isset($_GET['voter_id'])) {
    $eid = $_GET['election_id'];
    $vid = $_GET['voter_id'];
    $cid = $_GET['candidate_id'];
    $query = "insert into voting values('$eid','$vid','1');
        ";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $query = "update result set vote_count=vote_count+1 where election_id='$eid' and voter_id='$cid';";
        $result = mysqli_query($connection, $query);
        if ($result) {
            echo "Voted successfully.";
        } else {
            echo "Something went wrong.";
        }
    } else {
        echo "Something went wrong.";
        // echo "<script>window.open('./vote.php?election_id'+$eid,'_self')</script>";
    }
    return;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width,initial-scale=1,shrink-to-fit=no">
<title>Home</title>
<style type="text/css">
#navbar-voter {
	background-color: #003153;
}
</style>
<!-- Stylesheets -->
<link rel="icon" href="./assets/images/logo.png" type="image/*">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<link rel="stylesheet" type="text/css"
	href="../bootstrap/dist/css/bootstrap.min.css">

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
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
<link rel="stylesheet" type="text/css" href="./s.css">
<script type="text/javascript" src="./assets/js/customjs.js"></script>
<!-- Stylesheets -->
</head>
<body>
	<button class="bg-danger" id="exit" onclick="logout()">
		<i class="fa fa-sign-out-alt"></i> Logout
	</button>
	<!-- main content -->
	<div class="container">
		<div class="jumbotron bg-alert">
			<h2>Online Voting System - Voting Panel</h2>
		</div>
		<div class="row">

		<?php
$eid = $_GET['election_id'];
$query = "select fname,application_status,lname,info,department,candidate.voter_id as 'id' from candidate,voter 
where candidate.voter_id=voter.voter_id and candidate.election_id='$eid';
        ";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['application_status'] == "1") {
            // PHP pause
            ?>
		
			<div class="col-lg-4 col-md-6 col-12">
				<div class="card bg-warning">
					<div class="row">
						<div class="col-12">
							<img alt="profile" src="./Uploads/<?php echo $row['id']?>"
								class="profile-picture">
						</div>
						<div class="col-12">
							<strong>Name: </strong><?php echo $row['fname']." ".$row['lname'] ?><br>
							<strong>Department: </strong><?php echo $row['department']?><br>
							<strong>Candidate ID: </strong><?php echo $row['id'] ?><br>
						</div>
						<button type="button" class="btn btn-primary btn-lg btn-vote"
							data-election-id='<?php echo $eid?>'
							data-candidate-id='<?php echo $row['id']?>' onclick="vote(this);">Vote</button>
					</div>
				</div>
			</div>
	

	<?php } }}?> 
	
			</div>


	</div>



	<!-- main content -->

	<script type="text/javascript" src="../jQuery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="../popper/dist/popper.min.js"></script>
	<script type="text/javascript"
		src="../bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./script.js"></script>

	<script type="text/javascript">
		function vote(ref){
			window.location='vote.php?election_id='+ref.getAttribute('data-election-id')+'&candidate_id='
			+ref.getAttribute('data-candidate-id')+'&voter_id='+localStorage.getItem('voter_id');
		}
	</script>
</body>
<?php mysqli_close($connection);?>
</html>