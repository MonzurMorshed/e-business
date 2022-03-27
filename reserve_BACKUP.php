<?php 

include 'db.php';
$stmt = $conn->prepare("SELECT * FROM store");
$stmt->execute();
print_r($stmt->execute());
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
  } else {
    echo "0 results";
  }
foreach($result as $row){
    $storeOption = '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
<link rel="stylesheet" href="css/style.css"/>

</head>
<body>

<div class="">
    
    <header class="header Container">
        <span>E-Business</span>
    </header>
    <div class="container-fluid">

        <h1 class="text-center" style="padding:20px;">C & C - Reserve and Pick Up</h1>
        <div class="row reserve">
                <form class="col-md-8 col-md-offset-2" method="post" action="/validateForm.php">
                    <div class="row">
                        <h3 class="text-center">Select Store</h3>
                        <hr class="divider1">
                        <p>
                            <h4 class="heading4 text-center">Choose the pickup store that you would like to pickup the product</strong>
                        </p>
                        <label class="col-md-4">Pick-up a Store</label>
                        <div class="col-md-6 m-0 m-auto d-block">
                            <select name="store" class="col-md-6 form-control form-control-sm" id="store">
                                <?= $storeOption; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <h3 class="text-center">Select Model</h3>
                        <hr class="divider2">
                        <p>
                            <h4 class="heading4 text-center">Choose a model of the product</strong>
                        </p>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand1" value="1">
                            <label class="form-check-label" for="brand">
                                16GB
                            </label>
                        </div>
                    
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand2" value="2">
                            <label class="form-check-label" for="exampleRadios2">
                                32GB
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand3" value="3">
                            <label class="form-check-label" for="exampleRadios3">
                                64GB
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="brand" id="brand4" value="4">
                            <label class="form-check-label" for="exampleRadios3">
                                128GB
                            </label>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <h3 class="heading text-center">Your Contact</h3>
                        <hr class="divider2">
                        <div class="row form-group">
                            <label class="col-md-5 col-sm-5" for="firstname">First Name</label>
                            <div class="col-md-7">
                                <input type="text" class="col-md-7 col-md-7 col-sm-5 form-control form-control-sm" id="firstname" />
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 col-sm-5" for="lastname">Last Name</label>
                            <div class="col-md-7">
                                <input type="text" class="col-md-7 col-sm-7 form-control form-control-sm" id="lastname"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 col-sm-5" for="mobile">Mobile</label>
                            <div class="col-md-7">
                                <input type="text" class="col-md-7 col-sm-7 form-control form-control-sm" id="mobile"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 col-sm-5" for="email">Email</label>
                            <div class="col-md-7">
                                <input type="text" class="col-md-5 col-sm-7 form-control form-control-sm" id="email"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-md-5 col-sm-5" for="email">Pickup Date</label>
                            <div class="col-md-7">
                                <input type="date" class="col-md-5 col-sm-7 form-control form-control-sm" id="email"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<footer class="header Conrainer"></footer>

</body>
</html>