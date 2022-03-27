<?php 

include 'db.php';
$storeOption = '';
$stmt = $conn->prepare("SELECT * FROM store");
$stmt->execute();
while($row = $stmt->fetch()){
    $storeOption .= '<input id="store'.$row['id'].'" type="radio" class="form-check-input tgl-radio-tab-child"
        name="store" value="'.$row['id'].'"><label for="store'.$row['id'].'" class="radio-inline">'.$row['name'].'</label>';                       
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reserve and Pick Up</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css"/>


</head>
<body>

<div class="">
    
    <header class="header Container">
        <span>E-Business</span>
        <a class="btn btn-default loginBtn" href="admin.php">Login</a>
    </header>
    <div class="container-fluid content-body">
        <form class=" reserveform" method="post" action="validateForm.php">
            <h3 class="text-center" style="padding:15px;">C & C - Reserve and Pick Up</h3>
            <div class="row reserve">

            <div class="row">

                <div class="row errormsg">
                    <?php 
                        if(isset($_GET['errormsg'])){
                            $error_msg = $_GET['errormsg'];
                            $errormsg = json_decode($error_msg,true);
                            foreach($errormsg as $val){
                                echo '<p style="padding:5px;" class="alert alert-danger"><i class="fa fa-warning" style="color:#dc680c"></i>';
                                echo '<strong> '.$val.'</strong><br>' ;
                                echo '</p>';
                            }
                        }
                    ?>
                </div>

                <div class="row errormsg">
                    <?php 
                        if(isset($_GET['success'])){
                            $success_msg = $_GET['success'];
                            echo '<p style="padding:5px;" class="alert alert-success">
                            <i class="fa fa-check" style="color:green"></i> <strong>'.$success_msg.'</strong></p>';
                        }
                    ?>
                </div>

                <div class="row form-group">
                    <input type="text" class="form-control form-control-sm" id="firstname" name="firstname" placeholder="First Name"/>
                </div>
                <div class="row form-group">
                    <input type="text" class="col-md-7 col-sm-7 form-control form-control-sm" id="lastname"  name="lastname" placeholder="Last Name"/>
                </div>
                <div class="row form-group">
                    <input type="text" class="col-md-7 col-sm-7 form-control form-control-sm" id="mobile" name="mobile" placeholder="Mobile No."/>
                </div>
                <div class="row form-group">
                    <input type="text" class="col-md-5 col-sm-7 form-control form-control-sm" id="email" name="email" placeholder="Email Address"/>
                </div>
                <div class="row form-group">
                    <div class="form-check">
                        <div class="tgl-radio-tabs">
                            <?= $storeOption ?>
                        </div>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="form-check">
                        <div class="tgl-radio-tabs">
                            <input id="brand1" type="radio" class="form-check-input tgl-radio-tab-child" name="model" value="1">
                            <label for="brand1"  class="brand1 radio-inline">16GB</label>
                            
                            <input id="brand2" type="radio" class="form-check-input tgl-radio-tab-child" name="model" value="2">
                            <label for="brand2"  class="brand2 radio-inline">32GB</label>
                            
                            <input id="brand3" type="radio" class="form-check-input tgl-radio-tab-child" name="model" value="3">
                            <label for="brand3"  class="brand3 radio-inline">64GB</label>
                            
                            <input id="brand4" type="radio" class="form-check-input tgl-radio-tab-child" name="model" value="4">
                            <label for="brand4"  class="brand4 radio-inline">128GB</label>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <input type="date" class="col-md-5 col-sm-7 form-control form-control-sm" id="pickup" name="pickup"/>
                </div>
                <div class="row form-group">
                    <input id="tc" type="radio" class="tc form-check-input tgl-radio-tab-child" name="tc" value="1">
                    <label for="tc" class="text-center radio-inline" style="width:500px;background:#df3d58;">Terms & Conditions</label>
                </div>
                <div class="row form-group">
                    <button type="reset" class="btn btn-md btn-success  col-md-6">Reset</button>
                    <button type="submit" class="sbmt btn btn-md  col-md-6" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
<footer class="header Conrainer"></footer>
</body>
</html>