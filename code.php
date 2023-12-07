<?php
include("dbcon.php");


if(isset($_POST['save save-btn'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numEtudiant = $_POST['numEtudiant'];

    $query = "INSERT INTO espstudent(nom,prenom,email,numEtudiant) VALUES(:nom, :prenom, :email, :numEudiant)";
    $query_run = $conn->prepare($query);

    $data = [
    ':nom' => $nom,
    ':prenom'=>$prenom,
    ':email'=>$email,
    ':numEtudiant'=>$numEtudiant
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "insert successfully";
        header('location:index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "not inserted";
        header('location:index.php');
        exit(0);
    }

}
?>