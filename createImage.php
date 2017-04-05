<?php
require("bootstrap.php");

use Imie\Entity\Image;


$nomImage = $argv[1];

try
{
    $image = new Image();
    $image->setName($nomImage);

    $entityManager->persist($image);
    $entityManager->flush();
}
catch(Exception $e)
{
    echo $e->getMessage();
}


?>