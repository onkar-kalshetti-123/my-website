<?php
if (! empty($_GET) && isset($_GET['id']) && isset($_GET['s_date']) && isset($_GET['e_date']) && isset($_GET['type'])) {
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $id = $_GET['id'];
        $sdate = $_GET['s_date'];
        $edate = $_GET['e_date'];
        $type = $_GET['type'];
        $query = "
                insert into election
                values('$id','$sdate','$edate',null,'$type','0','0');
            ";
        $results = mysqli_query($connection, $query);
        if ($results) {
            echo "success";
        } else {

            echo mysqli_connect_error();
        }
        mysqli_close($connection);
    }
}
?>