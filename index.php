<?php
include_once 'includes/header_file.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Fine Bookstore - Dashboard</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/fine-book-store.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">

        </div>
        <div class="sidebar-brand-text mx-3">Fine Bookstore</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Nav Bar
      </div>
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-palette"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-book.php">
          <i class="fas fa-fw fa-palette"></i>
          <span>Add Book</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#books-list-div">
          <i class="fas fa-fw fa-palette"></i>
          <span>List Books</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#customer-list-div">
          <i class="fas fa-fw fa-palette"></i>
          <span>List Customers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#purchases-list-div">
          <i class="fas fa-fw fa-palette"></i>
          <span>List Purchases</span>
        </a>
      </li>
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="ajax/logout.php" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Total Earnings Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Earnings </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$<?=$totalSales?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Sales</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Books Sold Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Books Sold</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$soldBooks?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Books</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Total Customers Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Customers</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$buyers?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Customers</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Books in Stock Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Books in stock</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$booksInStock?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span>Books</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- List of Books -->
            <div id="books-list-div" class="col-xl-12 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">List of Books</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($allBooks as $book){
                        ?>
                        <tr>
                            <td><a href="#"><?=$book['isbn']?></a></td>
                            <td><?=$book['title']?></td>
                            <td><?=$book['author']?></td>
                            <td><?=$book['price']?></td>
                            <td><?=$book['quantity']?></td>
                            <td>
                                <a href="add-customer.php?isbn=<?=$book['isbn']?>" class="btn btn-sm btn-primary">Sell</a>
<!--                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#deleteModal"-->
<!--                                   id="delete-button">Delete</a>-->
                            </td>
                        </tr>
                        <?php
                    }?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>

            <!-- List of Customers -->
            <div id="customer-list-div" class="col-xl-12 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customer List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                      <th>Buyer ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($allCustomers as $customer){
                        ?>
                        <tr>
                            <td><a href="#"><?=$customer['id']?></a></td>
                            <td><?=$customer['first_name']?></td>
                            <td><?=$customer['last_name']?></td>
                            <td><span class="badge badge-success"><?=$customer['email']?></span></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>

            <!-- List Purchases -->
            <div id="purchases-list-div" class="col-xl-12 col-lg-7 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Purchases List</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                      <th>Buyer ID</th>
                      <th>Name</th>
                      <th>ISBN</th>
                      <th>Book Title</th>
                      <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($allPurchases as $purchase){
                        ?>
                        <tr>
                            <td><a href="#"><?=$purchase['buyer_id']?></a></td>
                            <td><?=$purchase['first_name']." ".$purchase['last_name']?></td>
                            <td><?=$purchase['book_isbn']?></td>
                            <td><?=$purchase['book_title']?></td>
                            <td>$<?=$purchase['price']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Book</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Confirm deletion?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" >Cancel</button>
                  <button type="button" class="btn btn-primary">Delete</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> -
              <b><a href="index.php">Fine Book Store</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
  <script src="js/fine-book-store.min.js"></script>
</body>

</html>