<div class='container' style="height: 100%;margin-top: 7px;">
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        echo "<script>
location.href = '/cma/';
</script>";
        exit();
    }

    require_once "login/login.php";
    require_once 'database/connection.php';


    $username = "";
//    $who = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));
//        $who = ($_POST['who']);

        auth($username, $password);
    }
    ?>

    <div style="height: 100%;display: flex;align-items: center;" class="container-fluid">
        <center style="width: 100%;">
            <div class="container" style="background-color: #1b1e2121;padding: 20px 0px;border-radius: 10px;">
                <img src="icons/img_profile.png" alt="profile" style="width: 280px;">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="text" name="username" placeholder="Username" required style="width: 280px;"
                           VALUE="<?php echo $username; ?>"><br><br>
                    <input type="password" name="password" placeholder="Password" required style="width: 280px"><br><br>

                    <input type="submit" value="Login" class="btn btn-primary"
                           style="background-color: #4CAF50;border: #4CAF50;width: 280px;">
                </form>
            </div>
        </center>
    </div>
</div>