<?php
include "db.php";

$error="";

if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];

    $stmt=$conn->prepare(
        "SELECT * FROM users WHERE username=? AND password=?"
    );
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();

    if($result->num_rows>0){
        $_SESSION['user']=$result->fetch_assoc();
        header("Location: home.php");
        exit();
    } else {
        $error="Login failed. Check username or password.";
    }
}
?>

<link rel="stylesheet" href="style.css">

<style>
body{
    background:url("LoginSignup.png") no-repeat center center fixed;
    background-size:cover;
}
.card{
    background:rgba(255,255,255,0.95);
}
</style>

<div class="card" style="width:350px;margin:100px auto;text-align:center;">

<h2 style="color:#1b5e20;">🌿 Carbon Tracker</h2>
<p>Track and reduce your carbon footprint</p>

<form method="post">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>
</form>

<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>

<p>
New here?
<a href="signup.php">Create Account</a>
</p>

</div>
