<?php
include("index.html");
$email= filter_input(INPUT_POST,'email'); //$email from the post request//
$password = filter_input(INPUT_POST,'password');

if(!empty($email)){
    if(!empty($password)){
        $host = "localhost";
        $dbemail = "root"; //username to connect to db//
        $dbpassword = ""; //pass for user//
        $dbname = "database123";
        $conn = new mysqli($host, $dbemail, $dbpassword, $dbname); //here we have created object for db conn using paramter//

        if(mysqli_connect_error()){
            die('Connect error('.
            mysqli_connect_errno().')'.
            mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO loginform (email,password)values('$email','$password')";
            if($conn->query($sql)){
                echo"Login Successfully";
            }
            else{
                echo "error: " . $sql . "<br>" .
                $conn->error;
            }
            $conn->close();
        }
    }
    else{
        echo "password should not be empty";
        die();        
    }
}
else{
    echo "username should not be empty";
    die();
}
?>