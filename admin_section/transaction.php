<?php
session_start();
error_reporting(0);
include ("function/function.php");
if(! $_SESSION['username']){
session_destroy();
header('location:index.php');
}
else{
if(isset($_POST['submit'])){

	$total=0;
	$total1=0;

	$amount=$_POST['amount'];

	$actno = $_POST['actno'];
	$actno2 = $_POST['actno2'];

	if(isset($_POST['receiver'])){
  	$receiver=$_POST['receiver'];
  }

  if(isset($_POST['sender'])){
  	$sender=$_POST['sender'];
  }


   //  //check if email already exist
 		// $sql = $conn->prepare("select account_no from customer where account_no = $actno");

 		// $result=$conn->query($sql);
  	// 	if ($result->num_rows ==0) {
  	// 	// echo "<script>alert('Email already exist, Thanks')</script>";
  			
  	// 		echo "<script>alert('Transfer not completed')</script>";
  	// 	// echo "<script>window.open('account.php','_self')</script>";
  		
  	// 	}


  $sql = "SELECT * FROM customer where account_no='$actno2'";
	$result = $conn->query($sql);
	while($row=$result->fetch_assoc()){
		$accountstatus2= $row["accountstatus"];
		$total=$accountstatus2 - $amount;

	$sql = "UPDATE customer SET accountstatus='$total'  WHERE account_no=$actno2";

	$sql2 = "SELECT * FROM customer where account_no='$actno'";
	$result = $conn->query($sql2);
	//check if account is not in database
	if ($result->num_rows ==0) {			
  			echo "<script>alert('Transfer not completed')</script>";
  		}
  		//end
	while($row=$result->fetch_assoc()){
		$email= $row['email'];
		$name1 = $row['name'];
		$accountstatus3= $row["accountstatus"];
		$total1=$accountstatus3 + $amount;

	$sql2 = "UPDATE customer SET accountstatus ='$total1'  WHERE account_no=$actno";
		
		if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {

			$to=$email;
			$subject = 'Transaction Alert [credit]';
			$body= 'Dear "$name1"'. "\n\n".'We wish to inform you that a credit transaction on your account with us' . "\n\n". 'The details of this transaction are shown below'. "\n\n". 'Amount : "$amount"'. "\n\n". 'Current Balance: "$total1"';
			$headers= 'From: Lloyds Bank <contact@Lloydsbank.com>';

			mail($to, $subject, $body, $headers);



			echo "<script>alert('Transfer completed')</script>";
			
		} else {
		
			echo "<script>alert('Opps! please contact customer care')</script>";
		}
		}
		}


	
// $id=$_GET['del'];

// $sql = "delete * from contactus where id =$id";
// $result = $conn->query($sql);
 
// $msg="Query Deleted Successfully";

}





 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Howdy! <?php echo $_SESSION['username']; ?> </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Transaction</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Customer transaction</div>
							<div class="panel-body">

								<div>
									<h4 class="text-center">Enter Sender and Receiver Account number from the box below</h4>

									<form action="transaction.php" method="POST">
							
								<div class="form-group">
								    <label for="text">Senders account no:</label>
								    <input type="text" class="form-control"  name="actno2" required="">
								  </div><br>

								<div class="form-group">
								    <label for="text">Receivers account no:</label>
								    <input type="text" class="form-control"  name="actno" required="">
								  </div><br>

								<div class="form-group">
								    <label for="text">Amount (e.g 2004556.45)*</label>
								    <input type="text" class="form-control" name="amount" value="" required="">
								  </div><br>

								  <button type="submit" class="btn btn-default btn-block" name="submit">Transfer</button>

									</form>
								</div>


						
							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
