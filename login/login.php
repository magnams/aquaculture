<?php include 'server.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>เข้าสู่ระบบ</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>เข้าสู่ระบบ</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">เข้าสู่ระบบ</button>
  	</div>
  	<p>
  		ยังไม่มีรหัสผ่าน? <a href="register.php">ลงทะเบียน</a>
  	</p>
  </form>
</body>
</html>