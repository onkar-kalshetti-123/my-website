<?php
$connection = mysqli_connect("localhost:3307", "root", "", "voting");
if ($connection) {
    $query = "select election_id from election where finish_status='0'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row=mysqli_fetch_assoc($result);
        echo $row['election_id'];
    } else {
        echo "null";
    }
    mysqli_close($connection);
}

?>