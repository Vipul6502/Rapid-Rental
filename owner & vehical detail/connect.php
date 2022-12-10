<?php
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    /*database*/
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into form(name, phone, email, address) values(?, ?, ?, ?)");
        $stmt->bind_param("siss",$name, $phone, $email, $address);
        $stmt->execute();
        echo "registration successfull....";
        $stmt->close();
        $conn->close();
    }
?>