<?php
    $parent_email = $_REQUEST['parent_email'];
    $child_email = $_REQUEST['child_email'];


    $conn = mysqli_connect("127.0.0.1","root","","findChildren");
    mysqli_query($conn,"use user");


    $sql = "SELECT * from user where email = '$child_email' and type ='children'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_all($result);

    if(count($row)==1){

        $sql = "select son from user where email = '$parent_email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_row($result);
        //echo json_encode($row[0]) ;
        if(count($row)==1){
            $newStr = $row[0].",".$child_email;
         
            $sql = "UPDATE user set son = '$newStr' where email = '$parent_email'";
        }else{
            $sql = "UPDATE user set son = ' $child_email' where email = '$parent_email'";
            $newStr = $child_email;
        }
            $result = mysqli_query($conn,$sql);
           
        
            if($result){
                echo json_encode([
                    "status"=>"success",
                    "data"=>$newStr ,
                    "message"=>"Bind successfully !"
                    ]);
            }else{
                echo json_encode([
                    "status"=>"error",
                    "message"=>"Bind failed !"
                    ]);
            }
    }else{
        echo json_encode([
            "status"=>"error",
            "message"=>"Bind failed !"
            ]);
    }


    