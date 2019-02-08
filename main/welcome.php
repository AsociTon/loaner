<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$name = $_POST['name'];
echo($name);
echo shell_exec("python C:\\xampp\\htdocs\\hack\\main_prog.py 1 0 0 225000 30000 1 1 10.76 11090.86 ");
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
            <input type="text" name="annual_income">
            <br>
            <input type="text" name="interest_rate">
            <br>
            <input type="text" name="DTI">
            <br>
            <input type="text" name="total_payment">
            <br>
            <input type="text" name="analyse">
        </form>    
    </div>
</body>
</html>