<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>ลงทะเบียนใช้งาน</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>ลงทะเบียน</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label for ='username'>Username</label>
  	  <input type="text" name="username" value="">
  	</div>
	<div class="input-group">
  	  <label for ='email'>Email</label>
  	  <input type="text" name="email" value="">
  	</div>
	<div class="input-group">
  	  <label for ='Firstname'>ชื่อ</label>
  	  <input type="text" name="Firstname" value="">
  	</div>
	<div class="input-group">
  	  <label for ='Lastname'>นามสกุล</label>
  	  <input type="text" name="Lastname" value="">
  	</div>
  	<div class="input-group">
  	  <label for ='password'>รหัสผ่าน</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label for ='password'>ยืนยันรหัสผ่าน</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">ลงทะเบียน</button>
  	</div>
  	<p>
  		มีรหัสผ่านเรียบร้อยแล้ว? <a href="login.php">เข้าสู่ระบบ</a>
  	</p>
  </form>
</body>
</html>