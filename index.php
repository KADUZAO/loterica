<?php
    $url = 'https://apiloterias.com.br/app/resultado?loteria=lotofacil&token=CoT5vcYzixcJA26';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $json_response = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($json_response, true);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/trevo.svg">
    <link rel="stylesheet" href="./assets/css/page/page.css">
    <title>Loterica</title>
</head>
<body>
    <section id="mousemoving">
        <img src="./assets/img/bg/1.png" alt="format" data-speed="-5" class="layer">
        <img src="./assets/img/bg/2.png" alt="format" data-speed="5" class="layer">
        <img src="./assets/img/bg/3.png" alt="format" data-speed="2" class="layer">
        <img src="./assets/img/bg/4.png" alt="format" data-speed="6" class="layer">
        <img src="./assets/img/bg/5.png" alt="format" data-speed="8" class="layer">
        <img src="./assets/img/bg/6.png" alt="format" data-speed="-2" class="layer">
        <img src="./assets/img/bg/7.png" alt="format" data-speed="4" class="layer">
        <img src="./assets/img/bg/8.png" alt="format" data-speed="-9" class="layer">
        <img src="./assets/img/bg/9.png" alt="format" data-speed="6" class="layer">
        <img src="./assets/img/bg/10.png" alt="format" data-speed="-7" class="layer">
        <img src="./assets/img/bg/11.png" alt="format" data-speed="-5" class="layer">
        <img src="./assets/img/bg/12.png" alt="format" data-speed="5" class="layer">
    </section>
    <div class="container">
      <div class="container-one">
            <span></span><span></span><span></span><span></span>
          <div class="title">
                <img src="./assets/img/BLACK.png" alt="black">
                <p style="color: #fff; text-align:center;">Ganhadores com 14 acertos no último jogo: <?php echo $response["premiacao"][1]['quantidade_ganhadores']; ?></p>
            </div>
    
           <div class="form">
<?php if(!isset($_GET['jogos']) || !is_numeric($_GET['jogos']) || $_GET['jogos'] < 1 || $_GET['jogos'] > 12){ ?>
                <div class="logo">
                    <img src="./assets/img/trevo.svg" alt="trevo">
                </div>
                <div class="text">
                    <h1>Quantos jogos você deseja fazer?</h1>
                </div>
                <form action="">
                    <input type="number" name="jogos" required placeholder="*O numero máximo de jogos por vêz são 12*" oninput="if(this.value>12){this.value='12';}else if(this.value<0){this.value='1';}">
                    <button>Gerar Numeros</button>
                </form>
<?php } else{
?>  
                <div class="container-two">
                    <h1><?php if($_GET['jogos'] == 1) echo 'Seu jogo foi gerado'; else echo 'Seus '.$_GET['jogos'].' jogos foram gerados';?></h1>
                    <div class="button" onclick="window.location.reload()">Gerar Novos Numeros</div>
                    <div id="container_jogos">
        <?php 
            for($i=0; $i < $_GET['jogos']; $i++){ ?>
                        <div class="container__numembers">
                    <?php   
                            $numbers = range(1, 60);
                            shuffle($numbers);   
                            for($i2=0; $i2 < 15; $i2++){ ?>   
                                <div class="numbers">
                                    <p><?php echo str_pad($numbers[$i2], 2, '0', STR_PAD_LEFT); ?></p>
                                </div>
                    <?php    } ?>
                        </div>
<?php       } ?>
                    </div>
                </div>
<?php              
        } 
 ?>
            </div>
        </div>
    <script src="./assets/js/mousemoving.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () =>{
            url = window.location.href;
            url = url.split('?')[0];
            window.history.replaceState({}, document.title, url);
        })
    </script>
</body>
</html>