<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST["id"];
    
    $conn = new mysqli("db", "user", "password", "appDB");

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "DELETE FROM users WHERE id='$id'";

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
        <title>delete</title>
    </head>
    <body>
        <form method="post" class='block'>
            <div>
                <h4>ID:</h4>
                <input type="text" name="id" value="<?php echo $id; ?>">
            </div>
            <div>
                <input type="submit" value="Удалить">
            </div>
    </form>
    </body>
</html>