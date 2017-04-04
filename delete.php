<?php include('connection.php');
ob_start();
if (isset($_REQUEST['email'])){
								$id9=$_REQUEST['email'];	
$del1 = "DELETE FROM contacts WHERE id=$id9";

if ($conn->query($del1) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
								header("Refresh:0; url=delete.php");
								}

								

								
?>

<!DOCTYPE html>
<html lang="en">


<head>



<script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Integral - A fully responsive, HTML5 based admin template">
<meta name="keywords" content="Responsive, Web Application, HTML5, Admin Template, business, professional, Integral, web design, CSS3">
<title>Contact Form</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='' />
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
	
			<div class="bounce-1"></div>
			<div class="bounce-2"></div>
		</div>
	  <!-- /loader -->
	</div>
<!-- loader backgrop -->

<!-- Page container -->
<div class="page-container">
  <!-- Page Sidebar -->
  <?php include("sidebar.php");?>
  
  <!-- /page sidebar -->
  
  <!-- Main container -->
  <div class="main-container">
  
	<!-- Main header -->
	<!-- /main header -->
	
	<!-- Main content -->
	<div class="main-content">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="title">Contact List</h3>
				<div class="table-responsive">
				
					<table class="table table-users table-bordered table-hover table-striped">
						<tbody>
						<tr >
						<th >Users
						</th>
						<th>Name
						</th>
						<th>Email
						</th>
						<th>Phone
						</th>
						<th>Action
						</th>
					
						</tr>
						
							<?php
if ($allcontacts->num_rows > 0) {
    // output data of each row
    while($row = $allcontacts->fetch_assoc()) {
         $id =$row["id"];
        $firstname =$row["firstname"];
        $lastname =$row["lastname"];
        $email =$row["email"];
        $phonenumber =$row["phonenumber"];
        $status =$row["status"];
       
	?>
							<tr>
								<td><i class="icon-user"></i></td>
								
								<td><strong> <?php echo $firstname; ?> <?php echo $lastname; ?></strong></td>
								<td class="text-center"><?php echo $email; ?></td>
								<td class="text-center"><?php echo $phonenumber; ?></td>
								<td class="text-center">
								
<a class="btn btn-danger" onclick='javascript:confirmationDelete($(this));return false;' href="delete.php?email=<?php echo $id;?>" >Delete</a>
</td>
								
								
								
							</tr>
							
							<?php }
}

?>


		
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Footer -->
			
		<!-- /footer -->
		
	  </div>
	  <!-- /main content -->
	  
  </div>
  <!-- /main container -->
  
</div>
<!-- /page container -->
<script language="JavaScript" type="text/javascript"> 
<!-- 
function confirmationAdd(button)
{
   var conf = confirm('Are you sure want to Add this record?');
   if(conf)
  header('Location:data.php');
}
success: function(data) {
    if (data == "refresh"){
      window.location.reload(); // This is not jQuery but simple plain ol' JS
    }
  }
//--> 
</script>

<!--Load JQuery-->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="plugins/metismenu/js/jquery.metisMenu.js"></script>
<script src="plugins/blockui-master/js/jquery-ui.js"></script>
<script src="plugins/blockui-master/js/jquery.blockUI.js"></script>
<script src="js/functions.js"></script>


<script language="JavaScript" type="text/javascript"> 
<!-- 
function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
//--> 
</script> 

</body>


</html>
