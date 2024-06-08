<?php
require_once "config.php";
session_start();

if (isset($_GET['updatefriend_Id'])) {
    $user = $_SESSION['user_name'];
    $userId = $_SESSION['user_id'];
    $friendId = $_GET['updatefriend_Id']; //add friend ge id ek

    $insert = "INSERT INTO myfriends(friend_id1,friend_id2) VALUES ($userId,$friendId);";
    $result = mysqli_query($conn, $insert);

    // ---------for update friend database--------

    // for($i=1 ;$i<=17;$i++){
    // $sqlfrNum = "SELECT * FROM myfriends WHERE friend_id1 = '$i';";
    // $resultfrNum = mysqli_query($conn, $sqlfrNum);

    // $countFr = mysqli_num_rows($resultfrNum);

    // $insertNoFriends = "UPDATE friends SET num_of_friends=$countFr where friend_id = '$i';";
    // $resultInputNumFriends = mysqli_query($conn, $insertNoFriends);
    // }



    // ----------------count friends-----------------
    $sqlfrNum = "SELECT * FROM myfriends WHERE friend_id1 = '$userId';";
    $resultfrNum = mysqli_query($conn, $sqlfrNum);

    $countFr = mysqli_num_rows($resultfrNum); //user t inn friends la gana...

    $insertNoFriends = "UPDATE friends SET num_of_friends=$countFr where friend_id = '$userId';";
    $resultInputNumFriends = mysqli_query($conn, $insertNoFriends);

    header("Location:friendadd.php?successfully_addedfriend_counted");
}

if (isset($_GET['Unfriend_Id'])) {
    $unfriendId = $_GET['Unfriend_Id'];
    $userId = $_SESSION['user_id'];

    $sqlDel = "DELETE FROM myfriends WHERE friend_id1 = $userId and friend_id2 = $unfriendId;";
    $resultDel = mysqli_query($conn, $sqlDel);

        // ----------------count friends-----------------

    $sqlfrNum = "SELECT * FROM myfriends WHERE friend_id1 = '$userId';";
    $resultfrNum = mysqli_query($conn, $sqlfrNum);
    // $rowfrNum = mysqli_fetch_assoc($resultfrNum);

    $countFr = mysqli_num_rows($resultfrNum); //user t inn friends la gana...

    $insertNoFriends = "UPDATE friends SET num_of_friends=$countFr where friend_id = '$userId';";
    $resultInputNumFriends = mysqli_query($conn, $insertNoFriends);

    header("Location:friendlist.php?successfully_unfriend");
}
