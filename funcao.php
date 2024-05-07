<?php

function Calcular($num1, $oper, $num2){
    $res = '';
    switch ($oper) {
        case '+':
            $res = $num1 + $num2;
            break;
        case '-':
            $res = $num1 - $num2;
            break;
        case '*':
            $res = $num1 * $num2;
            break;
        case '/':
            if($num2 != 0) {
                $res = $num1 / $num2;
            }
            else{
                echo 'Não é possível dividir por 0';
            }
            break;
        case '^':
            $res = 1;
            for($i = 0; $i < $num2; $i++){
                $res *= $num1;
            }
            break;
        case '!':
            $res = 1;
            for($i = $num1; $i > 1; $i--){
                $res *= $i;
            }
            break;
        
        default:
            
            break;
    }

    return $res;
}

function SalvarHistorico($operacao){
    $_SESSION['historico'][] = "<li>$operacao</li>";
}

function LimparSessoes(){
    if (!isset($_SESSION)) session_start();

    $_SESSION['historico'] = array();
}

function Salvar($num1, $oper, $num2){
    if($num1 && $oper) {
        $num1 = isset($_GET['num1']) ? $_GET['num1'] : '';
        $oper = isset($_GET['oper']) ? $_GET['oper'] : '';
        $num2 = isset($_GET['num2']) ? $_GET['num2'] : '';
        
        $_SESSION['inputs'] = array('num1' => $num1, 'oper' => $oper, 'num2' => $num2);
    }
}

function Pegar(){
    $num1 = isset($_SESSION['inputs']['num1']) ? $_SESSION['inputs']['num1'] : '';
    $oper = isset($_SESSION['inputs']['oper']) ? $_SESSION['inputs']['oper'] : '';
    $num2 = isset($_SESSION['inputs']['num2']) ? $_SESSION['inputs']['num2'] : '';
        
    if ($num1 !== '' && $oper !== '') {
        $res = Calcular(intval($num1), $oper, intval($num2));
        $texto = "$num1 $oper $num2 = $res";
        SalvarHistorico($texto);
    }
    
}