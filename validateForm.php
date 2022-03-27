<?php

include 'db.php';

$errormsg = array();
$flag = 1;

if(isset($_POST['tc'])){
    if(isset($_POST['submit'])){
        
        if(empty($_POST['store'])){
            $flag = 0;
            $errormsg[] = "Enter store.";
        }

        if(empty($_POST['model'])){
            $flag = 0;
            $errormsg[] = "Enter model.";
        }

        if(isset($_POST['mobile'])){
            $mb = $_POST['mobile'];
            if(strlen($mb) <= 4){ 
                $stmt = $conn->prepare("SELECT mobile FROM reservation");
                $stmt->execute();
                while($row = $stmt->fetch()){
                    if($row['mobile'] == $_POST['mobile']){
                        $flag = 0;
                        $errormsg[] = "Mobile No. already exist.";
                    }
                }
            }else{
                $flag = 0;
                $errormsg[] = "Please enter valid mobile no.";
            }
        }

        if(!empty($_POST['firstname'])){
            if (!preg_match('/^[A-Za-z]*$/', $_POST['firstname'])) {
                $flag = 0 ;
                $errormsg[] = "Enter valid first name";
            }
        }else{
            $flag = 0 ;
            $errormsg[] = "Enter first name";
        }

        if(!empty($_POST['lastname'])){
            if (!preg_match('/^[A-Za-z]*$/', $_POST['lastname'])) {
                $flag = 0 ;
                $errormsg[] = "Enter valid last name";
            }
        }else{
            $flag = 0 ;
            $errormsg[] = "Enter last name";
        }


        if(empty($_POST['pickup'])){
            $flag = 0;
            $errormsg[] = "Enter pickup.";
        }

        if($flag == 1){

            try {
                $stmt = $conn->prepare("INSERT INTO reservation (store, model, fname, lname, email, mobile, pickup)
                    VALUES (?,?,?,?,?,?,?)");

                $stmt->execute([
                    $_POST['store'],
                    $_POST['model'],
                    $_POST['firstname'],
                    $_POST['lastname'],
                    $_POST['email'],
                    $_POST['mobile'],
                    $_POST['pickup']
                ]);

                $success = "New records created successfully";
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            header('Location: reserve.php?success='.$success);
        }else{
            $error = json_encode($errormsg);
            header('Location: reserve.php?errormsg='.$error);
        }

    }
}else{
    $flag = 0;
    $errormsg[] = "Please click on terms and conditions.";
    $error = json_encode($errormsg);
    header('Location: reserve.php?errormsg='.$error);
}