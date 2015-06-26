<?php session_start(); $cardapioActive = true; ?>
<html>
<head>
    <title>Pizzaria</title>
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="static/js/jquery2.1.3.js"></script>
    <script type="text/javascript">
        $(function(){
            foto1 = 'static/img/banner1.jpg';
            atual = foto1;
            foto2 = 'static/img/banner2.jpg';
            setInterval(function(){ 
                (atual == foto1) ? atual = foto2: atual = foto1;
                $('.container').css('background-image', "url("+ atual +")");
                
            }, 10000);
        });

        $(document).ready(function(){
            $('#try_login').click(function(){
                $.post('login.php', {email: $('#email').val(), password: $('#password').val()}, function(data){
                    if(data=='logado'){
                        location.reload();
                    }else{
                        alert(data);
                    }
                });
            });

            $('#logout').click(function(){
                $.post('logout.php', {}, function(data){
                    location.reload();
                });
            });

            $('#send_pizza_request').click(function(){
                var pizzas_selected = [];
                $.each($('.pizzas'), function(k,v){
                    if(v.checked==true){
                        pizzas_selected.push(v.value);
                    }
                });

                if(pizzas_selected.length!=0){
                var form = $('<form action="mostra_pedido.php" method="post">' +
                  '<input type="text" name="pizzas_selected" value="'+pizzas_selected+'" />' +
                  '</form>');
                $('body').append(form);
                form.submit();
            }else{
                alert('Selecione pelo menos uma pizza.');
            }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        
        <?php include_once 'menu.tpl.php'; ?>

        <div class='corpo'>
            <p class='title'>Cardápio</p>
            <table class='cardapio' cellpadding="10">
                <tr>
                    <td></td>
                    <td>Selecione pizza(s) desejada(s)</td>
                </tr>
                <?php
                    include "conexao_banco.php";

                    $sql = "SELECT * FROM pizzas;";
                    $query = mysqli_query($conexao,$sql);
                    $n = mysqli_num_rows($query);

                    if ($n>0){
                        for($i=0;$i<$n;$i++){
                            if($i==0 || $i%2==0){
                                echo "<tr>";
                            }

                            $pizzas = mysqli_fetch_row($query);
                            echo "
                            <td>
                                <img src='".$pizzas[3]."' height='91' width='92' style='float:left;'>
                                <b style='float:left;'>".$pizzas[1]."</b><br><br>
                                <span class='descricao' style='float:left;'>".$pizzas[2]."</span><br><br><br>
                                <span class='preco' style='float:left;'>Pequena: ".$pizzas[4]." | Média: ".$pizzas[5]." | Família: ".$pizzas[7]." | Grande: ".$pizzas[6]."</span>
                            </td>
                            <td><input type='checkbox' name='pizzas' class='pizzas' value='".$pizzas[0]."'></td>
                            ";

                            if($i==0 || $i%2==0){
                                echo "<tr>";
                            }
                        }
                    }else{
                        echo "
                            <tr>
                                <td>
                                    Sem pizzas no momento.
                                </td>
                            </tr>
                        ";
                    }

                    mysqli_close($conexao);
                ?>
                <tr>
                    <td><button id='send_pizza_request' style='float:right;' <?php if(!isset($_SESSION['name'])){echo "disabled=true";} ?>>Fazer Pedido</button></td>
                </tr>
            </table>

            <div class='footer'>
                 <span class='endereco'>R. Ibituruna, 108 - Maracanã, Rio de Janeiro - RJ, 20271-020</span><br>
                 <span class='telefone'>(21) 2574-8888  </span>
                 <span class='horario'>Aberto hoje · 07:00 – 22:00</span>
            </div>
        </div>
    </div>
</body>
</html>