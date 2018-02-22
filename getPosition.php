<?php
    // $conn = mysqli_connect("localhost","root","");
    // mysqli_query($conn,"use indoor_location");
    // $sql = "select distinct x ,y from location";
    // $result =  mysqli_query($conn,$sql);
    // $row = mysqli_fetch_all($result);

    // $sql = "select * from location;";
    // $result = mysqli_query($conn)

    // echo json_encode($row);
   
    $email = $_REQUEST['email'];
    $conn = mysqli_connect("127.0.0.1","root","","findChildren");
    mysqli_query($conn,"use points");

    $sql = "select * from points where email = '$email'";

    $result = mysqli_query($conn,$sql);

    if($result){
        $row = mysqli_fetch_all($result,1);

        $json = $row[count($row)-1];

    }


    if($json){
        echo json_encode([
            "status"=>"success",
            "username"=>"dj",
            "point"=>[
                "latitude"=> $json["latitude"],
                "longitude"=> $json["longitude"],
                "province"=>$json["privince"],
                "city"=>$json["city"],
                "district"=>$json["district"],
                "address"=>$json["address"],
                "time"=>$json["time"]
            ],
            "email"=>$json["email"],
            "isLogin"=>true,
            "message"=>"get success"
            ]);
    }else{
        echo mysqli_error($conn);
        echo json_encode([
            "status"=>"error",
            "username"=>"dj",
            "point"=>[
                "latitude"=> 0,
                "longitude"=>0,
                "province"=>"",
                "city"=>"",
                "district"=>"",
                "address"=>"",
                "time"=>""
            ],
            "email"=>"",
            "isLogin"=>false,
            "message"=>"Failed "
            ]);
    }