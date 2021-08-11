<?php
$connection = mysqli_connect("localhost:3307", "root", "", "voting");
?>


<!DOCTYPE html>
<html>
<head>
<title>Online Voting System</title>
<meta charset="UTF-8">
<style type="text/css">
.mb3 {
	margin-top: 10px;
}

.modal-content {
	padding: 20px 10px;
}

#login-btn-candidate {
	width: 100%;
	margin-top: 10px;
	background-color: #003153;
	color: white;
}

#inputid-candidate {
	background-color: #efebeb;
}

#inputpswd-candidate {
	background-color: #efebeb;
}

#login-btn-voter {
	width: 100%;
	margin-top: 10px;
	background-color: #003153;
	color: white;
}

#inputid-voter {
	background-color: #efebeb;
}

#inputpswd-voter {
	background-color: #efebeb;
}
</style>

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
<link rel="stylesheet" href="./assets/css/index-style.css">
<script type="text/javascript" src="./assets/js/customjs.js"></script>

</head>
</head>
<body>

	<div class="container-responsive">

		<img id="hero-image" src="./assets/images/index-bg4.jpg"
			class="img-fluid" height="100%" width="100%">
		<div class="index-header">
			<h1 class="main-heading">Online Voting System</h1>
		</div>
		<!--Content-->
		<div class="content">
			<h2>Un-biased Election</h2>
			<h3>TY- 54</h3>
			<p>
				This is our course project topic.<br>An electoral system or voting
				system is a set of rules that determine how elections and
				referendums are conducted and how their results are determined.
				Political electoral systems are organized by governments, while
				non-political elections may take place in business, non-profit
				organisations and informal organisations
			</p>
			<button type="button" class="btn btn-primary btn-lg"
				data-bs-toggle="modal" data-bs-target="#signupform">Continue as
				Voter</button>
			<button type="button" class="btn btn-primary btn-lg "
				data-bs-toggle="modal" data-bs-target="#candidate-login">Continue as
				Candidate</button>
		</div>
		<!--buttons-->
		An electoral system or voting system is a set of rules that determine
		how elections and referendums are conducted and how their results are
		determined. Political electoral systems are organized by governments,
		while non-political elections may take place in business, non-profit
		organisations and informal organisations
		<!--marquee-->

	</div>
	<div class="footer-marquee">
		<marquee style="color: red; font-size: 1em; font-weight: 900;">Candidate
			application are open now!!!!</marquee>

	</div>



	<!-- Candidate login -->

	<div class="modal fade" id="candidate-login" data-bs-backdrop="static"
		data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Candidate Login</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<form>
								<div class="mb3">
									<label for="inputid" class="form-label">Voter Id<span
										style="color: red">*</span></label> <input type="text"
										class="form-control input" id="inputid-candidate" required
										placeholder="Enter GR number">
								</div>
								<div class="mb3">
									<label for="inputpswd" class="form-label">Password<span
										style="color: red">*</span></label> <input type="password"
										class="form-control input" id="inputpswd-candidate" required
										placeholder="Enter Candidate password">
								</div>
								<div class="mb3">
									<button type="button" class="btn btn-primary"
										id="login-btn-candidate" onclick="validateCandidate()">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<p>
						Want to apply as a Candidate? <a href=""
							data-bs-target="#candidate-reg" data-bs-toggle="modal"
							data-bs-dismiss="modal">Apply Here</a>
					</p>

				</div>
			</div>
		</div>
	</div>

	<!--Candidate Application-->
	<!-- Button trigger modal -->


	<!-- Voter Modal -->



	<!-- Modal -->
	<div class="modal fade" id="signupform" data-bs-backdrop="static"
		data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Voter Login</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<form>
								<div class="mb3">
									<label for="inputid" class="form-label">Voter Id<span
										style="color: red">*</span></label> <input type="text"
										class="form-control input" id="inputid-voter" required
										placeholder="Enter GR number">
								</div>
								<div class="mb3">
									<label for="inputpswd" class="form-label">Password<span
										style="color: red">*</span></label> <input type="password"
										class="form-control input" id="inputpswd-voter" required
										placeholder="Enter Voter password">
								</div>
								<div class="mb3">
									<button type="button" class="btn btn-primary"
										id="login-btn-voter" onclick="validateVoter()">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>

	<!-- REG from -->
	<div class="modal fade" id="candidate-reg" data-bs-backdrop="static"
		data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Candidate
						Registration (Election ID:
						
						<?php 
						$query = "select election_id from election where finish_status='0'";
						$result = mysqli_query($connection, $query);
						if (mysqli_num_rows($result) > 0) {
						    $row=mysqli_fetch_assoc($result);
						    echo $row['election_id'];
						} else {
						    echo "No active election";
						}
						?>
						)
						
						</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"
						aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12 col-sm-6">
							<form>
								<div class="mb3">
									<label for="inputid" class="form-label">Voter Id<span
										style="color: red">*</span></label> <input type="text"
										class="form-control input" id="inputidreg-candidate" required
										placeholder="Enter GR number">
								</div>
								<div class="mb3">
									<label for="inputpswd" class="form-label">Password<span
										style="color: red">*</span></label> <input type="password"
										class="form-control input" id="inputpswdreg-candidate"
										required placeholder="Enter Candidate password">
								</div>
								<div class="mb3">
									<label for="inputinfo" class="form-label">About you<span
										style="color: red">*</span></label>
									<textarea class="form-control input" id="inputinfo-candidate"
										required="required"
										placeholder="Tell us something about yourself" rows="5"
										style="resize: none;"></textarea>
								</div>
								<div class="mb3">
									<button type="button" class="btn btn-primary"
										id="reg-btn-candidate" onclick="regCandidate()">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

</body>
</html>


