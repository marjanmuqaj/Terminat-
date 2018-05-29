<?php  
function PDO_CONNECT(){
	$dbPDO = new PDO("mysql:host=localhost;dbname=app", 'root', 'root');
	$dbPDO->exec("SET CHARACTER SET utf8");
	$dbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$dbPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $dbPDO;
}

function check_user(){
session_start();
  
  
if (isset($_SESSION['username']) && $_SESSION['username'] == true) {

} else {
   // echo"Please log in first to see this page.";
    echo "<script>location.href='login.php';</script>";
  //header('location:loggin.php');
}

}
?>