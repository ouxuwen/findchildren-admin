<?php


     $conn = mysqli_connect("127.0.0.1","root","","indoor_location");
     mysqli_query($conn,"use location");
    $sql = "select x,y,mac,AVG(rss) from location GROUP BY x,y,mac";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result,1);
    echo json_encode($row);