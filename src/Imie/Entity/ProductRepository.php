<?php
namespace Imie\Entity;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{

    public function getProductsOrderedByName()
    {
        $entityManager = $this->getEntityManager();

        $dql = 'SELECT p ';
        $dql .= 'FROM Imie\\Entity\\Product p ';
        $dql .= 'ORDER BY p.name ASC';

        $results = $entityManager->createQuery($dql)->getScalarResult();

        return $results;
    }
}
?>