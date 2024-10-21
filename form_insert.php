<?php
require 'connection.php';

$data_address = myquery("SELECT * FROM tb_address");


if (isset($_POST['submit_insert_warga'])) {
    $name = $_POST['txt_name'];
    $idcard = $_POST['txt_idcard'];
    $address = $_POST['selectAdd'];
    $date = $_POST['txt_date'];

    //formatting date
    $new_date = new DateTime($date);
    $formatted_date = $new_date->format('Y-m-d');

    $query_insert = "INSERT INTO tb_person
    VALUE (null, '$name', '$idcard', '$address', '$date')";

    $res = mysqli_query($connection, $query_insert);

    if ($res) {
        header("location: index.php");
        exit();
    } else {
        $err = "Failed to input data";
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
                            <div class="mb-3">
                                <label>Name</label>
                                <input class="form-control" type="text" name="txt_name"
                                    placeholder="Input Name Here"
                                    autocomplete="off" />
                            </div>

                            <div class="mb-3">
                                <label>ID Card</label>
                                <input class="form-control" type="text" name="txt_idcard"
                                    placeholder="Input ID Card Here"
                                    autocomplete="off" />
                            </div>

                            <div class="mb-3">
                                <label>Add address</label>
                                <select class="form-select" name="selectAdd">
                                    <?php foreach ($data_address as $option): ?>
                                        <option value="<?= $option['id'] ?>">
                                            <?= $option['home_num'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>ID Card</label>
                                <input class="form-control" type="date" name="txt_date"
                                    autocomplete="off" />
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" 
                                name="submit_insert_warga">
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