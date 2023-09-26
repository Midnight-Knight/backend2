<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nickname = $_POST["nickname"];
    
    $conn = new mysqli("db", "user", "password", "appDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (nickname) VALUES ('$nickname')";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>create</title>
    </head>
    <body>
        <form method="post" class="block">
            <div>
                Никнейм: <input type="text" name="nickname">
            </div>
            <input type="submit" value="Создать">
        </form>
    </body>
</html>