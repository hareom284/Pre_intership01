<!DOCTYPE html>
<html>
<head>
<title> University Admission Systm</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body class="d-flex flex-column">
<?php 
 require 'header.php';
?>
<div class="container " id="maincontent">
    
    <div class="row " style="text-align:center">
        <h1 style="padding:10px">Please Select Your Program</h1>
        <div class="col-sm-6"><a href="application.php">
		<div class="category">
			<img src="/img/student.jpg" width="100%" height="200px" class="rounded"/><br /><br />
			<h4>Undergraduate Program</h2>
    </div>
	    </a></div>
        <div class=" col-sm-6"><a href="/siit/index.php/component/siit_admission_system/?controller=registration_form&Itemid=448">
		<div class="category">
			<img src="/img/graduate.jpg" width="100%" height="200px"/><br /><br />
			<h4>Graduate Program</h2>
        </div>
	    </a></div>     

        
    </div>
</div>
<br><br>
<?php 
require 'footer.php';
 ?>

</body>
</html>