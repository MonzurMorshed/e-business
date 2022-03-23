<?php

include 'db.php';

if(isset($_POST['submit'])){
    $store = $_POST['store'];
    $brand = $_POST['brand'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $sql = "
        INSERT INTO reservation VALUES (
            $store,$brand,$firstname,$lastname,$mobile,$email
        )
    ";

    $conn->query($sql);

    header('/reserve.php');

}