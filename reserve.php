<?php 
    include 'layout/header.php';
    $storeOption = '';
    $stmt = $conn->prepare("SELECT * FROM store");
    $stmt->execute();
    while($row = $stmt->fetch()){
        $storeOption .= '<input id="store'.$row['id'].'" type="radio" class="store form-check-input tgl-radio-tab-child"
            name="store" value="'.$row['id'].'"><label for="store'.$row['id'].'" class="radio-inline">'.$row['name'].'</label>';                       
    }
?>

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
                                echo '<script>
                                        swal({
                                            title: "error",
                                            text: Something went wrong.,
                                            icon: "error",
                                            timer: 3000
                                        });
                                    </script>';
                            }
                        ?>
                    </div>

                    <div class="row errormsg">
                        <?php 
                            if(isset($_GET['success'])){
                                $success_msg = $_GET['success'];
                                echo '<p style="padding:5px;" class="alert alert-success">
                                <i class="fa fa-check" style="color:green"></i> <strong>'.$success_msg.'</strong></p>';
                                echo '<script>
                                    swal({
                                        title: "Success",
                                        text: "Product reserved success.,
                                        icon: "success",
                                        timer: 3000
                                    });
                                </script>';
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
                                <input id="brand1" type="radio" class="brand form-check-input tgl-radio-tab-child" name="model" value="1">
                                <label for="brand1"  class="brand1 radio-inline">16GB</label>
                                
                                <input id="brand2" type="radio" class="brand form-check-input tgl-radio-tab-child" name="model" value="2">
                                <label for="brand2"  class="brand2 radio-inline">32GB</label>
                                
                                <input id="brand3" type="radio" class="brand form-check-input tgl-radio-tab-child" name="model" value="3">
                                <label for="brand3"  class="brand3 radio-inline">64GB</label>
                                
                                <input id="brand4" type="radio" class="brand form-check-input tgl-radio-tab-child" name="model" value="4">
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
                        <button type="submit" class="sbmt btn btn-md  col-md-6" name="submit" onClick="sbmtReserve()">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include 'layout/footer.php'; ?>
</body>
</html>