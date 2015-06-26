<?php session_start(); $indexActive = true; ?>
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

            $('#confirma-pedido').click(function(){
                location.href = "index.php?pedido_confirmado=true"
            });

            var all_pizzas = $('.combo_tamanho');
            $('.combo_tamanho').change(function(){
                var id_for_change = this.id.split('_')[1];

                $('#pizza_'+id_for_change).text(this.value);

                calculate_total_price();
            });

            $('.combo_quantidade').change(function(){
                calculate_total_price();
            });

            function calculate_total_price(){
                var total_value = 0;
                $.each(all_pizzas, function(k,v){
                    var mutiple_for = '#quantidade_'+v.id.split('_')[1];
                    var qty = $(mutiple_for).val();
                    total_value += parseFloat(v.value)*qty;
                })
                $('#price-total').text(total_value.toFixed(2));
            }

            calculate_total_price(1);
        });
    </script>
</head>
<body>
    <div class="container">
        
        <?php include_once 'menu.tpl.php'; ?>

        <div class='corpo'>
            <p class='title'>Seu pedido</p>
            
            <div class='conta-pagar'>
                <table class='table-conta-pagar'>
                    <tr>
                        <th>Pizza</th>
                        <th>Tamanho</th>
                        <th>Quantidade</th>
                        <th>Valor</th>
                    </tr>
                    <?php
                        include "conexao_banco.php";

                        $sql = "SELECT * FROM pizzas WHERE id in (".$_POST['pizzas_selected'].");";
                        $query = mysqli_query($conexao,$sql);
                        $n = mysqli_num_rows($query);

                        for($i=0;$i<$n;$i++){
                            echo "<tr>";

                            $pizzas = mysqli_fetch_row($query);
                            echo "
                            <td><span>".$pizzas[1]."</span></td>
                            ";

                            echo "
                                <td>
                                    <select id='combo_".$pizzas[0]."' class='combo_tamanho'>
                                        <option value='".$pizzas[4]."' selected='true'>Pequena</option>
                                        <option value='".$pizzas[5]."'>Media</option>
                                        <option value='".$pizzas[6]."'>Grande</option>
                                        <option value='".$pizzas[7]."'>Familia</option>
                                    </select>
                                </td>
                            ";

                            echo "
                                <td>
                                    <select id='quantidade_".$pizzas[0]."' class='combo_quantidade'>
                                        <option value='1' selected='true'>1</option>
                                        <option value='2'>2</option>
                                        <option value='3'>3</option>
                                        <option value='4'>4</option>
                                    </select>
                                </td>
                            ";

                            echo "
                            <td><span id='pizza_".$pizzas[0]."'>".$pizzas[4]."</span></td>
                            ";

                            echo "</tr>";
                        }

                        mysqli_close($conexao);
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span id='price-total'></span></td>
                    </tr>
                </table>
                <button id='confirma-pedido' style='float:right;'>Confirmar Pedido</button>
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