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

  <div class="container">
    <h1>Calculadora</h1>

    <form method="get" action="">
      <input type="text" name="num1" placeholder="Primeiro numero">
      <select name="operation" required>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="^">^</option>
        <option value="!">!</option>
      </select>
      <input type="text" name="num2" placeholder="Segundo numero">

      <input class="calcula" type="submit" value="Calcular">
      <div class="container-button">
        <button name="pegar" class="btn-cinza">Pegar Valores</button>
        <button name="m" value="memoria" class="btn-black">M</button>
        <button name="limpar" value="limpar" class="btn-danger">Apagar Historico</button>
      </div>
    </form>


    <?php

    $num1 = intval($_GET['num1']);
    $operation = $_GET['operation'];
    $num2 = intval($_GET['num2']);

    if (isset($_GET['num1']) && isset($_GET['operation'])) {

      $result = Calcular($num1, $operation, $num2);

      $equacao = "";

      if ($num2 != null) {
        $equacao = "$num1 $operation $num2 = $result";
        echo '<div class="equacao">' . $equacao . "</div>";
      }

      if ($equacao != '')
        AddHistorico($equacao);
    }

    if (isset($_GET['pegar']))
      Pegar();

    if (isset($_GET['m'])) {
      if (!isset($_SESSION['toggle'])) {
        $_SESSION['toggle'] = false;
      }

      if ($_SESSION['toggle']) {
        Pegar();
      }

      $_SESSION['toggle'] = !$_SESSION['toggle'];
    }

    if (isset($_GET['limpar']) && $_GET['limpar'] == "limpar")
      LimparHistorico();

    ?>



    <?php

    if (isset($_SESSION['historico'])) {
      echo '<div class="historico">';
      echo " <h2>Histórico</h2>";
      foreach ($_SESSION['historico'] as $operacao) {
        echo "<div>" . $operacao . "</div>";

      }
      echo "</div>";

      echo "</div>";
    }

    ?>

</body>

</html>