<?php

require('config.php');

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


function create_player() {
    
    global $db;
    
    if(isset($_POST['name']))
    {
        $name = $_POST['name'];  if ($name == '') {unset($name);}
    }
    if(isset($_POST['power']))
    {
        $power = $_POST['power'];  if ($power == '') {unset($power);}
        if (!preg_match("|^[\d]+$|", $power)) {
            header("Location: /?error=number");
            exit();
        }
    }
    if(isset($_POST['health']))
    {
        $health = $_POST['health'];  if ($health == '') {unset($health);}
        if (!preg_match("|^[\d]+$|", $health)) {
            header("Location: /?error=number");
            exit();
        }
    }
    
    if (isset($name) && isset($power) && isset($health)) {
        $result = mysqli_query ($db, "INSERT INTO users (name, power, health, level, expirience, level_points) VALUES ('$name','$power','$health','1','0','0')");
        if ($result == true) {
            $_SESSION['name'] = $name;
            header("Location: /arena/");
            exit();
        }
        else {
            $message = "Допущена ошибка при создании персонажа";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
    else {
        $message = "Не все поля заполнены";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

function load_player($name) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
    $myrow = mysqli_fetch_array($result);
    
    return $myrow;
}

function battle($name) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
    $user = mysqli_fetch_array($result);
    
    $user_health = $user['health'];
    $user_power = $user['power'];
    
    $enemy_health =  rand (1,9);
    $enemy_power =  rand (1,9);
    
    $resultat['health'] = $enemy_health;
    $resultat['power'] = $enemy_power;
    
    if ($user_power > $enemy_health && $enemy_power > $user_health) {
        $resultat['result'] = "<span style='color: orange;'>Ничья</span>";
    }
    elseif ($user_power > $enemy_health) {
        $resultat['result'] = "<span style='color: green;'>Победа</span>";
        $expirience = mysqli_query($db, "UPDATE users SET expirience=expirience+1 WHERE name='$name'");
        
        $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
        $user = mysqli_fetch_array($result);
        
        $check_expa = $user['expirience'] / 3;
        
        if (is_int($check_expa)) {
            $expirience = mysqli_query($db, "UPDATE users SET level=level+1, level_points=level_points+3 WHERE name='$name'");
        }
    }
    elseif ($enemy_power > $user_health) {
        $resultat['result'] = "<span style='color: red;'>Поражение</span>";
        $expirience = mysqli_query($db, "UPDATE users SET expirience='0' WHERE name='$name'");
    }
    else {
        $resultat['result'] = "<span style='color: orange;'>Ничья</span>";
    }
    
    return $resultat;
}

function levels_up($name, $level) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
    $user = mysqli_fetch_array($result);
    
    if ($level == "health" && $user['level_points'] != 0 && $user['health'] < 9) {
        $health = mysqli_query($db, "UPDATE users SET health=health+1, level_points=level_points-1 WHERE name='$name'");
    }
    if ($level == "power" && $user['level_points'] != 0 && $user['power'] < 9) {
        $power = mysqli_query($db, "UPDATE users SET power=power+1, level_points=level_points-1 WHERE name='$name'");
    }
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
    $user = mysqli_fetch_array($result);
    
    return $user['level_points'];
}

function load_save($name) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users_save WHERE name='$name' LIMIT 3");
    
    while($row = mysqli_fetch_assoc($result))
    {
        $save[] = $row;
    }
    
    return $save;
}

function count_save($name) {
    global $db;
    
    $result = mysqli_query($db, "SELECT id FROM users_save WHERE name='$name'");
    $count_save = mysqli_num_rows($result);
    
    return $count_save;
}

function save_profile($name, $item) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE name='$name'");
    $user = mysqli_fetch_array($result);
    
    if ($item == 1 || $item == 2 || $item == 3) {
        $save_profile = mysqli_query($db, "INSERT INTO users_save (user_id, name, power, health, level, expirience, level_points) VALUES ('$user[id]','$user[name]','$user[power]','$user[health]', '$user[level]', '$user[expirience]','$user[level_points]') ");
    }
    else {
        $save_profile = mysqli_query($db, "UPDATE users_save SET power='$user[power]', health='$user[health]', level='$user[level]', expirience='$user[expirience]', level_points='$user[level_points]' WHERE id='$item'");
    }
}

function load_profile($name, $item) {
    global $db;
    
    $result = mysqli_query($db, "SELECT * FROM users_save WHERE id='$item'");
    $user = mysqli_fetch_array($result);
    
    $result = mysqli_query($db, "UPDATE users SET power='$user[power]', health='$user[health]', level='$user[level]', expirience='$user[expirience]', level_points='$user[level_points]' WHERE name='$name'");

    header("Location: /arena/");
    exit();
}

?>