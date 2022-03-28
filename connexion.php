<?php
//$db=null;
try {
    $db = new PDO(
        'mysql:host=mysql-piselli-matteo.alwaysdata.net;dbname=piselli-matteo_airbnb;charset=utf8',
        '243065_matteo',
        'Matteo94440',
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //echo $e;
    die('Erreur : ' . $e->getMessage());
}
?>