<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">

<div class="card" style="width:320px;margin:100px auto;">
<h2>Login</h2>

<form method="post">
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>

<a href="signup.php">Create Account</a>

<?php
if(isset($_POST['login'])){
$q=$conn->query("SELECT * FROM users
WHERE username='$_POST[username]'
AND password='$_POST[password]'");

if($q->num_rows>0){
$_SESSION['user']=$q->fetch_assoc();
header("location:home.php");
}else{
echo "Login failed";
}
}
?>
</div>
