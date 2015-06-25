<?php session_start(); ?>
<html>
<head>
    <title>Pizzaria</title>
    <link rel="stylesheet" type="text/css" href="static/css/style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="static/js/jquery2.1.3.js"></script>
    <script type="text/javascript" src="static/js/script.js"></script>
    <script type="text/javascript">
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
        });
    </script>
</head>
<body>
    <div class="container">
        <div class='menu'>
            <img class='logo' src="static/img/logo.png">
            <div>
                <div class="login">
                <?php if(isset($_SESSION['name'])){ 
                    echo "
                    <table>
                        <tr>
                            <td>
                                logged as: ".$_SESSION['name']."
                            </td>
                        </tr>
                    </table>
                    ";
                }else { 
                    echo "
                    <table>
                        <tr>
                            <td><input type='text' name='email' id='email' placeholder='Email'></td>
                        </tr>

                        <tr>
                            <td><input type='password' name='password' id='password' placeholder='Password'></td>
                        </tr>

                        <tr>
                            <td><button style='float:right;' id='try_login'>Entrar</button></td>
                        </tr>
                    </table>";
                } ?> 
                </div>
                <ul>
                    <a href="index.php"><li>Home</li></a>
                    <a href="cardapio.php"><li>Cardápio</li></a>
                    <a href="contato.php"><li>Contato</li></a>
                </ul>
            </div>
        </div>
        <div class='corpo'>
            <div class='chamadas chamada-1'>
                <p>Rodízio</p>
                    Todos os dias: R$34,90 <br>
                    exceto às terças (folga semanal)
            </div>
            <div class='chamadas chamada-2'>
                <p>Reservas</p>
                 Aceitamentos reservas somente por <br>
                    telefone, até as 20:00
            </div>
            <div class='chamadas chamada-3'>
                <p>Manobrista</p>
                 Contamos com serviço de estacionamento <br>
                    e manobrista.
            </div>
            <div class='chamadas chamada-4'>
                <p>Promoção!</p>
                 De domingo a quinta, exceto feriados,<br>
                 rodízio com refrigerante e suco de laranja à <br>
                 vontade - servido pelo garçom!
            </div>
            <div class='footer'>
                 <span class='endereco'>R. Ibituruna, 108 - Maracanã, Rio de Janeiro - RJ, 20271-020</span><br>
                 <span class='telefone'>(21) 2574-8888  </span>
                 <span class='horario'>Aberto hoje · 07:00 – 22:00</span>
            </div>
        </div>
    </div>
</body>
</html>