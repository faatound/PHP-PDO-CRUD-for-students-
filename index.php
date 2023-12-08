<?php session_start();
include('dbcon.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDD ETUDIANTS ESP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

            <?php if(isset($_SESSION['message'])) : ?>
                <h5 class="alert alert-sucess"><?= $_SESSION['message']; ?></h5>
                <?php endif; ?>

                <?php unset($_SESSION['message']); ?>
               
                <div class="card">
                    <div class="card-header">
                        <h3>Bienvenue Cher Elève
                        <a href="add.php" class="btn btn-primary float-end">Ajouter</a>
                        </h3>
                        <div class="card-body">
                            
                            <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>NumEtudiant</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
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
                                        <td>
                                            <a href="edit.php?id=<?= $row->id;  ?>" class="btn btn-primary">Modifier</a>
                                        </td>
                                        <td>
                                            <form action="code.php" method="POST">
                                                <button type="submit" name="delete-btn" value="<?=$row->id;?>" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php

                                }
                            }
                            else {
                                ?>
                                <tr> 
                                    <td colspan=5 >No record found</td>
                                </tr>
                                 <?php
                            }

                             ?>
                            </tbody>
                            </table> 
                        </div>
                        
                       
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>