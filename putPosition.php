<?php
    
    $conn = mysqli_connect("127.0.0.1","root","","findChildren");
    mysqli_query($conn,"use points");
    
    $email = $_REQUEST['email'];
    $latitude = $_REQUEST['latitude'];
    $longitude = $_REQUEST['longitude'];
    $province = $_REQUEST['province'];
    $address = $_REQUEST['address'];
    $time = $_REQUEST['time'];
    $city =urldecode( $_REQUEST['city']);
    $district =urldecode($_REQUEST['district']) ;
    $username = $_REQUEST['username'];


    $sql = "INSERT INTO `points` VALUES (NULL,'$province',$latitude,$longitude,'$city','$district','$address','$time','$email',$username)";
    $result =  mysqli_query($conn,$sql);        
    
    if($result){
        echo json_encode([
            "status"=>"success",
            "username"=>"dj",
            "point"=>[
                "latitude"=> $latitude,
                "longitude"=> $longitude,
                "province"=>$province,
                "city"=>$city,
                "district"=>$district,
                "address"=>$address,
                "time"=>$time
            ],
            "email"=>$email,
            "isLogin"=>true,
            "message"=>"Put success"
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


  