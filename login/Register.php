<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/new/shrimp16.png">

</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label for ='username'>Username</label>
  	  <input type="text" name="username" value="" placeholder="ชื่อผู้ใช้งาน">
  	</div>
	<div class="input-group">
  	  <label for ='email'>Email</label>
  	  <input type="text" name="email" value="" placeholder="อีเมล">
  	</div>
	<div class="input-group">
  	  <label for ='Firstname'>Firstname</label>
  	  <input type="text" name="Firstname" value="" placeholder="ชื่อ">
  	</div>
	<div class="input-group">
  	  <label for ='Lastname'>Lastname</label>
  	  <input type="text" name="Lastname" value="" placeholder="นามสกุล">
  	</div>
	<div class="input-group">
  	  <label for ='user_number'>User Number</label>
  	  <input type="text" name="user_number" value="" placeholder="หมายเลขประจำตัว">
  	</div>
  	<div class="input-group">
  	  <label for ='password'>Password</label>
  	  <input type="password" name="password_1" placeholder="รหัสผ่าน">
  	</div>
  	<div class="input-group">
  	  <label for ='password'>Confirm Password</label>
  	  <input type="password" name="password_2" placeholder="ยืนยันรหัสผ่าน">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		มีรหัสผ่านเรียบร้อยแล้ว? <a href="login.php">Sign In</a>
  	</p>
  </form>
</body>
</html>