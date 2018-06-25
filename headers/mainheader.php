<head>
    <title>CMA System</title>
    <link rel="shortcut icon" href="/cma/icons/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/cma/bootstrap/css/bootstrap.min.css">
    <script src="/cma/bootstrap/ajax/jquery-3.3.1.min.js"></script>
    <script src="/cma/bootstrap/ajax/popper.min.js"></script>
    <script src="/cma/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/cma/css/main.css">

    <script type="text/javascript">
        $(document).ready(function () {

            window.setTimeout(function () {
                $("#alert_success").fadeTo(1000, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 1500);

        });
    </script>
</head>