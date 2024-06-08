<?php
require 'config.php';
session_start();

?>

<?php
include_once 'header.php'
?>
<div class="friendlist">
    <div class="friendlist-content">

        <?php
        if (isset($_SESSION['user_name'])) {
            $userId = $_SESSION['user_id'];
            // $sql = "SELECT * from friends WHERE friend_id = '$userId'; ";
            // $result = mysqli_query($conn,$sql);
            // $row  = mysqli_fetch_assoc($result);
            // $num_friends = .$row['num_of_friends'];
            $sql = "SELECT * from myfriends WHERE friend_id1 = '$userId'; ";
            $result = mysqli_query($conn, $sql);
            $num_friends = mysqli_num_rows($result);

            echo '<h3>' . $_SESSION['user_name'] . "'s Add friend Page</h3>";
            echo '<p>Total number of friends is :' . $num_friends . '</p>';
            if ($num_friends == 0) {
                echo '<hr>';
            } else {
                $user = $_SESSION['user_name'];
                $user_id = $_SESSION['user_id'];
                $sql1 = "SELECT * from myfriends WHERE friend_id1='$user_id'";
                $row = mysqli_query($conn, $sql1);
                $tot_rows = mysqli_num_rows($row);
                $rows_for_pg = 5;
                $start;
                if (!isset($_GET['prev_pg']) and !isset($_GET['next_pg']) and !isset($_GET['successfully_unfriend'])) {
                    $start = $_SESSION['stl'] = 0;
                } else {
                    $start = $_SESSION['stl'];
                }

                if (isset($_GET['prev_pg']) and $start != 0) {
                    $start -= $rows_for_pg;
                    if ($start < 0) {
                        $start = 0;
                    }
                    $_SESSION['stl'] = $start;
                } elseif (isset($_GET['next_pg']) and $start != $tot_rows) {
                    $start += $rows_for_pg;
                    if ($start > $tot_rows) {
                        $start = $tot_rows;
                    }
                    $_SESSION['stl'] = $start;
                    if (($_SESSION['stl'] + $rows_for_pg) >= $tot_rows) {
                        $_SESSION['stl'] = $tot_rows;
                    }
                }

                $sql = "SELECT * FROM myfriends WHERE friend_id1='$user_id' LIMIT $rows_for_pg OFFSET $start;";
                $select = mysqli_query($conn, $sql);
                // $_SESSION['num_friends'] = mysqli_num_rows($select); //friendl gna gnnwa
                if ($select) {
                    while ($row = mysqli_fetch_assoc($select)) {
                        $myFriendId = $row['friend_id2'];

                        $sqlf = "SELECT * FROM friends WHERE friend_id = '$myFriendId'";
                        $sqlExcute = mysqli_query($conn, $sqlf);
                        $row2 = mysqli_fetch_assoc($sqlExcute);
                        // $_SESSION['friend_name'] = $row['profile_name'];

                        echo
                            '<table style ="width:80%">
                                <tr>
                                    <td style ="width:50%">' . $row2['profile_name'] . '</td>
                                    <td style ="width:50%">
                                    <a href="updatefrlist.php?Unfriend_Id=' . $row['friend_id2'] . '"><button>Unfriend</button></a>
                                    </td>
                                </tr>
                            </table>';
                    }
                }
            }
        }
        ?>

        <div class="pg-btn" style="margin: 1rem;">
            <?php 
            $userId = $_SESSION['user_id'];
            $sql = "SELECT * from myfriends WHERE friend_id1 = '$userId'; ";
            $result = mysqli_query($conn, $sql);
            $num_friends = mysqli_num_rows($result);
            if ($num_friends != 0) {
                if ($_SESSION['stl'] != 0) {
                    echo '<a href="friendlist.php?prev_pg">prev</a>';
                }
                if ($_SESSION['stl'] != $tot_rows) {
                    echo '<a href="friendlist.php?next_pg">next</a>';
                }
            }
            ?>


        </div>
        <div class="content-btn">
            <a class="btn" href="friendadd.php">Add friends</a>
            <a class="btn" href="logut.php">Logout</a>
        </div>
    </div>
</div>


<?php
include_once 'footer.php'
?>