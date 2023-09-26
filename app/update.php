<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_GET["id"];
    $nickname = $_POST["nickname"];

    $conn = new mysqli("db", "user", "password", "appDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "UPDATE users SET nickname='$nickname' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: read.php");
        exit;
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    $id = $_GET["id"];

    $conn = new mysqli("db", "user", "password", "appDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "SELECT id, nickname FROM users WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nickname = $row["nickname"];
    } else {
        echo "Пользователь не найден.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
        <title>update</title>
    </head>
    <body>
        <form method="get" class='block'>
            <div>
                <h4>ID:</h4>
                <input type="text" name="id" value="<?php echo $id; ?>">
            </div>
            <input type="submit" value="Найти">
        </form>
        <form method="post" class='block'>
            <div>
                <h4>Никнейм:</h4>
                <div>
                    <input type="text" name="nickname" value="<?php echo $nickname; ?>">
                </div>
            </div>
            <input type="submit" value="Обновить">
        </form>
    </body>
</html>