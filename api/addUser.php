<?php
    header("Access-Control-Allow-Origin: *");

    require_once ("php_includes/db_conn.php");

    // Connecting to mysql database
    $mysqli = $db_conn;
    // Check for database connection error
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } // The mysql database connection script
    //declare
    $data = json_decode(file_get_contents("php://input"));
    $usrid =$data->uid;
    $name = $data->name;
    $type = $data->type;
    $token = $data->token;
    $picture = $data->picture;
    //execute
      //selects from database user id and email
      $query = "SELECT uid FROM chatUsers WHERE uid = '$usrid'";
      $res = $mysqli->query($query) or die($mysqli->error.__LINE__);
      $res = $mysqli->affected_rows;

      //if user id and email is the same
      if($res = $mysqli->affected_rows > 0){
          //do update on user table
          echo "User already exists here";
          $query = "UPDATE chatUsers SET name = '$name', type = '$type', token = '$token', picture = '$picture'
                   WHERE uid = '$usrid'";
                   $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
                   $result = $mysqli->affected_rows;

      }else{
        //insert new user in database.
        //echo 'there is no user like this, we are storing it in our database';
        $query="INSERT INTO chatUsers (uid,name,type,token,picture) VALUES ('$usrid','$name', '$type', '$token', '$picture')";
        $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
        $result = $mysqli->affected_rows;
      }
       echo $json_response = json_encode($result);
?>
