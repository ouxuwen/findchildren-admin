<?php
      $conn = mysqli_connect("127.0.0.1","root","","findChildren");
      mysqli_query($conn,"use user");

    // $result =  mysqli_query($conn,$sql);
    // $row = mysqli_fetch_all($result);

    // $sql = "select * from location;";
    // $result = mysqli_query($conn)

    // echo json_encode($row);
   
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $sql = "select * from user where email = '$email 'and password = '$password'" ;

    $result = mysqli_query($conn,$sql);
    
    if(!$result){
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $row = mysqli_fetch_all($result,1);
   

    if(count($row) >0){
        echo json_encode([
            "status"=>"success",
            "username"=>$row[0]["username"],
            "email"=>$row[0]["email"],
            "isLogin"=>true,
            "message"=>"Login successfully",
            "type"=>$row[0]["type"],
            "son"=>$row[0]["son"],
            ]);
    }else{
        echo json_encode([
            "status"=>"error",
            "username"=>"",
            "email"=>"",
            "isLogin"=>false,
            "message"=>"Email or password Error",
            "type"=>""
            ]);
    }
    

   

    