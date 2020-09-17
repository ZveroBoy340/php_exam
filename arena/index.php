<?  session_start();

    include "../function.php";

    if ($_SESSION['name']) {
        $myrow = load_player($_SESSION['name']);
    }
    else {
        header("Location: /");
        exit();
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
    <link rel="stylesheet" href="/css/styles.css">
    <title>Арена - Подготовка к битве!</title>
</head>
<body>
<div class="container mt-5">
    <div class="card user-info">
        <div class="card-body text-center">
            <h3><? echo $myrow['name']; ?></h3>
            <div class="inline">
                Сила: <? echo $myrow['power']; ?>
            </div>
            <div class="inline">
                Здоровье: <? echo $myrow['health']; ?>
            </div>
            <div class="inline">
                Уровень: <? echo $myrow['level']; ?>
            </div>
            <div class="inline">
                Опыт: <? echo $myrow['expirience']; ?>
            </div>
            <div class="inline-block mt-3">
                <a href="/battle/" class="btn btn-warning">В бой!</a>
                <a href="/levels/" class="btn btn-success">Настройка навыков</a>
            </div>
            <div class="save-parameters mt-3">
                <a href="/profile/" class="btn btn-info">Сохранить / Загрузить</a>
            </div>
        </div>
    </div>
</div>
<h1></h1>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>