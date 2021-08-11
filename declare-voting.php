<?php
if (! empty($_GET) && isset($_GET['eid'])) {
    $connection = mysqli_connect("localhost:3307", "root", "", "voting");
    if ($connection) {
        $eid = $_GET['eid'];
        $query = "
                select max(vote_count),voter_id from result where election_id='$eid';
            ";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $vid = $row['voter_id'];
            $query = "update election set winner='$vid', finish_status='1' where election_id='$eid';";
            $result = mysqli_query($connection, $query);
            if ($result) {
                echo "success";
            } else {
                echo "failure";
            }
        } else {
            echo "failure";
        }
        mysqli_close($connection);
    }
}
?>