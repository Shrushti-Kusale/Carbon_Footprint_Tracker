<?php
include "db.php";

$msg="";
$error="";

if(isset($_POST['save'])){

    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password']; // keep plain text

    // Check if username exists
    $check=$conn->prepare("SELECT id FROM users WHERE username=?");
    $check->bind_param("s",$username);
    $check->execute();
    $res=$check->get_result();

    if($res->num_rows>0){
        $error="Username already exists!";
    } else {

        $stmt=$conn->prepare(
            "INSERT INTO users(name,username,password) VALUES(?,?,?)"
        );
        $stmt->bind_param("sss",$name,$username,$password);
        $stmt->execute();

        $msg="Account created! You can login now.";
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

<h2 style="color:#1b5e20;">🌿 Create Account</h2>
<p>Join Carbon Tracker</p>

<form method="post">
<input name="name" placeholder="Full Name" required>
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>

<button name="save">Create Account</button>
</form>

<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
<?php if($msg) echo "<p style='color:green;'>$msg</p>"; ?>

<p>
Already have an account?
<a href="login.php">Login</a>
</p>

</div>
