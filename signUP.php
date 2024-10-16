<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signUP.css">
    <title>sign up</title>
</head>

<body>
    <?php
    require('./conection.php');

    if (isset($_POST['signUP_button'])) {
        $name       = $_POST['name'];
        $lastname   = $_POST['lastname'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $confPassword   = $_POST['confPassword'];

        if (
            !empty($_POST['name']) &&
            !empty($_POST['lastname']) &&
            !empty($_POST['email']) &&
            !empty($_POST['password']) &&
            !empty($_POST['confPassword'])


        ) {

            if ($_POST['password'] == $_POST['confPassword']) {
                $p = crud::conect()->prepare('INSERT INTO crudtable (name, lastname, email, password) VALUES (:n,:l,:e,:p)');
                $p->bindValue(':n', $name);
                $p->bindValue(':l', $lastname);
                $p->bindValue(':e', $email);
                $p->bindValue(':p', $password);
                $p->execute();
                echo "registro creado";
            } else {
                echo "los password ingresados no son iguales";
            }
        }
    }
    ?>

    <div class="form">
        <div class="title">
            <p>Sign Up</p>
        </div>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="name">
            <input type="text" name="lastname" id="lastname" placeholder="lastname">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="password" placeholder="password">
            <input type="password" name="confPassword" id="confPassword" placeholder="confPassword">
            <input type="submit" value="sign up" name="signUP_button">
        </form>
    </div>
</body>

</html>