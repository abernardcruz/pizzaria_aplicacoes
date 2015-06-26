<div class='menu'>
    <img class='logo' src="static/img/logo.png">
    <div>
        <div class="login">
            <?php if(isset($_SESSION['name'])){ 
                echo "
                <table>
                    <tr>
                        <td>
                            logged as: ".$_SESSION['name']." <a href='#' id='logout'>sair</a>
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
            <a href="index.php"><li <?php if(isset($indexActive)){ echo "class='active'"; } ?>>Home</li></a>
            <a href="cardapio.php"><li <?php if(isset($cardapioActive)){ echo "class='active'"; } ?>>Cardápio</li></a>
            <a href="contato.php"><li <?php if(isset($contatoActive)){ echo "class='active'"; } ?>>Contato</li></a>
        </ul>
    </div>
</div>