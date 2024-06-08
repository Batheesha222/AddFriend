<?php
require 'config.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

    if (empty($email)) {
        $msg = 'Enter Your email';
    } elseif (empty($name)) {
        $msg = 'Enter Your name';
    } elseif (empty($password)) {
        $msg = 'Enter a password';
    } elseif ($password !== $cpassword) {
        $msg = 'confirm password not matching';
    }

    $sql1 = "SELECT * FROM friends WHERE friend_email = '$email'";
    $select = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($select) > 0) {
        $msg = 'email is already exist';
    }

    if (!isset($msg)) {
        $sql2 = "INSERT INTO friends (friend_email, passwrd, profile_name) VALUES ('$email','$password','$name');";
        $insert = mysqli_query($conn, $sql2);
        header("Location:index.php?registration_successfull");
    }
}

?>

<?php
include_once 'header.php';
?>

<div class="registration">
    <div class="reg-content">
        
        <h3>Ragistration Page</h3> 
        <?php
        if (isset($msg)) {
            echo '<div class="error-box">
                <p>'. $msg .'</p>
            </div>';
        }
        ?>
        <form action="" method="post">
            <div class="row">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="row">
                <label for="name">Profile Name</label>
                <input type="text" placeholder="Name" name="name">
            </div>
            <div class="row">
                <label for="pass">password</label>
                <input type="password" placeholder="Password" name="pass" id="pass">
            </div>
            <div class="row">
                <label for="cpass">Confirm password</label>
                <input type="password" placeholder="Confirm Password" name="cpass" id="cpass">
            </div>
            <button type="submit" name="submit">Register</button>
            <button type="reset" name="clear">Clear</button>
        </form>
    </div>
</div>


<?php
include_once 'footer.php'
?>