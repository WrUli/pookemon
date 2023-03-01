<?php 

@include('Pokemon.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $pokemon1 = new Pokemon('Salameche', 50, 20, 10, 'feu');
    $pokemon2 = new Pokemon('Carapuce', 50, 20, 10, 'eau');

    arene($pokemon1,$pokemon2);

    ?>


</body>
</html>