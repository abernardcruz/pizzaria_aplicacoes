<?php
	session_start();
	
	if(isset($_POST)){
		if(empty($_POST['email'])){
            echo 'insert email';
		}else if(empty($_POST['password'])){
            echo 'insert your password';
		}else{
			include "conexao_banco.php";

			$sql = "SELECT * FROM clientes WHERE email like '".$_POST['email']."' AND senha like '".$_POST['password']."';";
            $query = mysqli_query($conexao,$sql);

            if(mysqli_num_rows($query) == 1){
            	$user = mysqli_fetch_array($query);
            	$_SESSION['id'] 	      = $user[0];
            	$_SESSION['name'] 	= $user[1];
            	$_SESSION['email'] 	= $user[2];

            	echo 'logado';
            }else{
            	echo 'usuario os senha invalidos';
            }

            mysqli_close($conexao);
		}
	}
?>