<?php
define("BASE_DIR", __DIR__ . "/");

require_once "bootstrap.php";
use Imie\Entity\Product;

if (isset($_POST['submit']))
{
    $productName = $_POST['productName'];
    $productImage = $_POST['productImage'];
    $image = $_FILES['fileToUpload'];

    try
    {
        $product = new Product();
        $product->setName($productName);
        $product->setImage($productImage);

        $entityManager->persist($product);
        $entityManager->flush();

        $msg = "Created Product with ID " . $product->getId() . "\n";
    }
    catch (Exception $e)
    {
        $e->getMessage();
    }
}

if (isset($_POST['show']))
{
    try
    {
        $productRepository = $entityManager->getRepository("Imie\Entity\Product");
        $products = $productRepository->findAll();


        $tableau = '<table border="2" cellpading="5px" cellspacing="5px">';
        $tableau .= "<th>ID</th>";
        $tableau .= '<th>Nom</th>';
        $tableau .= '<th>Image</th>';
        $tableau .= '<th>Supprimer</th>';

        foreach ($products as $product)
        {
            $tableau .= '<tr>';
            $tableau .= '<td>' . $product->getId() . '</td>';
            $tableau .= '<td>' . $product->getName() . '</td>';
            $tableau .= '<td><img src="asset/images/' . $product->getImage() . '" alt="' . $product->getImage() . '" height="150" width="150"></td>';
            $tableau .= '<form action="#" method="post">';
            $tableau .= '<td><input type="hidden" name="productId" value="' . $product->getId() . '" />';
            $tableau .= '<input type="submit" name="del" value="Delete" />';
            $tableau .= '</form></td>';
            $tableau .= '</tr>';

        }
        $tableau .= '</table>';
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

if (isset($_POST['del']))
{
    try
    {
        $productRepository = $entityManager->getRepository("Imie\Entity\Product");
        $oneProduct = $productRepository->findOneBy(['id' => $_POST['productId']]);

        $entityManager->remove($oneProduct);
        $entityManager->flush();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section>
    <article>
        <form action="#" method="post" enctype="multipart/form-data">
            <p>Nom du nouveau produit:<input type="text" name="productName" required/></p>
            <p>Nouveau nom de l'image:<input type="text" name="productImage" required/></p>
            <p>Image à uploader:<input type="file" name="fileToUpload"/></p>
            <input type="submit" name="submit" value="Submit"/>
        </form>
    </article>
    <article>
        <h2>Show product:</h2>
        <form action="#" method="post">
            <input type="submit" name="show" value="show"/>
        </form>
    </article>
    <article>
        <?php if (isset($msg)){ echo $msg;} ?>
    </article>
    <?php if (isset($tableau)){ echo $tableau;} ?>
</section>
</body>
</html>