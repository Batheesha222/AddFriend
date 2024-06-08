<?php
require_once 'config.php';
session_start();
include_once 'header.php';


?>

<div class="friendadd">
    <div class="friendadd-content">
        <?php
        if (isset($_SESSION['user_name'])) {
            $userId = $_SESSION['user_id'];
            // $sql = "SELECT * from friends WHERE friend_id = '$userId'; ";
            // $result = mysqli_query($conn,$sql);
            // $row  = mysqli_fetch_assoc($result);
            // $num_friends = .$row['num_of_friends'];
            $sql = "SELECT * from myfriends WHERE friend_id1 = '$userId'; ";
            $result = mysqli_query($conn,$sql);
            $num_friends = mysqli_num_rows($result);
            
            echo '<h3>'.$_SESSION['user_name']."'s Add friend Page</h3>";
            echo '<p>Total number of friends is :'.$num_friends.'</p>';
        }
        ?>
        <?php
        $user = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
        $sql1 = "SELECT * FROM friends WHERE friend_id != $user_id AND friend_id NOT IN (SELECT friend_id2 FROM myfriends where friend_id1 = $user_id)";
        $row = mysqli_query($conn, $sql1);
        
        $tot_rows = mysqli_num_rows($row);
        $rows_for_pg = 5;
        $start;
        if (!isset($_GET['prev_pg']) and !isset($_GET['next_pg']) and !isset($_GET['successfully_addedfriend_counted'])) {
            $start = $_SESSION['st'] = 0;
        } else {
            $start = $_SESSION['st'];
        }

        if (isset($_GET['prev_pg']) and $start != 0) {
            $start -= $rows_for_pg;
            if ($start < 0) {
                $start = 0;
            }
            $_SESSION['st'] = $start;
        } elseif (isset($_GET['next_pg']) and $start != $tot_rows) {
            $start += $rows_for_pg;
            if ($start > $tot_rows) {
                $start = $tot_rows;
            }
            $_SESSION['st'] = $start;
            if (($_SESSION['st'] + $rows_for_pg) >= $tot_rows) {
                $_SESSION['st'] = $tot_rows;
            }
        }
        // $sqlflist = "SELECT friend_id2 FROM myfriends where friend_id1 = $user_id;";
        $sql = "SELECT * FROM friends WHERE friend_id != $user_id AND friend_id NOT IN (SELECT friend_id2 FROM myfriends where friend_id1 = $user_id) 
                LIMIT $rows_for_pg OFFSET $start;";
        $select = mysqli_query($conn, $sql);

        if ($select) {
            while ($row = mysqli_fetch_assoc($select)) {
                $_SESSION['friend_name'] = $row['profile_name'];
                echo
                '<table style ="width:80%">
                
                    <tr>
                        <td style ="width:50%">' . $row['profile_name'] . '</td>
                        <td style ="width:50%">
                        <a href="updatefrlist.php?updatefriend_Id='.$row['friend_id'].'"><button>Add friend</button></a>
                        </td>
                    </tr>
                </table>';
            }
        }
        ?>
        <div class="pg-btn" style="margin: 1rem;">
            <?php if ($_SESSION['st'] != 0) {
                echo '<a href="friendadd.php?prev_pg">prev</a>';
            }
            ?>
            <?php if ($_SESSION['st'] != $tot_rows) {
                echo '<a href="friendadd.php?next_pg">next</a>';
            }
            ?>


        </div>
        <div class="content-btn">
            <a class="btn" href="friendlist.php">friend List</a>
            <a class="btn" href="logut.php">Logout</a>
        </div>
    </div>
</div>



<?php
include_once 'footer.php'
?>