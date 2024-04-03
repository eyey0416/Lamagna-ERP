<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - ERP</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container2">
        <table class="table-container">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
                require('./conection.php');
                $p=crud::Selectdata();
                if (isset($_GET['id'])) {
                    $id=$_GET['id'];
                    $e=crud::delete($id);
                }
                if (count( $p) > 0) {
                    for ($i = 0; $i < count( $p); $i++) { 
                        echo '<tr>';
                        foreach ( $p[$i] as $key => $value) {
                            if ($key != 'id') {
                                echo '<td>'.$value.'</td>';
                            }
                        }
            ?>

                        <td><a href="users.php?id=<?php echo $p[$i]['id'] ?>"><img src="./trash.svg" alt="" srcset=""></a></td>
                        <td><a href="upDate.php?id_up=<?php echo $p[$i]['id'] ?>"><img src="./edit.svg" alt="" srcset=""></a></td>
            <?php
                        echo '</tr>';
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
