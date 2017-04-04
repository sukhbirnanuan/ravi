<?php include('connection.php');



if (isset($_POST['update1'])){
 $id=$_POST['id'];
 $name=$_POST['name'];
 $last=$_POST['last'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 
 $phones=strlen($phone);
 if($phones!=10){
  
 }else
 {
 $sql4="UPDATE contacts SET firstname='$name', lastname='$last', email='$email', phonenumber='$phone' WHERE id='$id'";
      
       if (mysqli_query($conn, $sql4)) {
     echo "Record Updated successfully";
       }
      else {
       echo "Error updateing record: " . mysqli_error($conn);
      }
 }
 
 
 
 
}



?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.g-axon.com/integral-3.0/light/add_product.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Feb 2017 12:34:35 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Integral - A fully responsive, HTML5 based admin template">
<meta name="keywords" content="Responsive, Web Application, HTML5, Admin Template, business, professional, Integral, web design, CSS3">
<script src="phoneno-all-numeric-validation.js"></script> 
<title>Contact Form</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='images/logo.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="css/entypo.css" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="css/font-awesome.min.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->

<!-- Integral core stylesheet -->
<link href="css/integral-core.css" rel="stylesheet">
<!-- /integral core stylesheet -->

<link href="css/integral-forms.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>

<!-- Loader Backdrop -->
	
<!-- loader backgrop -->

<!-- Page container -->
<div class="page-container">

	<!-- Page Sidebar -->
	<?php include("sidebar.php"); ?>
	
 	 <!-- /page sidebar -->
  
  	<!-- Main container -->
  	<div class="main-container">
  
		<!-- Main header -->
		
		<!-- /main header -->
		
		<!-- Main content -->
		<div class="main-content">
			
			<!-- Breadcrumb -->
			
			
			
			<!-- Pan start here-->
			
			<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading clearfix">
						<h4 class="panel-title">Edit Contact</h4>
						<ul class="panel-tool-options"> 
							<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
							<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
							<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
						</ul>
					</div>
					<div class="panel-body">
						 <form action="" method="post">
						 <?php	
	
	$eml="";
if (isset($_REQUEST['email'])){
	$eml=$_REQUEST['email'];
$sql = "SELECT * FROM contacts WHERE email='$eml'";
$result = $conn->query($sql);
}
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id =$row["id"];
        $firstname =$row["firstname"];
        $lastname =$row["lastname"];
        $email =$row["email"];
        $phonenumber =$row["phonenumber"];
        $status =$row["status"];
       
        
		

	?>
							  <div class="form-group">
								<label for="emailaddress">First Name</label>
									<div class="input-group"> 
										<span class="input-group-addon"><i class="icon-user"></i></span>
										<input type="text" name="name"Value="<?php echo $firstname; ?>" class="form-control" required> 
										<input type="hidden" name="id" Value="<?php echo $id; ?>" /> 
									</div>
							  </div>
							  
							  <div class="form-group">
								<label for="emailaddress">Last Name</label>
									<div class="input-group"> 
										<span class="input-group-addon"><i class="icon-user"></i></span>
										<input type="text"  name="last" Value="<?php echo $lastname; ?>" class="form-control" required> 
									</div>
							  </div>
							  
							  <div class="form-group">
								<label for="emailaddress">Email address</label>
									<div class="input-group"> 
										<span class="input-group-addon"><i class="icon-mail"></i></span>
										<input type="email"  name="email" Value="<?php echo $email; ?>" class="form-control" required> 
									</div>
							  </div>
							  
							  <div class="form-group">
								<label for="emailaddress">Phone No.</label>
									<div class="input-group"> 
										<span class="input-group-addon"><i class="icon-mobile"></i></span>
										<input class="form-control"  Value="<?php echo $phonenumber; ?>" id="txtPhoneNo" name="phone" type="text" onkeypress="return isNumber(event)" />
									</div>
							  </div>
							  
							  <input type="hidden" name="id" Value="<?php echo $id; ?>" /> 
							  <button onclick="ValidateNo();" type="submit" name="update1" class="btn btn-primary">Update Details</button>
							   <?php }
}
?>
						</form>
					</div>
				</div>
			</div>
		</div>
			
			
			
			<!-- Pan ends here-->
		
	  </div>
	  <!-- /main content -->
	  
  </div>
  <!-- /main container -->
  
</div>
<!-- /page container -->

<script type="text/javascript">

   function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            alert("Please enter only Numbers.");
            return false;
        }

        return true;
    }

    function ValidateNo() {
        var phoneNo = document.getElementById('txtPhoneNo');

    if (phoneNo.value == "" || phoneNo.value == null) {
            alert("Please enter your Mobile No.");
            return false;
        }
        if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
            alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
            return false;
        }
        }
</script>


<!--Load JQuery-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/metismenu/js/jquery.metisMenu.js"></script>
<script src="plugins/blockui-master/js/jquery-ui.js"></script>
<script src="plugins/blockui-master/js/jquery.blockUI.js"></script>
<!--Ajax Validattion-->
<script src="js/jquery.validate.min.js"></script>
<!--Bootstrap Wizard-->
<script src="plugins/wizard/js/jquery.bootstrap.wizard.min.js"></script>
<script src="plugins/wizard/js/wizard-script.js"></script>

<script src="js/functions.js"></script>
<script src="js/loader.js"></script>
</body>

<!-- Mirrored from www.g-axon.com/integral-3.0/light/add_product.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Feb 2017 12:34:36 GMT -->
</html>
