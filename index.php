<?php session_start(); $indexActive = true; ?>
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

            $('#logout').click(function(){
                $.post('logout.php', {}, function(data){
                    location.reload();
                });
            });

            if($('#message').val()=='true'){
                alert('Pedido confirmado com sucesso! No máximo em 30 minutos seu pedido estará chegando.');
                location.href='index.php';
            }
        });
    </script>
</head>
<body>
    <div class="container">
        
        <?php include_once 'menu.tpl.php'; ?>

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
    <?php 
        if(isset($_GET['pedido_confirmado'])){
            echo "<input type='hidden' value='".$_GET['pedido_confirmado']."' id='message'>";
        }
    ?>
</body>
</html>