<?php
if(!empty($_GET) && isset($_GET['vid']) && isset($_GET['vpass'])){
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $vid=$_GET['vid'];
        $vpass=$_GET['vpass'];
        $query = "select * from voter where voter_id='$vid' and password='$vpass';";
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