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
    </script>
</head>
<body>
    <div class="container">
        <div class='menu'>
            <img class='logo' src="static/img/logo.png">
            <div>
                <ul>
                    <a href="index.php"><li>Home</li></a>
                    <a href="cardapio.html"><li>Cardápio</li></a>
                    <a href="contato.html"><li>Contato</li></a>
                </ul>
            </div>
        </div>

        <div class='corpo'>
            <p class='title'>Cardápio</p>
            <table class='cardapio' cellpadding="10">
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