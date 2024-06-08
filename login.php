<?php
require 'config.php';
session_start();

if (isset($_POST['submit'])) {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);
    $sql1 = "SELECT * FROM friends WHERE friend_email = '$email';";
    $checkResult = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($checkResult);

    if (empty($email)) {
        $msg = 'Enter Your email';
    } elseif (empty($password)) {
        $msg = 'Enter a password';
    }elseif(mysqli_num_rows($checkResult)==0){
        $msg = 'No account in database. Create a account';
    }elseif($password != $row['passwrd']){
        $msg = 'Wrong Password.Try again';
    }


if (!isset($msg)) {
    
    $sql2 = "SELECT * FROM friends WHERE friend_email = '$email' and passwrd  = '$password'";
    $select = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select); //row ekt dagannawa
        $_SESSION['user_name'] = $row['profile_name'];
        // $_SESSION['num_friends'] = $row['num_of_friends'];
        $_SESSION['user_id'] = $row['friend_id'];
        header('Location:friendlist.php?logingsuccess_userId=""');
    }
}
}
?>


<?php
include_once 'header.php'
?>

<div class="login">
    <div class="login-content">
        <h3>Login Page</h3>
        <form action="" method="post">
            <?php 
            if (isset($msg)) {
                echo '<div class="error-box">
                    <p>'. $msg .'</p>
                </div>';
            }
            ?>
            <div class="row">
                <label for="email">Email</label>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="row">
                <label for="pass">password</label>
                <input type="password" placeholder="Password" name="pass" id="pass">
            </div>
            <button type="submit" name="submit">Log In</button>
            <button type="reset" name="submit">Clear</button>
        </form>
    </div>

</div>


<?php
include_once 'footer.php'
?>