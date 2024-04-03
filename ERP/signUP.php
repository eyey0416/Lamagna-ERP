<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up - ERP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        require('./conection.php');
        $errorMessage = '';
        $successMessage = '';

        if (isset($_POST['signUP_button'])) {
            $name = $_POST['name'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confPassword = $_POST['confiPassword'];
            
            if (!empty($_POST['name']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                if ($password == $confPassword) {
                    $p = crud::connect()->prepare('INSERT INTO crudtable(name, lastName, email, pass) VALUES(:n, :l, :e, :p)');
                    $p->bindValue(':n', $name);
                    $p->bindValue(':l', $lastName);
                    $p->bindValue(':e', $email);
                    $p->bindValue(':p', $password);
                    $p->execute();
                    $successMessage = 'User added successfully!';
                } else {
                    $errorMessage = 'Passwords do not match!';
                }
            } else {
                $errorMessage = 'All fields are required!';
            }
        }
    ?>
    <div class="form update-form">
        <div class="title">
            <p>Sign Up</p>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Name" class="input-field">
            <input type="text" name="lastName" placeholder="Last Name" class="input-field">
            <input type="email" name="email" placeholder="Email" class="input-field">
            <input type="password" name="password" placeholder="Password" class="input-field">
            <input type="password" name="confiPassword" placeholder="Confirm Password" class="input-field">
            <input type="submit" value="Sign Up" name="signUP_button" class="submit-button"> 
            <a href="./login.php" class="link">Already have an account? Sign in</a>
            <div class="error-message"><?php echo $errorMessage; ?></div>
            <div class="success-message"><?php echo $successMessage; ?></div>

            <?php if (!empty($errorMessage)) { ?>
                <div class="error-message"><?php echo $errorMessage; ?></div>
            <?php } ?>

            <?php if (!empty($successMessage)) { ?>
                <div class="success-message"><?php echo $successMessage; ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
