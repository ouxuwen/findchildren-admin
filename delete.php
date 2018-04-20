<?php
      $conn = mysqli_connect("127.0.0.1","root","","findChildren");
      mysqli_query($conn,"use points");
    
      $sql = "delete from points";

      $result = mysqli_query($conn,$sql);
          if($result){
            echo json_encode([
                "status"=>"success",
                "message"=>"delete finished ;"
                ]);
      }
