<?  session_start();
    include "function.php";

    if ($_POST['name']) {
        create_player();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Создание персонажа - BattleRPG</title>
</head>
<body class="text-center">

<div class="container">
    <h2 class="mb-5">Создание персонажа</h2>
    <form class="form-group row mt-5 justify-content-center" method="post" action="">
      <div class="form-group mb-2">
        <input type="text" class="form-control" name="name" id="name" maxlength="30" value="">
        <label for="name">Имя персонажа</label>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="number" class="form-control" name="power" id="power" min="1" max="9" value="">
        <label for="power">Сила</label>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <input type="number" class="form-control" name="health" id="health" min="1" max="9" value="">
        <label for="health">Здоровье</label>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Создать персонажа</button>
    </form>
    <? if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
             Указывайте значение силы и жизни числом!
        </div>
    <? } ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>