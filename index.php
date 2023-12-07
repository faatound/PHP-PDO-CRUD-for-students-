<?php
session_start();
include('dbcon.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vitrine de l'esp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Bienvenue Cher Eleve
                        <a href="add.php" class="btn btn-primary float-end">Add</a>
                        </h3>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>NumEtudiant</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $query = "SELECT * FROM espstudent";
                            $statement = $conn->prepare($query);
                            $statement->execute();

                            $statement->setFetchMode(PDO::FETCH_OBJ);
                            $result = $statement->fetchAll(PDO::FETCH_OBJ);

                            if($result){
                                foreach ($result as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $row->id; ?></td>
                                        <td><?= $row->nom; ?></td>
                                        <td><?= $row->prenom; ?></td>
                                        <td><?= $row->email; ?></td>
                                        <td><?= $row->numEtudiant; ?></td>
                                    </tr>
                                    <?php

                                }
                            }





                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>