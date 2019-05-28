
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản lí lớp</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../assets/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/icon.css" />
    <!-- Style of me -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="card">
        <button type="button" class="btn btn-rose" onclick="lol()">lol</button>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<script src="../assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<!-- Select Plugin -->
<script src="../assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript">
    $("button").click(function() {
        swal({
            title: 'Are you sure?',
            text: 'mensaje',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        } ).then(function (hello) {
            alert('dfasdfsd');
        });
    });

</script>
</html>


