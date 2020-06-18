<?php 
	include ('db/db.php');
	//session_start();
?>
<nav class="navbar navbar-inverse navbar-fixed-top navbar-inner" style="background-color: midnightblue; padding-top:39px;">

  <div class="container-fluid">

     
<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    <div class="navbar-header">

      <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button> -->
      <a class="navbar-brand" href="index.php" style="margin-bottom: 19px; text-align: right;"><img src="lloyldbank.png" width="130" height="45"></a>
    </div>


    <div class="collapse navbar-collapse" id="myNavbar">
           

  <div class="menu1">
  <ul class="nav navbar-nav navbar-right" >
  <li ><a href="accounts.php" style="color: white">Accounts</a></li>
  <li><a href="#loans" style="color: white">Loans and Morgages</a></li>
  <li><a href="cards.php" style="color: white">Cards</a></li>
  <li><a href="pos.php" style="color: white">Payment Solutions</a></li>
  <li><a href="contacts.php" style="color: white">Contact us</a></li>
   <!-- <button class="btn btn-warning" style="margin-top: 7px;"><a href="internetbanking.php">Internet Banking</a></button> -->
  </ul>
  </div>
        
       
    </div>
  </div>
</nav>
	<!-- /header -->