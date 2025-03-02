<?php
// require 'connection.php';
$_GET['action'] = 'edit';
require 'function.php';

$id_person = $_GET['id'];

$data_person = myquery("SELECT * FROM tb_person WHERE id = $id_person");
var_dump($data_person); // check data person

$data_address = myquery("SELECT * FROM tb_address");

if (isset($_POST['submit_update'])) {
    //return condition
    if (update($_POST) > 0) {
        echo "<script> 
            alert('Data sucessfully updated');
            document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script> 
            alert('Failed to update data');\
            </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3 class="mt-4 mb-3">Form</h3>
                <a href="./index.php" class="d-block mb-4">Back</a>

                <?php if (isset($err)): ?>
                    <p><?= $err; ?></p>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <input type="hidden" value="<?= $id_person ?>" name="id_person" />
                            <div class="mb-3">
                                <label>Name</label>
                                <input class="form-control" type="text" name="txt_name"
                                    placeholder="Input Name Here"
                                    autocomplete="off" value="<?= $data_person[0]['name']; ?>" />
                            </div>

                            <div class="mb-3">
                                <label>ID Card</label>
                                <input class="form-control" type="text" name="txt_idcard"
                                    placeholder="Input ID Card Here"
                                    autocomplete="off" value="<?= $data_person[0]['card_iden']; ?>" />
                            </div>

                            <div class="mb-3">
                                <label>Add address</label>
                                <select class="form-select" name="selectAdd">
                                    <?php foreach ($data_address as $option): ?>
                                        <option value="<?= $option['id'] ?>" <?php echo ($data_person[0]['address'] === $option['id'] ? 'selected' : ''); ?>>
                                            <?= $option['home_num'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>ID Card</label>
                                <input class="form-control" type="date" name="txt_date"
                                    autocomplete="off" value="<?php echo $data_person[0]['regis_date'] ?>" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"
                                    name="submit_update">
                                    Submit Here
                                </button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>