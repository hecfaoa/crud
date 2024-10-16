<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./table.css">
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>name</th>
                <th>last name</th>
                <th>email</th>
                <th>password</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require('./conection.php');
            $p = crud::select();
if (isset($_GET['id'])) {
   $id=$_GET['id'];
  $e=crud::delete($id); 
}

            if (count($p)>0) {
                foreach ($p as $datarow) {
                    echo '<tr>';
                    echo "  <td>".$datarow['name']."</td>";
                    echo "  <td>".$datarow['lastname']."</td>";
                    echo "  <td>".$datarow['email']."</td>";
                    echo "  <td>".$datarow['password']."</td>";
                    echo '<td><a href="users.php?id='.$datarow['id'].'"> delete</a></td>';
                    echo '<td><a href="update.php?id='.$datarow['id'].'"> edit</a></td>';
                    echo '</tr>';

                }
            } else {
                # code...
            }
            

            if (isset($_POST['login_button'])) {
                $_SESSION['validate'] = false;
                $name       = $_POST['name'];
                $password   = $_POST['password'];
                $p = crud::conect()->prepare('SELECT * FROM crudtable WHERE name=:n AND password=:p');
                $p->bindValue(':n', $name);
                $p->bindValue(':p', $password);
                $p->execute();
                $p->fetch(PDO::FETCH_ASSOC);

                if ($p->rowCount() > 0) {
                    $_SESSION['name'] = $name;
                    $_SESSION['pass'] = $password;
                    $_SESSION['validate'] = true;
                    header('location:home.php');
                } else {
                    echo "estas seguro que estas registrado";
                }
            }
            ?> </tbody>

    </table>
</body>

</html>