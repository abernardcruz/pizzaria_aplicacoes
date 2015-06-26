<?php
	session_start();

	$client_id 	= $_SESSION['id'];
	$data	 	= $_POST['data'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>	
	<script type="text/javascript">
	console.log($('#email').val());
	</script>
</head>
<body>
	<input type='text' class='form-control' id='email' <?php echo "value='".$data."'"; ?> >
</body>
</html>