<?php

include ("regionBLL.php");

$regionbll = new RegionBLL();

$regions = $regionbll->listRegions();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="airbnb.css">
        <title>Airbnb - Table Region</title>
    </head>
    <header>
		<div class="nav">
			<ul>
				<li><a href="index.php">Accueil</a></li>
                <li><a href="formRegion.php?action=create">Formulaire Region</a></li>
			</ul>
		</div>
    </header>
    <body>
        <table>
            <caption>Table Region</caption>
            <thead>
            <tr>
                <th>Id</th> 
                <th>Nom</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
                
            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                <td><?=$regions;?></td>
                <td><?=htmlspecialchars($regions['Nom']);?></td>
                <td><a href="formRegion.php?action=update&id=<?=$row['Id']?>"><img src="images/up.png" width="10%" height="auto"></a> 
                <td><a href="formRegion.php?action=delete&id=<?=$row['Id']?>"><img src="images/delete.png" width="10%" height="auto"></a>               
            </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
    </body>
</html>
