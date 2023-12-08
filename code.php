<?php
session_start();
include("dbcon.php");


if (isset($_POST['delete-btn']))
 {
    $id = $_POST['delete-btn'];
   

    try 
    {
       $query = "DELETE FROM espstudent  WHERE id=:id ";
       $statement = $conn->prepare($query);
       $data=[
        ':id'=>$id
       ];

       $query_execute = $statement->execute($data);
        if($query_execute){
            $_SESSION['message'] = "Deleted Successfully";
            header('location:index.php');
            exit(0);
        }
        else 
        {
            $_SESSION['message'] = "Not Deleted Inserted ";
            header('location:index.php');
            exit(0);
        }
    } 
    catch (PDOException $e) {
       echo "connexion failed" .$e->getMessage() ;
    }
    
   
}

if (isset($_POST['update-student-btn']))
 {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numEtudiant = $_POST['numEtudiant'];

    try {
       $query = "UPDATE espstudent SET nom=:nom, prenom=:prenom, email=:email, numEtudiant=:numEtudiant WHERE id=:id LIMIT 1";
       $statement = $conn->prepare($query);

       $data = [
        ':id' => $id,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':numEtudiant' => $numEtudiant,
        
        
    ];
    $query_execute = $statement->execute($data);
    if($query_execute){
        $_SESSION['message'] = "Updated Successfully";
        header('location:index.php');
        exit(0);
    }
    else 
    {
        $_SESSION['message'] = "Not Updated Inserted ";
        header('location:index.php');
        exit(0);
    }



        
    } catch (PDOException $e) {
       echo "connexion failed" .$e->getMessage() ;
    }
    
   
}









if(isset($_POST['save-btn']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $numEtudiant = $_POST['numEtudiant'];

    $query = "INSERT INTO espstudent(nom,prenom,email,numEtudiant) VALUES(:nom, :prenom, :email, :numEtudiant)";
    $query_run = $conn->prepare($query);

    $data = [
    ':nom' => $nom,
    ':prenom'=>$prenom,
    ':email'=>$email,
    ':numEtudiant'=>$numEtudiant
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "Inserted successfully";
        header('location: index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Not inserted";
        header('location: index.php');
        exit(0);
    }

}
?>
