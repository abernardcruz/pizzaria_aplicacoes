<?php
    $con = mysqli_connect("localhost","root", "", "pizzaria");
    if(mysqli_connect_errno()){
        $erro = mysqli_connect_error();
        echo $erro;
        echo "<script>
                    alert('".$erro."');
             </script>";      
    }else{
        mysqli_autocommit($con, false);    
    }
?>