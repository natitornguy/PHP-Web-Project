<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <?php
        if ($method == "edit")
        {
            $action = "amphur/editSave/$amphur_id";
            $str = "Edit form";
        }
        else
        {
            $action = "amphur/addSave";
            $str = "Add form";
        }
    ?>
    <title><?=$str?></title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="<?=base_url($action)?>" method="post">
                   <h1>Amphur <?=$str?></h1>
                   <div class="form-group row">
                        <label for="province_id" class="col-sm-2 col-form-label">Province</label>
                        <div class="col-sm-10">
                            <?php
                                $amphur_code = is_object($amphurs) ? $amphurs->amphur_code : "";
                            ?>
                            <select class="form-control" name="province_id" id="province_id">
                                <?php
                                    foreach($provinces As $province) { ?>
                                        <option value="<?=$province->province_id?>" <?=is_object($amphurs) ? ($amphurs->province_id == $province->province_id ? "selected": "") : "" ?>><?=$province->province_name ?></option>
                                <?php }?>
                            </select>
                        </div>
                   </div>
                   <div class="form-group row">
                        <label for="amphur_code" class="col-sm-2 col-form-label">Amphur Code</label>
                        <div class="col-sm-10">
                            <?php
                                $amphur_code = is_object($amphurs) ? $amphurs->amphur_code : "";
                            ?>
                            <input type="text" class="form-control" id="amphur_code" name="amphur_code" value="<?=$amphur_code?>">
                        </div>
                   </div>
                   <div class="form-group row">
                        <label for="amphur_name" class="col-sm-2 col-form-label">Amphur Name</label>
                        <div class="col-sm-10">
                            <?php
                                $amphur_name = is_object($amphurs) ? $amphurs->amphur_name : "";
                            ?>
                            <input type="text" class="form-control" id="amphur_name" name="amphur_name" value="<?=$amphur_name?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amphur_name" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>