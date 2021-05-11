<?php
include_once 'includes/header_file.php';

$isbn = $_GET['isbn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Fine Book Store - Add Customer</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/fine-book-store.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Customer Details</h1>
                  </div>
                  <form method="post">
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" id="customer-first-name" placeholder="Enter First Name"
                      required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" id="customer-last-name" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" id="customer-email" aria-describedby="emailHelp"
                             placeholder="Enter Email Address" required>
                    </div>
                      <input type="hidden" id="isbn" value="<?=$isbn?>">
                      <div class="form-group" id="customer-error-message">
                      </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block" onclick="addCustomer(event)">Add Customer</button>
                    </div>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="index.php">Go Back</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/fine-book-store.min.js"></script>
  <script src="js/ajax-handler.js"></script>
</body>

</html>