<?php
include ('includes/config.php');

$myid = $_GET['id'];
$sql = "SELECT * FROM election  WHERE  election_id=$myid";
$row = mysqli_query($connect, $sql);
$data = mysqli_fetch_assoc($row);

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

<title>Online Voting System |Admin Details</title>
<link rel="stylesheet" href="detail-style.css">
<div class="courses-container">
	<div class="course">
		<div class="course-preview">

			<h6>
				<p style="font-size: 13px;">
					Election ID:<br><?php echo $data["election_id"];?><br> <br>
					Election Type:<br><?php echo $data["type"] ;?><br> <br> Start Date:<br><?php echo $data["start_date"] ;?><br>
					<br> End date:<br><?php echo $data["end_date"] ;?>	
				
			
			
			
			
			
			</h6>

		</div>
		<div class="course-info">
			<h6>
				Winner:
				<h6>
							
			<?php
            $w_id = $data["winner"];
            $sql3 = "SELECT * FROM voter WHERE voter_id='$w_id'";
            $row3 = mysqli_query($connect, $sql3);
            if (mysqli_num_rows($row3) == 0) {
                ?>
	               <h2>
						<b>Election on going</b>
					</h2>
	          <?php
} else {
    $data3 = mysqli_fetch_assoc($row3)?>
		
						<h2>
						<b><?php echo $data3["fname"] ;echo"\t\t"; echo $data3["lname"] ;?></b>
					</h2>
						
						<?php }?>
					<?php
    $sql = "SELECT * FROM result WHERE election_id=$myid";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $v_id = $row["voter_id"];
            $sql2 = "SELECT * FROM voter WHERE voter_id=$v_id";
            $row2 = mysqli_query($connect, $sql2);
            $data2 = mysqli_fetch_assoc($row2);

            ?>
   
   <p>Candidate name:&nbsp;&nbsp;&nbsp;<?php echo $data2["fname"] ;echo"\t\t"; echo $data2["lname"] ;?>  &nbsp;&nbsp; &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;  Vote:&nbsp;&nbsp;&nbsp;<?php echo $row["vote_count"] ;?> 
					
					
					
					
					
					
					
					
					<h5>
						
										
			<?php
        }
    }
    ?>	
						
						
			
						
			
			
			<a class="btn" href="dashboard.php">Back to Dashboard</a>
		
		</div>
	</div>
</div>


</body>
</html>