<?php
session_start();

include 'funcao.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="Style.css">
</head>
<body>
   
    <div class="calculadora">         
        <h1>Calculadora</h1>  

        <form method="get" action="">   
            <!-- 1° Número -->
            <input type="text" name="num1" placeholder="Primeiro numero">  
            <!-- Operador -->
            <select name="oper" required>                 
                <option value="+">+</option>                 
                <option value="-">-</option>                 
                <option value=""></option>                 
                <option value="/">/</option>                 
                <option value="^">^</option>                 
                <option value="!">!</option>             
            </select> 
            <!-- 2° Número -->
            <input type="text" name="num2" placeholder="Segundo numero">             
            <br>             
            <input class="calcula" type="submit" value="Calcular">  
            <div class="container">
                <button name="salvar" class="btn-amarelo">Salvar</button>
                <button name="pegar"class="btn-cinza">Pegar Valores</button>
                <button name="m" value="memoria" class="btn-azul">M</button>
                <button name="limpar" value="apagar"class="btn-azul">Apagar Historico</button>
            </div>                    
        </form>


    <?php

    $num1 = intval($_GET['num1']);
    $oper = $_GET['oper'];
    $num2 = intval($_GET['num2']);
    
    if (isset($_GET['num1']) && isset($_GET['oper'])) {


        $res = Calcular($num1, $oper, $num2); 

        $texto = "";

        if($num2 != null){
            $texto = "$num1 $oper $num2 = $res";
            echo "<div class=\"resposta\">
                    $texto
                </div>";
        }
        elseif($num2 == null && $num1 != null){
            $texto = "$num1 $oper = $res";
            echo "<div class=\"resposta\">
                    $texto
                </div>";
        }
        
        if($texto != '') SalvarHistorico($texto);
        
    }

    if(isset($_GET['salvar'])) Salvar($num1, $oper, $num2);
    if (isset($_GET['pegar'])) Pegar();

    if (isset($_GET['m'])) {
        if (!isset($_SESSION['toggle'])) {
            $_SESSION['toggle'] = false;
        }
    
        if ($_SESSION['toggle']) Salvar($num1, $oper, $num2);
        else {
            Pegar();
        }
    
        $_SESSION['toggle'] = !$_SESSION['toggle'];
    }

    if(isset($_GET['limpar']) && $_GET['limpar'] == "apagar") LimparSessoes();

    ?>

    <h1>Histórico</h1>

    <?php

    if(isset($_SESSION['historico'])){
        foreach ($_SESSION['historico'] as $operacao){
            echo "<div class=\"historico\">
                    $operacao
                  </div>";
        }
    }

    echo "</div>";

    ?>

</body>
</html>