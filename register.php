<?php
    $conn = mysqli_connect("127.0.0.1","root","","findChildren");
    mysqli_query($conn,"use user");
    // $sql = "select distinct x ,y from location";
    // $result =  mysqli_query($conn,$sql);
    // $row = mysqli_fetch_all($result);

    // $sql = "select * from location;";
    // $result = mysqli_query($conn)

    // echo json_encode($row);
   
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $username = $_REQUEST['username'];
    $type = $_REQUEST['type'];
    $phone = $_REQUEST['phone'];

    $sql = "select * from user where email = '$email' or username = '$username' ";
    $result =  mysqli_query($conn,$sql);

    $row = mysqli_fetch_all($result);

    if(count($row) >0){
        echo json_encode([
            "status"=>"error",
            "username"=>"",
            "email"=>"",
            "isLogin"=>false,
            "message"=>"Your  Email or username  was existed",
            "type"=>""
            ]);
    }else{
        $sql = "INSERT INTO user VALUES (NULL,'$username','$password','$type','$email',null,'$phone')";
        $result =  mysqli_query($conn,$sql);        
        
        if($result){
            echo json_encode([
                "status"=>"success",
                "username"=>$username,
                "email"=>$email,
                "isLogin"=>true,
                "message"=>"Rgister Succfully",
                "type"=>$type
                ]);
        }else{
            echo json_encode([
                "status"=>"error",
                "username"=>"",
                "email"=>"",
                "isLogin"=>false,
                "message"=>"Register failed",
                "type"=>""
                ]);
        }

    }






