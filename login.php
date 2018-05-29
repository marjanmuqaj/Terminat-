<?php
session_start();
require 'log/DB/dbconnect.php';
$message = "";

try {
    if (isset($_POST["Submit"]))
    {
        if (empty($_POST["username"]) && empty($_POST["password"]))
        {
            $message = 'Schreiben Nutzername und Passwort';
        }
        elseif (empty($_POST["username"]))
        {
            $message = 'Schreiben Nutzername';
        }
        elseif (empty($_POST["password"]))
        {
            $message = 'Schreiben Passwort';
        }

      else
      {
          $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $connect->prepare($query);
        $statement->execute(array(
            'username' => $_POST["username"],
            'password' => $_POST["password"]
          ));
        $count = $statement->rowCount();
          if ($count > 0)
          {
            $_SESSION["username"] = $_POST["username"];
            echo "<script>location.href='home.php';</script>";
            echo "suksesss";

          }
          else
          {
               $message='Gabim!';
          }
      }
    }
}
catch (PDOException $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="log/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="log/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="log/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="log/css/util.css">
	<link rel="stylesheet" type="text/css" href="log/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('log/images/f.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					KYQU
				</span>
				<form action="" method="POST" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Sheno Username">
						<input  class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Sheno Passwordin">
						<input class="input100" type="password" name="password" placeholder="Passwordi">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

                    <h4 align="center" style="background-color: ; color: red;margin-top: 5%;" ><?php  echo $message; ?><h4 >
                    <div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="Submit"  type="submit">
							Login
						</button>
					</div>
					

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="log/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/bootstrap/js/popper.js"></script>
	<script src="log/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/daterangepicker/moment.min.js"></script>
	<script src="log/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="log/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="log/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</body>
</html>
