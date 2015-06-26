<?php session_start(); $cardapioActive = true; ?>
<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title>Pizzaria</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="bskit, bootstrap starter kit, bootstrap builder">
	<meta name="description" content="Business Startup &amp; Prototyping HTML Framework">
	
	<link rel="shortcut icon" href="ico/favicon.png">
	
	<!-- Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Style Library -->
	<link href="css/style-library-1.css" rel="stylesheet">
	
	<!-- Vendor Styles -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.transitions.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	
	<!-- Block Styles (Feel free to remove any that you aren't using in your final export) -->
	<link href="css/header-1.css" rel="stylesheet">
	<link href="css/header-2.css" rel="stylesheet">
	<link href="css/header-3.css" rel="stylesheet">
	<link href="css/promo-1.css" rel="stylesheet">
	<link href="css/promo-2.css" rel="stylesheet">
	<link href="css/promo-3.css" rel="stylesheet">
	<link href="css/content1-1.css" rel="stylesheet">
	<link href="css/content1-2.css" rel="stylesheet">
	<link href="css/content1-3.css" rel="stylesheet">
	<link href="css/content1-4.css" rel="stylesheet">
	<link href="css/content1-5.css" rel="stylesheet">
	<link href="css/content1-6.css" rel="stylesheet">
	<link href="css/content1-7.css" rel="stylesheet">
	<link href="css/content1-8.css" rel="stylesheet">
	<link href="css/content1-9.css" rel="stylesheet">
	<link href="css/content2-1.css" rel="stylesheet">
	<link href="css/content2-2.css" rel="stylesheet">
	<link href="css/content2-3.css" rel="stylesheet">
	<link href="css/content2-4.css" rel="stylesheet">
	<link href="css/content2-5.css" rel="stylesheet">
	<link href="css/content2-6.css" rel="stylesheet">
	<link href="css/content2-7.css" rel="stylesheet">
	<link href="css/content2-8.css" rel="stylesheet">
	<link href="css/content2-9.css" rel="stylesheet">
	<link href="css/content2-10.css" rel="stylesheet">
	<link href="css/content3-1.css" rel="stylesheet">
	<link href="css/content3-2.css" rel="stylesheet">
	<link href="css/content3-3.css" rel="stylesheet">
	<link href="css/content3-4.css" rel="stylesheet">
	<link href="css/content3-5.css" rel="stylesheet">
	<link href="css/content3-6.css" rel="stylesheet">
	<link href="css/content3-7.css" rel="stylesheet">
	<link href="css/content3-8.css" rel="stylesheet">
	<link href="css/content3-9.css" rel="stylesheet">
	<link href="css/content3-10.css" rel="stylesheet">
	<link href="css/content3-11.css" rel="stylesheet">
	<link href="css/gallery-1.css" rel="stylesheet">
	<link href="css/gallery-2.css" rel="stylesheet">
	<link href="css/team-1.css" rel="stylesheet">
	<link href="css/team-2.css" rel="stylesheet">
	<link href="css/pricing-tables-1.css" rel="stylesheet">
	<link href="css/pricing-tables-2.css" rel="stylesheet">
	<link href="css/contact-1.css" rel="stylesheet">
	<link href="css/contact-2.css" rel="stylesheet">
	<link href="css/contact-3.css" rel="stylesheet">
	<link href="css/blog-1.css" rel="stylesheet">
	<link href="css/shop-1.css" rel="stylesheet">
	<link href="css/shop-2.css" rel="stylesheet">
	<link href="css/shop-3.css" rel="stylesheet">
	<link href="css/shop-4.css" rel="stylesheet">
	<link href="css/shop-5.css" rel="stylesheet">
	<link href="css/shop-6.css" rel="stylesheet">
	<link href="css/shop-7.css" rel="stylesheet">
	<link href="css/footer-1.css" rel="stylesheet">
	<link href="css/footer-2.css" rel="stylesheet">
	<link href="css/footer-3.css" rel="stylesheet">
	<link href="css/footer-4.css" rel="stylesheet">
	<link href="css/footer-5.css" rel="stylesheet">
    
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    
    <div id="page" class="page">
            
    <?php include_once "header.tpl.php"; ?>
    <!-- Start Shop 1-4 -->
    <section id="shop-1-4" class="content-block-nopad shop-1-4">
    	<div class="container">
    		<div class="row">

				<div class="col-md-12">
					<table class="table table-hover">
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
				</div>
				
			</div><!-- /.row -->
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<button class='btn btn-default pull-right' id='confirma-pedido'>Confirma Pedido</button>
				</div>
			</div><!-- /.row -->
							
    	</div><!-- /.container -->
	</section>
    <!--// End Shop 1-4 --><!-- Start Copyright Bar 2 -->
        <?php include_once "footer.tpl.php"; ?>
        <!--// End Copyright Bar 2 --></div><!-- /#page -->


    <!-- Scripts at the end... you know the score! -->
	<!-- Core Scripts (Do not remove) -->
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>			
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-hover-dropdown.min.js"></script>
	
	<!-- Vendor Scripts (Feel free to remove any that you aren't using in your final export) -->
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/headroom.js"></script><!-- Header 1 -->
	<script type="text/javascript" src="js/jquery.headroom.js"></script><!-- Header 1 -->
	<script type="text/javascript" src="js/count.down.min.js"></script><!-- Promo 2 Countdown -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script><!-- Owl Carousel -->
	<script type="text/javascript" src="js/jquery.counterup.min.js"></script><!-- Content 2-7 Counter -->
	<script type="text/javascript" src="js/waypoints.min.js"></script><!-- Content 2-7 Counter -->
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script><!-- Gallery Filter -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script><!-- Gallery Popup -->
	<script type="text/javascript" src="js/sendmail.js"></script><!-- Contact Form -->
	<script type="text/javascript" src="js/contact-form.php"></script><!-- Contact Form -->
	
	<!--
	<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
	-->
	
	<!-- Theme Scripts (Do not remove) -->
	<script type="text/javascript" src="js/bskit-scripts.js"></script>
	
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
	    	
	    	$('#confirma-pedido').click(function(){
                location.href = "index.php?pedido_confirmado=true"
            });

            /*$('#confirma-pedido').click(function(){
	    		var pizzas_to_delivery = [];

                $.each(all_pizzas, function(k,v){
                	var pizza_id = v.id.split('_')[1];
                    
                    var mutiple_for = '#quantidade_'+pizza_id;
                    var size_of = '#combo_'+pizza_id;
                    
                    var qty = $(mutiple_for).val();
                    var tam = $(size_of+' option[value="'+$(size_of).val()+'"]').text();
                    
                    pizzas_to_delivery.push({pizza_id: pizza_id, qty: qty, tam: tam});
                })

                $.post('salva_pedido.php', {data: pizzas_to_delivery}, function(data){
		            console.log(pizzas_to_delivery);
		            console.log(data);
		        });
            });*/

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
		})
	</script>


</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>