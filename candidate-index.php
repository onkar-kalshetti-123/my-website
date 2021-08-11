<!DOCTYPE html>
<html>
<head>
<title>Status Page</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/css/votingStyle.css">
</head>
<body>
<?php
if (! empty($_GET) && isset($_GET['cid'])) {
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $cid = $_GET['cid'];
        $query = "select fname,lname,department,election_id,info,application_status,
                profile_url from candidate join voter on candidate.voter_id=voter.voter_id
                where candidate.voter_id='$cid';";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $application_status = $row['application_status'];
            echo "<div class=\"header\">
        <h1>Welcome " . $row['fname'] . " " . $row['lname'] . "</h1>
        </div>" . "<div class=\"content\">
        <div class=\"card\" style=\"\">
        <img src=\"./Uploads/" . $cid . "\" class=\"card-img-top\" alt=\"...\">
        <div class=\"card-body\">
        <h5 class=\"card-title\">" . $row['fname'] . " " . $row['lname'] . "</h5>
        <p class=\"card-text\">" . $row['info'] . "</p>
        </div>
        <ul class=\"list-group list-group-flush\">
        <li class=\"list-group-item\">Election ID: " . $row['election_id'] . "</li>
        <li class=\"list-group-item\">Candidate ID: " . $cid . "</li>
        </ul>
        <div class=\"card-body\">
        <table class=\"\">
        <tr>
        <td><button class=\"btn-lg btn-primary btn-sm\"
            onclick=\"myFunction()\">Check Status</button></td>
            <td><p id=\"status\"></p>
            
            <td>
            
            </tr>
            </tbody>
            </table>
            
            </div>
            </div>
            </div>";
            ?>
            <script>
function myFunction(){
	var status=<?php echo $application_status?>;
	if(status=="0"){
		document.getElementById("status").innerHTML="Application pending";
	}else if(status==2){
		document.getElementById("status").innerHTML="Your application has been rejected.";
	}else{
		document.getElementById("status").innerHTML="Your application has been accepted";
	}
	document.getElementById("status").style.paddingLeft="15px";
	document.getElementById("status").style.paddingTop="10px";
}
</script><?php
            return;
        } else {
            echo "Something went wrong";
        }
    } else {
        echo "Something went wrong";
    }
} else {
    echo "Access denied";
}
?>
</body>
<script type="text/javascript">
	var cid=localStorage.getItem("cid");
	if(cid!=null)window.location = "candidate-index.php?cid=" + cid;
</script>
</html>