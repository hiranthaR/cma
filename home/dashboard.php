<?php require_once "../headers/session.php" ?>
<div class="row"
     style="padding-left: 5px;padding-right: 5px; display: flex;justify-items: center;justify-content: center">


    <!--    doctor div-->

    <div class="text-center mcard" id="physician">
        <img src="icons/img_doctor.png" class="mcard-img" alt="doctor">
        <div>
            <h3>Physicians</h3>
        </div>
    </div>


    <!--    patient div-->
    <div class="text-center mcard">
        <img src="icons/patient.png" class="mcard-img" alt="patient" style="width: 130px;">
        <div>
            <h3>Patients</h3>
        </div>
    </div>

    <!--illness div-->
    <div class="text-center mcard" id="illnesses">
        <img src="icons/img_report.png" class="mcard-img" alt="illness">
        <div>
            <h3>Illnesses</h3>
        </div>
    </div>

    <div class="text-center mcard">
        <img src="icons/img_surgeon.png" class="mcard-img" alt="doctor" style="width: 100px">
        <div>
            <h3>Surgeons</h3>
        </div>
    </div>
    <div class="text-center mcard">
        <img src="icons/img_nurse.png" class="mcard-img" alt="doctor" style=" width: 150px">
        <div>
            <h3>Nurses</h3>
        </div>
    </div>
    <div class="text-center mcard">
        <img src="icons/img_staff.png" class="mcard-img" alt="doctor" style="width: 230px">
        <div>
            <h3>Support Staff</h3>
        </div>
    </div>
    <div class="text-center mcard">
        <img src="icons/img_surgery.png" class="mcard-img" alt="doctor">
        <div>
            <h3>Surgeries</h3>
        </div>
    </div>
    <div class="text-center mcard">
        <img src="icons/img_account.png" class="mcard-img" alt="doctor">
        <div>
            <h3>Account</h3>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('#doctors').on('click', function () {
            location.href = '/cma/home/physicians.php';
        });
    });


    $('#illnesses').on('click', function () {

         $.ajax({
            url: "home/illnesses.php",
            type: 'get',
            success: function (data) {
               loadView(data);
            },
        });
    });

    $('#physician').on('click', function () {

        $.ajax({
            url: "home/physicians.php",
            type: 'get',
            success: function (data) {
                loadView(data);
            },
        });
    });
    
    $('#physician').on('click', function () {

        $.ajax({
            url: "home/physicians.php",
            type: 'get',
            success: function (data) {
                loadView(data);
            },
        });
    });


    function loadView(data) {
        document.getElementById("dashboard").innerHTML = data;
        var scripts = document.getElementById("dashboard").getElementsByTagName("script");

        for (var i = 0; i < scripts.length; i++)
            eval(scripts[i].innerHTML);
    }


</script>
