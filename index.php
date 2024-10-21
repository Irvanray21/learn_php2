<?php
require 'connection.php';
// $data = myquery("SELECT * FROM tb_person");
$data = myquery("SELECT p.id, p.name, p.card_iden, p.regis_date, a.home_add
FROM tb_person as p
JOIN tb_address as a
ON p.address = a. id"); 

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <h1>Citizen Data</h1>

                <a href="form_insert.php">Add Data</a>

                <?php if(isset($_GET['messages'])): ?>
                    <p color="red">
                        <?= $_GET['messages']; ?>
                    </p>
                <?php endif; ?>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Name</th>
                            <th scope="col">ID Card</th>
                            <th scope="col">Address</th>
                            <th scope="col">Registration Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $row): ?>
                            <tr>
                                <th scope="row">
                                    <a href="function.php?action=edit&id=<?= $row['id'] ?>"
                                        class="btn btn-primary">Edit</a>
                                    <a href="function.php?action=delete&id=<?= $row['id'] ?>"
                                        class="btn btn-outline-danger"
                                        onclick="return confirm('Are you Sure About That?')">Delete</a>
                                </th>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['card_iden'] ?></td>
                                <td><?= $row['home_add'] ?></td>
                                <td><?= $row['regis_date'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>