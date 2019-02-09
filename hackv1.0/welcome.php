<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST['name'];

$ownership = array(0,0,0);
if($_POST['ownership']=="010"){
    $ownership[1]+=1;
}else if($_POST['ownership']=="001"){
    $ownership[2] +=1; 
}else{
    $ownership[0]+=1;
}    
$annual_income = (int)$_POST['annual_income'];
$loan_amount = (int)$_POST['loan_amount'];    
$term = (int)$_POST['term'];
if((int)$_POST['interest_rate']>13.0){
    $interest_rate=2;
}else
{
    $interest_rate=1;

}
$DTI = (double)$_POST["DTI"];
$total_payment = (double)$_POST["total_payment"];   
echo shell_exec("python C:\\xampp\\htdocs\\hack\\main_prog.py ".$ownership[0]." ".$ownership[1]." ".$ownership[2]." ".$annual_income." ".$loan_amount." ".$term." ".$interest_rate." ".$DTI." ".$total_payment."");

}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    <div>
        <form method="post">
            <input type="text" class="name" name="name">
            <br>
            <select name="ownership">
                <option value="010">Own</option>
                <option value="001">Rent</option>
                <option value="100">Mortgage</option>
            </select>
            <br>
            <input type="text" name="annual_income">
            <br>
            <input type="text" name="loan_amount">
            <br>
            <select name="term">
                <option value="1">36 Months</option>
                <option value="2">60 Months</option>
            </select>
            <br>
            <input type="text" name="interest_rate">
            <br>
            <input type="text" name="DTI">
            <br>
            <input type="text" name="total_payment">
            <br>
            <input type="submit" name="analyse">
        </form>    
    </div>
</body>
</html>