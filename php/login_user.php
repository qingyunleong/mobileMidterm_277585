<?php
if (!isset($_POST)) {
    echo "failed";
}
include_once("dbconnect.php");

$email = $_POST['email'];
$password = sha1($_POST['password']);
$sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$email' AND user_password
= '$password'";

$result = $conn->query($sqllogin);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $userlist = array();
        $userlist['id'] = $row['user_id'];
        $userlist['name'] = $row['user_name'];
        $userlist['email'] = $row['user_email'];
        $userlist['phone'] = $row['user_phone'];
        $userlist['address'] = $row['user_address'];
        $userlist['regdate'] = $row['user_datereg'];
        $userlist['otp'] = $row['otp'];
        echo json_encode($userlist);
        return;
    }
} else {
    echo "failed";
}
?>
