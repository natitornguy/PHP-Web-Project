<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ปฏิทินลาหยุด</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
		<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>แบบฟอร์มขอลา</h2>
                <p class="subhead">กรุณากรอกข้อมูลให้ครบถ้วน</p>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <p>ชื่อผู้ลา</p>
                    <input class="form-control" type="Text">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <p>หยุดวันที่</p>
                    <input id="startDate" width="276" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <p>ถึงวันที่</p>
                    <input id="endDate" width="276" />
                </div>
            </div>
            <div class="col-md-3">
                <p style="opacity: 0 ">Calculate</p>
                <button id="btnCalculate" type="button" class="form-control btn btn-primary"><span
                        style="color: white">คำนวณ</span></button>
            </div>
            <div class="col-md-3">
                <p style="opacity: 0">Reset</p>
                <button type="reset" id="btn_reset" class="form-control bg-secondary"><span
                        style="color: white">ล้าง</span></button>
            </div>
        </div>
    </div>
    <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#startDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            maxDate: function () {
                return $('#endDate').val();
            }
        });

        $('#endDate').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: function () {
                return $('#startDate').val();
            }
        });
    </script>
</body>
</html>