<?php require_once "../headers/session.php"; ?>

<div class="container" style="justify-content: center;display: flex;">
    <img src="icons/img_report.png" style="width: 30px;height: 50px" alt="">
    <h1 style="">Illnesses</h1>
</div>

<div class="container" id="alert"></div>

<?php require_once "../helper.php"; ?>

<div style="margin: 20px">
    <div class="input-group mb-3" style="width: 400px">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><h3>&#x2315; </h3></span>
        </div>
        <input type="text" class="form-control" placeholder="Search by Title" id="search" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="row">

        <div class="col-12 col-md-9" style="margin-bottom: 10px">
            <div id="table_holder"></div>
        </div>
        <div class="col-12 col-md-3">
            <form id="ill_add" style="background-color: #1b1e2120;border-radius: 5px;padding: 20px">
                <div class="row">
                    <h3 class="col-11" id="form-header">Insert new Illness</h3><button type="button" id="close-edit" class="close col-1" hidden>&times;</button></div><br><br>
                <input type="text" placeholder="Title" name="title" id="title" required style="width: 100%;"><br><br>
                <textarea name="description" rows="10" id="description" required style="width: 100%"
                          placeholder="Description..."></textarea><br><br>

                <input type="submit" value="Insert" name="insert" class="btn btn-primary" style="width: 200px;" id="insert">
                <input type="submit" value="Edit" name="edit" class="btn btn-info" id="edit" style="width: 200px;" hidden>
        </div>
        </form>
    </div>
</div>
</div>


<script>


    $(document).on('click', '.btn-delete', function () {
        var ill_id = $(this).data("id");

        if (ill_code == ill_id){

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
            url: 'database/illness/getillnesses.php',
            type: 'get',
            dataType: 'html',
            success: function (data) {
                document.getElementById("table_holder") .innerHTML = data;
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


    $("#ill_add").on("submit", function (e) {
        e.preventDefault();

        if (!$("#insert").prop("hidden")) {
            $.ajax({
                url: '/cma/database/illness/addillness.php',
                type: 'post',
                dataType: 'text',
                data: $('#ill_add').serialize(),
                success: function (data) {

                    document.getElementById("alert").innerHTML = "<div class=\"alert alert-success alert-dismissible fade show\" id='alert_success'><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" + data + "</div>";
                    loadTable();
                    $('#ill_add').get(0).reset();
                },
                error: function (re, statusa, error) {
                    alert("error  " + error);
                },
            });
        } else if(!$("#edit").prop("hidden")){

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
            data:{'pattern':$(this).val()},
            dataType: 'html',
            success: function (data) {
                document.getElementById("table_holder") .innerHTML = data;
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
</script>
