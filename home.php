<?php require_once "headers/session.php" ?>

<script>

    $.ajax({
        url: "home/dashboard.php",
        type: 'get',
        success: function (data) {
            document.getElementById("dashboard").innerHTML = data;
            var scripts = document.getElementById("dashboard").getElementsByTagName("script");

            for (var i = 0; i < scripts.length; i++)
                eval(scripts[i].innerHTML);
        }
    });


    $(function () {
        $("#nav_dashboard").on("click", function () {
            $.ajax({
                url: "home/dashboard.php",
                type: 'get',
                success: function (data) {
                    document.getElementById("dashboard").innerHTML = data;
                    var scripts = document.getElementById("dashboard").getElementsByTagName("script");
                    eval(scripts[0].innerHTML);
                },
            });
        });
    });
</script>

<nav class="navbar navbar-dark navbar-expand-sm sticky-top bg-dark">
    <a class="navbar-brand" href="#">
        <img src="icons/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        CMA Hospital
    </a>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#" class="nav-link" id="nav_dashboard">Dashboard</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    Account
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Settings</a>
                    <a href="login/logout.php" class="dropdown-item" data-toggle="modal" data-target="#logout_modal">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="modal fade" id="logout_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Logout</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                Do you need to logout?
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick="window.location.href = '/cma/login/logout.php'">Logout
                </button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="container" style="padding-top: 7px;">
    <?php
    $name = $_SESSION["name"];
    $who = $_SESSION['job_tag'];

    if ($_SESSION['show_greeting']) {
        $warning = "Hello <strong>$who $name</strong>, Welcome to the System!";
        displaySuccess($warning);
        $_SESSION["show_greeting"] = false;
    }

    ?>
</div>


<div id="dashboard" class="container-fluid"></div>


