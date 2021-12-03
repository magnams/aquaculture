<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>หน้าหลัก</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="header">
	<h2>หน้าหลัก</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>ยินดีต้อนรับ <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">ออกจากระบบ</a> </p>
    <?php endif ?>
</div>
		
<script>
	let timerInterval
	Swal.fire({
	title: 'Redirect to Application',
	html: 'I will close in <b></b> milliseconds.',
	timer: 2555,
	timerProgressBar: true,
	didOpen: () => {
		Swal.showLoading()
		const b = Swal.getHtmlContainer().querySelector('b')
		timerInterval = setInterval(() => {
		b.textContent = Swal.getTimerLeft()
		}, 100)
	},
	willClose: () => {
		clearInterval(timerInterval)
	}
	}).then((result) => {
	/* Read more about handling dismissals below */
	if (result.dismiss === Swal.DismissReason.timer) {
		console.log('I was closed by the timer');
		document.location = "../feed_list.php";
	}
	})
</script>
</body>
</html>

