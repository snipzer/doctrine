<?php

require_once "bootstrap.php";

use Imie\Entity\Product;
try
{
    $ProductRepository = $entityManager->getRepository("Imie\Entity\Product");
    $toto = $ProductRepository->getProductsOrderedByName();

    echo "<pre>";
    var_dump($toto);
    echo "</pre>";
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>