<?php
if(!empty($_GET) && isset($_GET['aid']) && isset($_GET['apass'])){
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $aid=$_GET['aid'];
        $apass=$_GET['apass'];
        $query = "select * from admin where admin_id='$aid' and password='$apass';";
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