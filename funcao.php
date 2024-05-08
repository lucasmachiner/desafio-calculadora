<?php

function Calcular($num1, $operation, $num2)
{
    $result = '';
    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        case '/':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                echo 'Não é possível dividir por 0';
            }
            break;
        case '^':
            $result = 1;
            for ($i = 0; $i < $num2; $i++) {
                $result *= $num1;
            }
            break;
        case '!':
            $result = 1;
            for ($i = $num1; $i > 1; $i--) {
                $result *= $i;
            }
            break;

        default:

            break;
    }

    return $result;
}

function AddHistorico($equacao)
{
    $_SESSION['historico'][] = "<strong>$equacao</strong>";
}

function LimparHistorico()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $_SESSION['historico'] = array();
}

function Pegar()
{
    $num1 = isset($_SESSION['inputs']['num1']) ? $_SESSION['inputs']['num1'] : '';
    $operation = isset($_SESSION['inputs']['oper']) ? $_SESSION['inputs']['oper'] : '';
    $num2 = isset($_SESSION['inputs']['num2']) ? $_SESSION['inputs']['num2'] : '';

    if ($num1 !== '' && $operation !== '') {
        $result = Calcular((float) $num1, $operation, (float) $num2);
        $texto = "$num1 $operation $num2 = $result";
        AddHistorico($texto);
    }

}