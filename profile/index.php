<?  session_start();

    include "../function.php";

    if ($_POST['submit'] == "save_data") {
        save_profile($_SESSION['name'], $_POST['save']);
    }
    if ($_POST['submit'] == "load_data") {
        load_profile($_SESSION['name'], $_POST['save']);
    }

    if ($_SESSION['name']) {
        $save = load_save($_SESSION['name']);
        $count_save = count_save($_SESSION['name']);
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
    <title>Сохранение / Загрузка</title>
</head>
<body>
<div class="container mt-5">
    <div class="card user-info">
        <div class="card-body text-center">
            <h3>Сохранение / Загрузка</h3>
            <form action="" class="mt-4" method="post">
               <? if (!empty($save)) { foreach ($save as $items => $key) { $i++; ?>
               
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="save" id="save-<? echo $key['id']; ?>" value="<? echo $key['id']; ?>" <? if ($items == 0) { ?>checked<? } ?>>
                  <label class="form-check-label" for="save-<? echo $key['id']; ?>">
                      Ячейка <? echo $i; ?> (<? echo "Heal: ".$key['health']." / "."Power: ".$key['power']." / "."Lvl: ".$key['level']; ?>)
                  </label>
                </div>
               <? } } ?>
               <? if ($count_save < 1) { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="save" id="save-1" value="1" checked>
                  <label class="form-check-label" for="save-1">
                      Ячейка 1 (<span style="color: green">Свободно</span>)
                  </label>
                </div>
                <? } if ($count_save < 2) { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="save" id="save-2" value="2">
                  <label class="form-check-label" for="save-2">
                    Ячейка 2 (<span style="color: green">Свободно</span>)
                  </label>
                </div>
                <? } if ($count_save < 3) { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="save" id="save-3" value="3">
                  <label class="form-check-label" for="save-3">
                    Ячейка 3 (<span style="color: green">Свободно</span>)
                  </label>
                </div>
                <? } ?>
                <div class="inline-block mt-4">
                    <button type="submit" name="submit" value="save_data" class="btn btn-warning">Сохранить</button>
                    <button type="submit" name="submit" value="load_data" class="btn btn-success">Загрузить</button>
                </div>
            </form>
            <div class="save-parameters mt-3">
                <a href="/arena/" class="btn btn-info">На арену</a>
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