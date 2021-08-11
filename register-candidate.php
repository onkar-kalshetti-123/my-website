<?php
if(!empty($_GET) && isset($_GET['cid']) && isset($_GET['cpass']) && isset($_GET['cinfo']) && isset($_GET['election_id'])){
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $cid=$_GET['cid'];
        $cpass=$_GET['cpass'];
        $cinfo=$_GET['cinfo'];
        $election_id=$_GET['election_id'];
        $query = "insert into candidate values('$cid','$cpass','$election_id','$cinfo',null,'0')";
        $results = mysqli_query($connection, $query);
        if ($results) {
            echo "success";
        } else {
            echo "failure";
        }
        mysqli_close($connection);
    }
}
?>