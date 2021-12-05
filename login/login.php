<?php include 'server.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign In</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/new/shrimp16.png">

</head>
<body>
  <div class="header">
  	<h2>Sign In</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" placeholder="ชื่อผู้ใช้งาน">
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" placeholder="รหัสผ่าน">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user" style="cursor: pointer">Sign In</button>
  	</div>
  	<p>
  		ยังไม่มีรหัสผ่าน? <a href="register.php">Register</a>
  	</p>
  </form>
</body>
</html>