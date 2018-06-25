<?php

function auth($username, $password)
{

    global $conn;
    $user_nurse = 'Nurse';
    $user_physician = 'Physician';
    $user_support_staff = 'Support Staff';
    $user_surgeon = 'Surgeon';
    $user_owner = 'Owner';

    $user_level_nurse = 10;
    $user_level_physician = 20;
    $user_level_support_staff = 30;
    $user_level_surgeon = 40;
    $user_level_owner = 50;

//    if ($who != 'owner')
    $query = "SELECT emp_no,name,flag FROM employee WHERE username = '$username' AND password = '$password';";
//    else
//        $query = "SELECT owner_id FROM owner;";

    $results = $conn->query($query);

    $flag = 0;

    if ($results->num_rows > 0) {
        $row = $results->fetch_assoc();
        $_SESSION["show_greeting"] = true;
        $_SESSION["username"] = $username;
        $_SESSION["flag"] = $flag = $row['flag'];
        $_SESSION["emp_no"] = $row['emp_no'];
        $_SESSION["name"] = $row['name'];

        $who = '';

        if ($flag == $user_level_nurse)
            $who = $user_nurse;
        elseif ($flag == $user_level_support_staff)
            $who = $user_support_staff;
        elseif ($flag == $user_level_surgeon)
            $who = $user_surgeon;
        elseif ($flag == $user_level_physician)
            $who = $user_physician;

        $_SESSION["job_tag"] = $who;

        echo("<meta http-equiv='refresh' content='1'>");
        exit();
    } else {


        $warning = "<strong>Username </strong>or <strong>Password</strong> is incorrect!";
        displayWaring($warning, "alert-warning");
    }
}


?>