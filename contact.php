<?php
	session_start();
	require_once 'libs/mailer/security.php';
	// echo e('<script>alert(1);</script>');

	$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
	$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];
	$success = isset($_SESSION['success']) ? $_SESSION['success'] : [];
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Featherwebs">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"><!-- bootstrap css -->
  	<title></title>
</head>
<body>



<article class="container contactpage-wrapper">
	


	<section class="row">
		<div class="col-xs-12 contact-us-heading">
			<h1> Contact Us </h1>
		</div>
	</section>
	<section class="row">
		
		<section class="col-md-6 col-sm-12 col-xs-12">
			<!-- section for errors -->
			<?php if(!empty($errors)): ?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 	<strong>Warning!</strong> 
				 	<ul>
				 		<li><?php echo implode('</li><li>', $errors); ?> </li>
				 	</ul>			
				</div>		
			<?php endif; ?>
			<!-- section for errors -->

			<!-- section for success -->
			<?php if(!empty($success)): ?>
				<div class="alert alert-success alert-dismissible" role="alert">
				 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				 	<strong>Email Sent!</strong> 
				 	<ul>
				 		<li><?php echo implode('</li><li>', $success); ?></li>
				 	</ul>			
				</div>		
			<?php endif; ?>
			<!-- section for errors -->
			<form class="form-horizontal" method="post" action="contact-process.php">

				<div class="form-group contactpage-form">
				    <label for="inputName" class="col-sm-2 control-label">Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="contactpage-form-inside form-control" id="inputName" placeholder="Full Name" name="full_name" <?php echo isset($fields['name']) ? 'value ="' . e($fields['name']) . '"' : '' ?>>
				    </div>
				</div>

			  <div class="form-group contactpage-form">
			    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="contactpage-form-inside form-control" id="inputEmail3" placeholder="Email" name="email" <?php echo isset($fields['email']) ? 'value ="' . e($fields['email']) . '"' : '' ?>>
			    </div>
			  </div>

			  	<div class="form-group contactpage-form">
				    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
				    <div class="col-sm-10">
				      <input type="number" class="contactpage-form-inside form-control" id="inputPhone" placeholder="Contact number" name="contact_number" <?php echo isset($fields['phone']) ? 'value ="' . e($fields['phone']) . '"' : '' ?>>
				    </div>
				</div>

				<div class="form-group contactpage-form">
				    <label for="inputComment" class="col-sm-2 control-label">Comment</label>
				    <div class="col-sm-10">
				      <textarea class="contactpage-form-inside form-control" id="inputComment" resize="false" placeholder="Whats on your mind?" name="comment"><?php echo isset($fields['comment']) ? e($fields['comment']) : '' ?></textarea>
				    </div>
				</div>
			  
			  <div class="form-group contactpage-form">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="contactpage-form btn btn-default">Submit</button>
			    </div>
			  </div>
			</form>
		</section>
	</section>
</article>


<script type="text/javascript" src="js/cdn.js"></script><!-- jquery library -->
<script type="text/javascript" src="js/bootstrap.min.js"></script><!-- bootstrap css -->
</body>
</html>

<?php 
unset($_SESSION['errors']);
unset($_SESSION['fields']);
unset($_SESSION['success']);
?>