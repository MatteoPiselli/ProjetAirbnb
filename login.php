<?php
include("connexion.php");
session_start();
$errorMessage = $user = $pass = "";
// Validation du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
    $user = $_POST['email'];
    $pass = $_POST['password'];
    try {
        $query = "select * from Client where Email=:Email and Passwords =:Password";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':Email', $user, PDO::PARAM_STR);
        $stmt->bindValue(':Password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($count == 1) {
            $_SESSION['sess_user_id'] = $row['Email'];
            $_SESSION['sess_user_name'] = $row['Nom'];
            header('location:client.php');
            exit;
        } else {
            $errorMessage = "Invalid username and password!";
        }
    } catch (PDOException $e) {
        die ("Error : " . $e->getMessage());
    }
}
?>

<!--
   Si utilisateur/trice est non identifié(e), on affiche le formulaire
-->
<form action="login.php" method="post">
    <!-- si message d'erreur on l'affiche -->
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
    <?php endif;?>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
        <div id="email-help" class="form-text">L'email utilisé lors de la création de compte.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <a href="formClient.php?action=create">Inscription</a>
</form>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- Navigation -->
   

    <!-- Inclusion du formulaire de connexion -->
    <?php include_once('login.php'); ?>
        

    
</body>
</html>