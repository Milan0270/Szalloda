<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $adults = $_POST['adults'];
    $child = $_POST['child'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $room = $_POST['room'];


    $conn = new mysqli('localhost:3307','root','','szalloda');
        if($conn->connect_error){
            echo "$conn->connect_error";
            die("Connection Failed : ". $conn->connect_error);
        } else {
            $stmt = $conn->prepare("insert into szalloda(firstName, lastName, adults, child, date1, date2, room) values(?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiisss", $firstName, $lastName, $adults, $child, $date1, $date2, $room);
            $execval = $stmt->execute();
            echo $execval;
            echo "Registration successfully...";
            $stmt->close();
            $conn->close();
        }


?>