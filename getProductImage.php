<?php
require("bootstrap.php");

try
{
    $productRepository = $entityManager->getRepository("Imie\Entity\ProductImage");
    $allProduct = $productRepository->findAll();

    foreach($allProduct as $product)
    {
        echo "Nom product => ".$product->getName()." || Nom image associer => ".$product->getImage()->getName()."\n";
    }

}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>