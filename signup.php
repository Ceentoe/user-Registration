<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="styles/bootstrap.min.css">
	<script src="styles/jquery-3.4.1.min.js"></script>
	<script src="styles/popper.min.js"></script>
	<script src="styles/bootstrap.min.js"></script>
	<script src="styles/all.js"></script>
	<script type="text/javascript" src="styles/jscript.js"></script>
	<link href="styles/login.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid padding">
		<div class="row padding">
			<div class="col">
				<div class="header">
					<h2>Create Student Account</h2>
				</div>
				<div class="banner jumbotron">
					
					<h3 class="head">Please enter student details below to Create account</h3>

					<div class="signup">
						<form class="signup-form" action="function/signup_inc.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" name="fname" placeholder="First Name">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="lname" placeholder="Last Name" >
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="userid" placeholder="Registration Number" oninput="upperCase()">
							</div>

							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="E-mail">
							</div>
							
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder="Password">
							</div>

							<div class="form-group">
				 				<input type="submit" id="btnLogin" class="btn btn-basic btn-block" name="submit" value="Create Account">
							</div>
						</form>
						<?php
							$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

							if(strpos($fullUrl, "signup=empty")==true){
                                echo "<p class='errormessage'>Please check and enter all fields</p>";
                                exit();
							}

							elseif(strpos($fullUrl, "invalidEmail")==true){
								echo "<p class='errormessage'>Please check your email address</p>";
								exit();
							}

							elseif(strpos($fullUrl, "userAlreadyExists")==true){
								echo "<p class='errormessage'>The registration number already exists. Please pick another</p>";
								exit();
							}

							elseif(strpos($fullUrl, "wrongPwd")==true){
								echo "<p class='errormessage'>Please check your password!</p>";
								exit();
							}

							elseif(strpos($fullUrl, "errorr")==true){
								echo "<p class='errormessage'>Please Log In</p>";
								exit();
                            }
                           
                        ?> 
					</div>
					
				</div>
			</div>
		</div>
		
		
	</div>

</body>
</html>