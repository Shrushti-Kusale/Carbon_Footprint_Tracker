<?php include "db.php"; ?>
<link rel="stylesheet" href="style.css">

<div class="card" style="width:320px;margin:100px auto;">
<h2>Signup</h2>

<form method="post">
<input name="name" placeholder="Name" required>
<input name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="save">Signup</button>
</form>

<?php
if(isset($_POST['save'])){
$conn->query("INSERT INTO users(name,username,password)
VALUES('$_POST[name]','$_POST[username]','$_POST[password]')");
echo "Account created! <a href='login.php'>Login</a>";
}
?>
</div>
