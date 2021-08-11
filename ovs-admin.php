<!DOCTYPE html>
<html>
<head>
<title>Admin|Login</title>
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width,height=device-height, initial-scale=1.0">
<style type="text/css">
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
<link rel="stylesheet" href="admin-style.css">
</head>
<body>
	<div class="content">
		<h3 style="text-align: center">Admin | Login</h3>
		<div>
			<form onsubmit="return false;">
				<div class="mb-3">
					<label for="inputun-admin" class="form-label">Username<span
						style="color: red">*</span></label> <input type="text"
						class="form-control" id="inputun-admin" required
						placeholder="Enter Username">

				</div>
				<div class="mb-3">
					<label for="inputpswd-admin" class="form-label">Password<span
						style="color: red">*</span></label> <input type="password"
						class="form-control" id="inputpswd-admin" required
						placeholder="Enter Password">
				</div>

				<button type="submit" class="btn btn-primary" id="btn-login" onclick="validateAdmin()">Login</button>
			</form>

		</div>
	</div>
</body>
<script type="text/javascript">
function verifyAdmin() {
	var adminid = document.getElementById('inputun-admin').value;
	var adminpswd = document.getElementById('inputpswd-admin').value;


	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var st = this.responseText;
			if (st == "failure") {
				window.alert("Invalid credentials");
			} else if (st == "success") {
				window.alert("Login sucessfull");
				window.open("./dashboard.php", "_self");
			}
		}
	}
	xhttp.open("GET", "./validate-admin.php?aid="+adminid + "&" + "apass=" + adminpswd, true);
	xhttp.send();
}
function validateAdmin() {
	var adminid = document.getElementById("inputun-admin").value;
	var adminpswd = document.getElementById("inputpswd-admin").value;

	if (adminid.length != 8) {
		window.alert("Admin id is not valid");
	} else {
		if (adminpswd.length < 7) {
			window.alert("Password should be at least 7 characters long");
		} else if (adminpswd.length >= 7) {
			var regUpperLetter = /[A-Z]/;
			var regDigit = /[0-9]/;
			var regSpecialChar = /[!@#$%^&*]/;
			if (!regUpperLetter.test(adminpswd)) {
				window.alert("Password should contain atleast uppercase letter");
			} else {
				if (!regDigit.test(adminpswd)) {
					window.alert("Password should contain atleast one digit");
				} else {
					if (!regSpecialChar.test(adminpswd)) {
						window.alert("Password should contain atleast special character");
					} else {
						verifyAdmin();
					}
				}
			}
		}
	}
}
</script>
</html>


