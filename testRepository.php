<?php

require_once "bootstrap.php";

use Imie\Entity\Product;
try
{
    $ProductRepository = $entityManager->getRepository("Imie\Entity\Product");
    $toto = $ProductRepository->getProductsOrderedByName();

    var_dump($toto);
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>