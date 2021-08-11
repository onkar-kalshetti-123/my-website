<?php
if (! empty($_GET) && isset($_GET['eid'])) {
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $eid = $_GET['eid'];
        $query = "
                update election set voting_status='2' where election_id='$eid';
            ";
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