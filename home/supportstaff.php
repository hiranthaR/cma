<?php require_once "../headers/session.php"; ?>

<div class="container" style="justify-content: center;display: flex;">
    <img src="icons/img_staff.png" style="width: 70px;height: 60px" alt="">
    <h1 style="">Support Staff</h1>
</div>

<div class="container" id="alert"></div>

<?php require_once "../helper.php"; ?>

<div style="margin: 20px">
    <div class="input-group mb-3" style="width: 300px">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><h3>&#x2315; </h3></span>
        </div>
        <input type="text" class="form-control" placeholder="Search by Name" id="search" aria-label="Username"
               aria-describedby="basic-addon1">
    </div>
    <div class="row">

        <div class="col-12 col-md-9" style="margin-bottom: 10px">
            <div id="table_holder"></div>
        </div>
        <div class="col-12 col-md-3">
            <form id="support-staff-add" style="background-color: #fffffff0;border-radius: 5px;padding: 20px">
                <div class="row">
                    <h3 class="col-11" id="form-header">Insert new Illness</h3>
                    <button type="button" id="close-edit" class="close col-1" hidden>&times;</button>
                </div>
                <br><br>
                <input type="text" placeholder="Username" name="username" id="username" required
                       style="width: 100%;"><br><span class="input-error" id="error-username"></span><br>
                <input type="text" placeholder="Password" name="password" id="password" required style="width: 100%;"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"><br><span
                        class="input-error" id="error-password"></span><br>
                <input type="text" placeholder="Retype Password" name="re-password" id="re-password" required
                       style="width: 100%;"><br><span class="input-error" id="error-re-password"></span><br>
                <input type="text" placeholder="First name Last name" pattern="^[a-zA-Z\s]+$"
                       title="Name should only contain with letters and spaces!" name="name" id="user-name" required
                       style="width: 100%;"><br><br>
                <input type="radio" name="gender" value="male" checked> Male <br>
                <input type="radio" name="gender" value="female"> Female <br><br>
                <input type="text" placeholder="Address" name="address" id="address" required
                       style="width: 100%;"><br><br>
                <input type="text" placeholder="Telephone Number" name="telephone" id="telephone" required
                       style="width: 100%;"><br><span class="input-error" id="error-telephone"></span><br>
                <input type="text" placeholder="Salary" name="salary" id="salary" required
                       style="width: 100%;"><br><br>


                <input type="submit" value="Insert" name="insert" class="btn btn-primary" style="width: 200px;"
                       id="insert">
                <input type="submit" value="Edit" name="edit" class="btn btn-info" id="edit" style="width: 200px;"
                       hidden>
            </form>
        </div>
    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profile-name">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="images/user-male.png" alt="" style="width: 200px;" id="img-profile-picture"></center>
                <br>
                <span id="profile-emp-no">Employee Number: </span><br>
                <span id="profile-emp-username">Username: </span><br>
                <span id="profile-emp-gender">Gender: </span><br>
                <span id="profile-emp-address">Address: </span><br>
                <span id="profile-emp-telephone">Telephone: </span><br>
                <span id="profile-emp-annual-salary">Annual Salary: </span><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">View Dependents</button>
                <button type="button" class="btn btn-info">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>


    $(document).on('click', '.btn-delete', function () {
        var ill_id = $(this).data("id");

        if (ill_code == ill_id) {

        }

        $.ajax({
            url: 'database/illness/deleteillness.php',
            type: 'post',
            dataType: 'text',
            data: {'ill_code': ill_id},
            success: function (data) {
                document.getElementById("alert").innerHTML = "<div class=\"alert alert-success alert-dismissible fade show\" id='alert_success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button> deleted!</div>";
                loadTable();
            },
            error(e1, e2, e3) {
                alert(e3);
            }
        });
    });


    loadTable();

    function loadTable() {
        $.ajax({
            url: 'database/supportstaff/getallsupportstaff.php',
            type: 'get',
            dataType: 'html',
            success: function (data) {
                document.getElementById("table_holder").innerHTML = data;
                var scripts = document.getElementById("table_holder").getElementsByTagName("script");

                for (var i = 0; i < scripts.length; i++)
                    eval(scripts[i].innerHTML);
            },
            error(e1, e2, e3) {
                alert(e1);
                alert(e2.status);
                alert(e3);
            }
        });

    }


    $("#support-staff-add").on("submit", function (e) {
        e.preventDefault();

        if (!$("#insert").prop("hidden")) {
            $.ajax({
                url: 'database/supportstaff/addsupportstaff.php',
                type: 'post',
                dataType: 'text',
                data: $('#support-staff-add').serialize(),
                success: function (data) {

                    document.getElementById("alert").innerHTML = "<div class=\"alert alert-success alert-dismissible fade show\" id='alert_success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" + data + "</div>";
                    loadTable();
                    $('#support-staff-add').get(0).reset();
                },
                error: function (re, statusa, error) {
                    alert("error  " + re);
                    alert("error  " + statusa);
                    alert("error  " + error);
                },
            });
        } else if (!$("#edit").prop("hidden")) {

            // var data = $('#ill_add').serializeArray();
            // data['ill_code'] = ill_code;

            $.ajax({
                url: '/cma/database/illness/updateillness.php',
                type: 'post',
                dataType: 'text',
                data: $('#ill_add').serialize() + "&ill_code=" + ill_code,
                success: function (data) {

                    document.getElementById("alert").innerHTML = "<div class=\"alert alert-success alert-dismissible fade show\" id='alert_success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" + data + "</div>";
                    loadTable();
                    $('#ill_add').get(0).reset();
                    $("#close-edit").click();

                },
                error: function (re, statusa, error) {
                    alert("error  " + error);
                },
            });
        }
    });

    var ill_code;

    $(document).on('click', '.btn-edit', function () {

        $("#insert").prop('hidden', true);
        $("#form-header").text("Edit Illness data");
        $("#edit").prop('hidden', false);
        $("#close-edit").prop('hidden', false);

        var $row = $(this).closest("tr");
        var $title = $row.find(".ill-title").text();
        var $description = $row.find(".ill-description").text();
        ill_code = $row.find(".ill-code").text();


        $("#title").val($title);
        $("#description").val($description);

    });

    $("#close-edit").on('click', function () {

        $("#insert").prop('hidden', false);
        $("#form-header").text("Insert new Illness");
        $("#edit").prop('hidden', true);
        $("#close-edit").prop('hidden', true);


        $("#title").val("");
        $("#description").val("");

    });

    $("#search").keyup(function (ev) {
        $.ajax({
            url: 'database/illness/searchillness.php',
            type: 'post',
            data: {'pattern': $(this).val()},
            dataType: 'html',
            success: function (data) {
                document.getElementById("table_holder").innerHTML = data;
                var scripts = document.getElementById("table_holder").getElementsByTagName("script");

                for (var i = 0; i < scripts.length; i++)
                    eval(scripts[i].innerHTML);
            },
            error(e1, e2, e3) {
                alert(e1);
                alert(e2.status);
                alert(e3);
            }
        });

    });


    //form data validation

    var error = false;

    $("#username").on('keydown', function (ev) {
        if (ev.keyCode == 32) ev.preventDefault();
    });

    $("#username").on('keyup', function (ev) {
        $.ajax({
            url: 'database/employee/checkemployeeusername.php',
            type: 'post',
            data: {'username': $(this).val()},
            dataType: 'html',
            success: function (data) {
                $("#error-username").html(data);
                if (data === "") error = true;
                else error = false;
            },
            error(e1, e2, e3) {
                alert(e1);
                alert(e2.status);
                alert(e3);
            }
        });
    });


    $("#password").keyup(function (ev) {

        if (!$(this).val().match("(?=.*\\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")) {
            $("#error-password").html("Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters<br>");
            error = true;
        } else {
            $("#error-password").html("");
            error = false;
        }

    });

    $("#re-password").keyup(function (ev) {

        if ($(this).val() != $("#password").val()) {
            $("#error-re-password").html("password doesn't match!<br>");
            error = true;
        } else {
            $("#error-re-password").html("");
            error = false;
        }

    });

    $("#user-name").on('keypress', function (ev) {

        var key = ev.key.toLowerCase();
        if (!((key >= 'a' && key <= 'z') || key == " ")) {
            ev.preventDefault();
        }

    });

    $("#telephone").on('keypress', function (ev) {

        if ($(this).val().length < 10) {
            $("#error-telephone").html("Phone number too short!<br>");
            error = true;
        } else {
            $("#error-telephone").html("");
            error = false;
            ev.preventDefault();
        }

        if (ev.keyCode === 46 || ev.keyCode === 8 || ev.keyCode === 37 || ev.keyCode === 38 || ev.keyCode === 39 || ev.keyCode === 40) return true;
        if (isNaN(ev.key)) return false;
    });

    $("#salary").on('keypress', function (ev) {
        if (ev.keyCode === 46 || ev.keyCode === 8 || ev.keyCode === 37 || ev.keyCode === 38 || ev.keyCode === 39 || ev.keyCode === 40) return true;
        if (isNaN(ev.key)) return false;
    });

    //table row click
    $(document).on('click', '#table-support-staff tr', function (e) {

        $.ajax({
            url: 'database/supportstaff/getsupportstaff.php',
            type: 'post',
            dataType: 'json',
            data: {'emp_no': $(this).find(".emp-no").text()},
            success: function (data) {

                $("#profile-name").html("<strong>" + data['name'] + "</strong>");
                $("#profile-emp-no").html('Employee Number: <strong>' + data['emp_no'] + '</strong>');
                $("#profile-emp-username").html('Username: <strong>' + data['username'] + '</strong>');
                $("#profile-emp-gender").html('Gender: <strong>' + data['gender'] + '</strong>');
                $("#profile-emp-address").html('Address: <strong>' + data['address'] + '</strong>');
                $("#profile-emp-telephone").html('Telephone: <strong>' + data['telephone_no'] + '</strong>');
                $("#profile-emp-annual-salary").html('Annual Salary: <strong>' + data['annual_salary'] + '</strong>');

                if (data['gender'] == 'male') {
                    $("#img-profile-picture").prop('src', 'images/user-male.png');
                } else if (data['gender'] == 'female') {
                    $("#img-profile-picture").prop('src', 'images/user-female.png');
                }
            },
            error(e1, e2, e3) {
                alert(e1);
                alert(e2.status);
                alert(e3);
            }
        });

        $("#profile-modal").modal('show');
    });

</script>
