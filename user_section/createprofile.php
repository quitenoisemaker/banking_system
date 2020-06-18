<?php
include ('../db/db.php');
session_start();

if (!(isset($_SESSION['user_email']))) {
  // echo "<script>window.open('../login.php','_self')</script>";
  header('location:../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:23 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lloyld Bank | Bank with a difference.</title>
  
  <!-- Favicons-->
  <link rel="shortcut icon" href="lloyldbank.png" type="image/x-icon">
  <link rel="apple-touch-icon" type="image/x-icon" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="lloyldbank.png">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="lloyldbank.png">
  
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Main styles -->
  <link href="css/admin.css" rel="stylesheet">
  <!-- Icon fonts-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Plugin styles -->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Your custom styles -->
  <link href="css/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style type="text/css">

    
    .img-div{
      display: block;
  
      border-radius: 50%;
    }
  </style>
  
</head>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ed8e9409e5f6944228fe023/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<body class="fixed-nav sticky-footer" id="page-top">


  <?php

    if (isset($_POST['submit'])) {
          @$about=$_POST['about'];
          @$name = $_FILES['myfile'] ['name'];
          @$tmp_name = $_FILES['myfile'] ['tmp_name'];
          $extension = substr($name, strpos($name, '.') +1 );
          @$type = $_FILES['myfile'] ['type'];
          @$size = $_FILES['myfile'] ['size'];
          $max_size = 2000000;
      if (!empty($name)) {
        if (($extension=='jpg' || $extension =='jpeg') && ($type == 'image/jpeg' || $type == 'image/jpg') && ($size <= $max_size)) {
        
        $location='profile_image/';    
        if (move_uploaded_file($tmp_name, $location.$name )){

          $user=$_SESSION['user_email'];
          $sql = $conn->prepare("UPDATE customer SET profile_pic=?  WHERE email=?");
          $sql->bind_param("ss",$name, $user);
        if($sql->execute()) {
          echo "<script>alert('Updated successfully')</script>";
          header('location:user_account.php');
          // echo "<script>window.open('user_account.php','_self')</script>";
        }else{
          echo "<script>alert('Error uploading')</script>";
        }
          
        } 

    }else {
      
         echo "<script>swal({
        
                    title: 'file must be jpg/jpeg and must be 2mb or less',
                    icon: 'warning',
                    button: 'Ok!',
                  })</script>";
    }
      }else{

         echo "<script>swal({
        
                    title: 'Please choose a file',
                    icon: 'warning',
                    button: 'Ok!',
                  })</script>";

      }
    } 


  ?>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
    <a class="navbar-brand" href="user_account.php" style=""><img src="lloyldbank.png" width="130" height="35"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
          <a class="nav-link" href="user_account.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My profile</span>
          </a>
        </li>
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link" href="createprofile.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Edit Profile</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#Components">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Transaction</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <li><a href="user_transfer.php">Transfer</a>
            </li>
      <li>
              <li><a href="transfer_history.php">Transfer history</a>
            </li>
          </ul>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link" href="change_password.php">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Change password</span>
          </a>
        </li>
    
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-home"></i>Home</a>
          <!-- <a class="nav-link">Welcome User</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Create profile</a>
        </li>

          <li class="breadcrumb-item">
          <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $fname = $row['name'];
          // $lname = $row['lastname'];
          // $about = $row['about'];

          echo "<a><b>Welcome</b> $fname </a>";
          
          ?>
        </li>
      </ol>
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-user"></i>Profile details</h2>
      </div>
      <div class="row">
        <div class="col-md-4 box_general">
          <div class="form-group">
            <form action="createprofile.php" method="post" enctype="multipart/form-data">
          <label>Profile pic <br><i class="text-danger">*file must be in jpg/jpeg and must be 2mb or less.</i></label>
          <div class="form-group text-center" style="position: relative;" >
            <span class="img-div">
              <img src="img/images1.jpg" width="150" height="150" onclick="triggerClick()" id="image_display" style="border-radius: 50%">
            </span>
            <input type="file" name="myfile" onchange="displayImage(this)" id="myfile" class="form-control" style="display: none;">
          </div>
         
          <div class="text-center"><input type="submit" value="save" name="submit" class="btn_1 full-width"></div>
        </form>
            </div>
        </div>
      <?php }} ?>

    <!--  -->
        <div class="col-md-8 add_top_30">
      
        <form action="createprofile.php" method="POST" enctype="">
        <h4 class="text-center">Edit profile</h4><br>

          <div class="row">
        
          </div>
          <!-- /row-->
          <div class="row">

             <div class="col-md-6">
              <div class="form-group">
                <label>Customer fullname</label>
                <input type="text" class="form-control" placeholder="Your company name" name="company_name" required="" value="<?php if (isset($_SESSION['user_email'])) {
                   $sql = $conn->prepare("select * from customer where email = ?");
                    $sql->bind_param("s",$user);
                      $sql->execute();
                      $result = $sql->get_result();
                      while($row=$result->fetch_assoc()){
                  $fname = $row['name'];
                  echo "$fname";
                }
                }?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Telephone</label>
                <input type="text" class="form-control" placeholder="Your telephone number" name="phone" required="" value="<?php if (isset($_SESSION['user_email'])) {
                   $sql = $conn->prepare("select * from customer where email = ?");
                    $sql->bind_param("s",$user);
                      $sql->execute();
                      $result = $sql->get_result();
                      while($row=$result->fetch_assoc()){
                  $phone = $row['phone'];
                  echo "$phone";
                }
                }?>">
              </div>
            </div>
           
          </div>
          <!-- /row-->
          <div class="row">
            <div class="col-md-12">
               <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Your address" name="address" required="" value="<?php if (isset($_SESSION['user_email'])) {
                   $sql = $conn->prepare("select * from customer where email = ?");
                    $sql->bind_param("s",$user);
                      $sql->execute();
                      $result = $sql->get_result();
                      while($row=$result->fetch_assoc()){
                  $address = $row['address'];
                  echo "$address";
                }
                }?>">
              </div>
            </div>
          </div>

          <div class=""><input type="submit" value="Update" name="update" class="btn_1 full-width"></div>
          <!-- /row-->
        </form>
        </div>

        <?php
          if (isset($_POST['update'])) {
          $company_name=$_POST['company_name'];
          $phone = $_POST['phone'];
          $address= $_POST['address'];    
          $user=$_SESSION['user_email'];
          if (!empty($company_name) && !empty($address) && !empty($phone)) {
          
          $sql = $conn->prepare("UPDATE customer SET name=? , phone=? , address=?  WHERE email=?");
          $sql->bind_param("ssss",$company_name, $phone, $address,$user);  
          if($sql->execute()) {
          echo "<script>swal({
          title: 'Updated Successful, Thanks',
          icon: 'success',
          button: 'Ok!',
        })</script>";
          // echo "<script>window.open('user_account.php','_self')</script>";
          } else {
          echo "Problem in Editing Record";
          }

          }else{
            
            echo "<script>alert('Empty! Field required')</script>";
          }

        }
        ?>
        </div>
        <div class="row">
        <div class="col0-6 add_top_30">
          
  
    
          <!-- /row-->
        </div>
        </div>
      </div>
    </div>
    <!-- /box_general-->
   
    <!-- /row-->
    
    </div>
    <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © LloydBank 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
  <script src="vendor/jquery.selectbox-0.2.js"></script>
  <script src="vendor/retina-replace.min.js"></script>
  <script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
  <!-- Custom scripts for this page-->
    <script src="js/admin-charts.js"></script>
    <script type="text/javascript" src="script.js"></script>
  
</body>

<!-- Mirrored from www.ansonika.com/sparker/admin_section/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 25 Dec 2018 07:12:24 GMT -->
</html>
 