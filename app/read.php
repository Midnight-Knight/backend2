<?php
$conn = new mysqli("db", "user", "password", "appDB");

if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

$sql = "SELECT id, nickname FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>read</title>
    </head>
    <body>
        <div class="block">
            <div>
                <h4>id</h4>
                <h4>username</h4>
            </div>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div>" . "<p>" . $row["id"] . "</p>" . "<p>" . $row["nickname"] . "</p>" . "</div>";
                    }
                } else {
                    echo "<div>" . "Нет данных" . "</div>";
                }
            ?>
            <div>
                <a href="index.php">назад</a>
            </div>
        </div>
    </body>
</html>