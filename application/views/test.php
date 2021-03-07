<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>
</head>

<body>
<div class="container px-1 px-sm-5 mx-auto">
    <form autocomplete="off">
        <div class="flex-row d-flex justify-content-center">
            <div class="col-lg-6 col-11 px-1">
                <div class="input-group input-daterange">
                    <input type="text" id="start" class="form-control text-left mr-2"> 
                    <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start Date</label> 
                    <span class="fa fa-calendar" id="fa-1"></span> 
                    <input type="text" id="end" class="form-control text-left ml-2"> 
                    <label class="ml-3 form-control-placeholder" id="end-p" for="end">End Date</label> 
                    <span class="fa fa-calendar" id="fa-2"></span> 
                </div>
            </div>
        </div>
    </form>
</div>
</body>
<script>
$(document).ready(function(){

$('.input-daterange').datepicker({
format: 'dd-mm-yyyy',
autoclose: true,
calendarWeeks : true,
clearBtn: true,
disableTouchKeyboard: true,
minDate:(minDate)
});


});
</script>
</html>