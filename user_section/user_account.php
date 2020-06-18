<?php
include ('../db/db.php');
session_start();

if (!(isset($_SESSION['user_email']))) {
  header('location:../login.php');
  // echo "<script>window.open('../login.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LloyldBank | Bank with a difference.</title>
	
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
  <style type="text/css">
    

    #authors img{
      margin-top: -50px;

    }
    #authors .fa{
      font-size: 25px;
      color: #3292a6;
    }
     #authors .fa:hover{
      color: dimgrey;
    }

.modal-header, h2, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }



  
  </style>
	
</head>
<script>
  
</script>

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
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">

<!--     <div class="navbar-inner" style="padding-top:19px;">
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</div> -->

    <a class="navbar-brand" href="user_account.php" style=""><img src="lloyldbank.png" width="130" height="35"></a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Bookings">
          <a class="nav-link" href="user_account.php">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">My profile </span>
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
          
          <!-- <a class="nav-link">welcome user</a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-home"></i>Home</a>
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
          <a href="#">My Profile</a>
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
          echo "<a><b>Welcome</b>"." ". ucwords($fname)."</a> ";
            }
            }
          ?>
        </li>
        
      </ol>
    <section id="authors" class="my-5">
  <div class="row">
  <div class="col-md-4 add_top_30">
  <div class="card">
          <div class="card-body text-center">
            <!-- showing the profile pic -->
          
              
            <!-- showing the profile pic -->
            <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $profile_pic = $row['profile_pic'];
          
          echo "<img src='profile_image/$profile_pic' class='img-fluid rounded-circle w-50 mb-3'>";
            }
            }
          ?>
            <!-- showing the user name -->
             <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $fname = $row['name'];
          
          echo "<h3>".ucwords($fname)."</h3>";
            }
            }
          ?>
            <br><br>
            <!-- showing the country -->
              <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $location = $row['branch'];
          
          echo "<div class='d-flex'>
          <h5 class='text-primary'>Country:</h5> &nbsp;&nbsp;
          <h5 class='text-muted'>$location</h5>
          </div>";
            }
            }
          ?>

           <!-- showing the country -->
              <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $address = $row['address'];
          
          echo "<div class='d-flex'>
          <h5 class='text-primary'>Address:</h5> &nbsp;&nbsp;
          <h5 class='text-muted'>$address</h5>
          </div>";
            }
            }
          ?>
        
          </div>
        </div>
      </div>
      <div class="col-md-7 add_top_30 text-center">
        <div class="box_general padding_bottom">
          <div class="header_box version_2">
            <h3><i class="fa fa-gear"></i>Account details</h3>
          </div>
           <div class="form-group">
            <label><h5 class="text-primary">Current Balance</h5></label>
               <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $accountstatus = $row['accountstatus'];
          
          echo "<h4>$ $accountstatus</h4>";
            }
            }
          ?>
<br>
          <!-- <button class="btn-success btn-lg" data-toggle="modal" data-target="#myModal">Withdraw</button>  -->
          </div>
           <div class="form-group">
            <label><h5 class="text-primary">Account Number</h5></label>
               <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $account_no = $row['account_no'];
          
          echo "<h4>$account_no</h4>";
            }
            }
          ?>
          </div>
          <div class="form-group">
            <label><h5 class="text-primary">Account Type</h5></label>
               <?php if (isset($_SESSION['user_email'])) {
            $user=$_SESSION['user_email'];
            $sql = $conn->prepare("select * from customer where email = ?");
            $sql->bind_param("s",$user);
            $sql->execute();
          $result = $sql->get_result();
          while($row=$result->fetch_assoc()){
          $account = $row['account'];
          
          echo "<h4>$account</h4>";
            }
            }
          ?>
          </div>
    
     
        </div>
      </div>
      </div>

      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
   <!--  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"></button>
        <h2 class="modal-title">Opps!</h2>
      </div>
      <div class="modal-body">
        <h5 class="text-center">Please Contact Customer Care for Help</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div> -->

  </div>
</div>


<!-- Modal2 -->


      </section>
		<!-- /box_general-->
		
		<!-- /pagination-->
	  </div>
	  <!-- /container-fluid-->
   	</div>
    <!-- /container-wrapper-->
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/jquery.selectbox-0.2.js"></script>
	<script src="vendor/retina-replace.min.js"></script>
	<script src="vendor/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/admin.js"></script>
	
</body>
</html>
<?php
if (isset($_POST['update'])) {    
  $user=$_SESSION['user_email'];
    $sql = $conn->prepare("UPDATE user SET company_name=? , phone=? , address=?  WHERE email=?");
    $company_name=$_POST['company_name'];
    $phone = $_POST['phone'];
    $address= $_POST['address'];
    $sql->bind_param("ssss",$company_name, $phone, $address,$user);  
    if($sql->execute()) {
      echo "<script>alert('Updated successfully')</script>";
      echo "<script>window.open('user_account.php','_self')</script>";
    } else {
      echo "Problem in Editing Record";
    }

  }
?>