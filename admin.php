<?php 

include 'layout/header.php';
$_SESSION['loggedIn'] = 0;
$loginbtn = '';
$loggedIn = '';
$loginForm = '';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE 
    username='.$username.' AND  password='.$password.' ");
    $stmt->execute();
    $_SESSION['loggedIn'] = 1;

    $reserveData = $conn->prepare("SELECT reservation.*,store.name as storename,brand.name as modelname
    FROM reservation 
    left join store on reservation.store = store.id
    left join brand on reservation.model = brand.id
    ");
    $reserveData->execute();
}

if($_SESSION['loggedIn'] == 0){
    $loginbtn = '<a class="btn btn-default loginBtn" href="admin.php">Login</a>';
    $loginForm = '
    
        <div class="row reserve">
        <form class="reserveForm" method="post" action="admin.php">
            <div class="row">
                <div class="row reserve">            
                    <div class="errormsg">';
                        if(isset($_GET['errormsg'])){
                            $error_msg = $_GET['errormsg'];
                            $errormsg = json_decode($error_msg,true);
                            foreach($errormsg as $val){
                                $loginForm .= '<p style="padding:5px;" class="alert alert-danger">'.$val.'</p>';
                            }
                        }

                    $loginForm .= '</div>

                    <div class="errormsg">';

                        if(isset($_GET['success'])){
                            $success_msg = $_GET['success'];
                            $loginForm .= '<p style="padding:5px;" class="alert alert-success">'.$success_msg.'</p>';
                            
                        }

                        $loginForm .= '</div>

            
            <div class="row mt-3">
                <h3 class="heading text-center">Login</h3>
                <hr class="divider2">
                <div class="row form-group">
                    <label class="col-md-5 col-sm-5" for="username">Username</label>
                    <div class="col-md-7">
                        <input type="text" class="col-md-7 col-md-7 col-sm-5 form-control form-control-sm" id="username" name="username" />
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-5 col-sm-5" for="password">Password</label>
                    <div class="col-md-7">
                        <input type="text" class="col-md-7 col-sm-7 form-control form-control-sm" id="password"  name="password" />
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="reset" class="btn btn-sm btn-danger pull-right ml-2" style="margin-left:2px;" >Reset</button>
                <button type="submit" class="btn btn-sm btn-success pull-right " style="margin-left:2px;" name="login">Login</button>
            </div>
        </div>
    
    ';
}else{
    $loginbtn = '';
}

// echo  $_SESSION['loggedIn'] ;

?>

<body>

<div class="">
    
    <header class="header Container">
        <span>Admin - E-Business</span>
        <?= $loggedIn ?>
    </header>
    <div class="container-fluid  content-body">

        <h3 class="text-center" style="padding:20px;">C & C - Reserve and Pick Up</h3>

        <?php 
            if($_SESSION['loggedIn'] == 0){
                echo $loginForm;
            }else{
        ?>
            <div class="row reserve container-fluid">
                <div class="container table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order Time</th>
                                <th>Store</th>
                                <th>Model</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Pick Up date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                $i = 0;
                                while($row = $reserveData->fetch()){
                                    ++$i;
                                    echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$row['orderdate'].'</td>
                                            <td>'.$row['storename'].'</td>
                                            <td>'.$row['modelname'].'</td>
                                            <td>'.$row['fname'].'</td>
                                            <td>'.$row['lname'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['mobile'].'</td>
                                            <td>'.$row['pickup'].'</td>
                                        </tr>';
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
           </div>
        <?php 
            }
        ?>
        
    </div>
</div>

<?php include 'layout/footer.php'; ?>

</body>
</html>