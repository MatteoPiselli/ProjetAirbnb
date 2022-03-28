<?php

include("localhostconnect.php");

$sql = "SELECT * FROM Client";

try
{
    $stmt = $db->query($sql);

    if($stmt ==false){
        die("Erreur");
    }
}
catch(PDOException $e)
{
    echo $e->getMessage();  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="airbnb.css">
        <title>Airbnb - Table Client</title>
    </head>
    <header>
		<div class="nav">
			<ul>
				<li><a href="home.php">Accueil</a></li>
                <li><a href="formClient.php?action=create">Formulaire Client</a></li>
			</ul>
		</div>
    </header>
    <body>
        <table>
            <caption>Table Client</caption>
            <thead>
            <tr>
                <th>Client</th>
                <th>Id</th> 
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Adresse</th>
                <th>Hote</th>
                <th>DateCreation</th>
                <th>DateModification</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                <td><a href="formClient.php" title="formulaire de la table Client"><img src="images/zenitsu.gif" width="100px" height="auto"></a></td>
                <td><?=htmlspecialchars($row['Id']);?></td>
                <td><?=htmlspecialchars($row['Nom']);?></td>
                <td><?=htmlspecialchars($row['Prenom']);?></td>
                <td><?=htmlspecialchars($row['Email']);?></td>
                <td><?=htmlspecialchars($row['Phone']);?></td>
                <td><?=htmlspecialchars($row['Passwords']);?></td>
                <td><?=htmlspecialchars($row['Adresse']);?></td>
                <td><?=htmlspecialchars($row['Hote']);?></td>
                <td><?=htmlspecialchars($row['DateCreation']);?></td>
                <td><?=htmlspecialchars($row['DateModification']);?></td>
                <td><a href="formClient.php?action=update&id=<?=$row['Id']?>"><img src="images/up.png" width="15%" height="auto"></a> 
                <td><a href="formClient.php?action=delete&id=<?=$row['Id']?>"><img src="images/delete.png" width="15%" height="auto"></a>               
            </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
    </body>
</html>
