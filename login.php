<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signUP.css">
    <title>sign in</title>
</head>

<body>

    <?php
    require('./conection.php');

    if (isset($_POST['login_button'])) {
        $_SESSION['validate']=false;
        $name       = $_POST['name'];
        $password   = $_POST['password'];
        $p = crud::conect()->prepare('SELECT * FROM crudtable WHERE name=:n AND password=:p');
        $p->bindValue(':n', $name);
        $p->bindValue(':p', $password);
        $p->execute();
        $p->fetch(PDO::FETCH_ASSOC);

            if ($p->rowCount() > 0) {
                $_SESSION['name']=$name;
                $_SESSION['pass']=$password;
                $_SESSION['validate']=true;
                header('location:home.php');
            } else {
                echo "estas seguro que estas registrado";
            }
        
    }
    ?>

    <div class="form">
        <div class="title">
            <p>Sign In</p>
        </div>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="name">
            <input type="text" name="password" id="password" placeholder="password">
            <input type="submit" value="login" name="login_button">
        </form>
    </div>
</body>

</html>