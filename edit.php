<?php
session_start();
include('dbcon.php'); // <?php ? >
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les informations personnelles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
   
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">

                <div class="card">
                    <div class="card-header">
                        <h3>Modifier et Mettre à jour
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h3>
                    </div>
               
                <div class="card-body">
                <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                    $query = "SELECT * FROM espstudent WHERE id=:id LIMIT 1";
                    $statement = $conn->prepare($query);
                    $data = [':id' => $id];
                    $statement->execute($data);

                    $result = $statement->fetch(PDO::FETCH_OBJ);
                }
               
                ?>  

                        <form action="code.php" method="POST">
                            <input type="hidden" value="<?= $result->id ?>" name="id"/>
                            <div class="mb-3">
                                <label>Nom</label>
                                <input type="text" name="nom" value="<?= $result->nom; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Prenom</label>
                                <input type="text" name="prenom" value="<?= $result->prenom; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $result->email; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>NumEtudiant</label>
                                <input type="text" name="numEtudiant" value="<?= $result->numEtudiant; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                               <button type="submit" name="update-student-btn" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>

            
        </div>
    </div>
      
    
</body>
</html>