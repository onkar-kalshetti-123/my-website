<?php
if(!empty($_GET) && isset($_GET['cid']) && isset($_GET['cpass'])){
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $cid=$_GET['cid'];
        $cpass=$_GET['cpass'];
        $query = "select * from candidate where voter_id='$cid' and password='$cpass';";
        $results = mysqli_query($connection, $query);
        if (mysqli_num_rows($results) > 0) {
            echo "success";
        } else {
            echo "failure";
        }
        mysqli_close($connection);
    }
}
?>