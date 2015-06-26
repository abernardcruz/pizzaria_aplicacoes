<?php session_start(); $contatoActive = true; ?>
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
        });
    </script>
</head>
<body>
    <div class="container">
        
        <?php include_once 'menu.tpl.php'; ?>

        <div class='corpo'>
            <p class='title'>Contato:</p>
            <div class='contato'>
                <span class='endereco'>R. Ibituruna, 108 - Maracanã, Rio de Janeiro - RJ, 20271-020</span><br>
                 <span class='telefone'>(21) 2574-8888  </span>
                 <span class='horario'>Aberto hoje · 07:00 – 22:00</span>

            </div>
            <table class='cardapio' cellpadding="10">
                <th>Fale conosco:</th>
                <tr>
                    <td>
                        <span>Seu Nome: </span>
                        <input size='40' type='text' name='nome'>
                    </td>
                    <td>
                        <span>Seu email: </span>
                        <input size='40' type='text' name='email'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Seu bairro: </span>
                        <input size='40' type='text' name='bairro'>
                    </td>
                    <td>
                        <span>Seu telefone: </span>
                        <input size='40' type='text' name='telefone'>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <span>Sua mensagem: </span><br>
                        <textarea cols="90" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button>Enviar</button>
                    </td>
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