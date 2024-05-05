<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Calculadora</title>
</head>

<body>
  <div class="container-sm pt-4">
    <form method="get" class="input-group d-flex">
      <!-- <span class="input-group-text">Calcular</span> -->
      <input type="text" name="num1" placeholder="Numero 1" aria-label="First number" class="form-control w-auto">
      <select name="operation" class="form-select bg-secondary text-white text-center w-0 fw-bold"
        aria-label="Default select example">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
        <option value="^">^</option>
      </select>
      <!-- <input type="text" name="num2" aria-label="Last number" class="form-control w-auto"> -->
      <input type="text" name="num2" class="form-control w-auto" placeholder="Numero 2"
        aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-success " type="submit" id="button-addon2">Calcular</button>
    </form>
    <div>

    </div>
    <!-- <fieldset class=" ">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend> 
      <div class="row px-5 py-3">
        <div class="col-4">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1">
            First radio
          </label>
        </div>
        <div class="col-4">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Second radio
          </label>
        </div>
        <div class="col-4">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
          <label class="form-check-label" for="gridRadios3">
            Third disabled radio
          </label>
        </div>
      </div>
    </fieldset> -->
  </div>
  <?php 
    $num1 = $_GET["num1"];
    $num2 = $_GET["num2"];
    $operation = $_GET["operation"];
    
    echo "<p>" . $num1 . " " . $operation . " " .$num2 . "</p>";
    
  ?>
</body>

</html>