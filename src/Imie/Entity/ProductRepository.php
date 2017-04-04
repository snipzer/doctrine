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

        $results = $entityManager->createQuery($dql)->getResult();

        return $results;
    }

    public function getProductsOrderedByNameWithLike($search)
    {
        $entityManager = $this->getEntityManager();

        $dql = 'SELECT p ';
        $dql .= 'FROM Imie\\Entity\\Product p ';
        $dql .= 'WHERE p.name like :name ';
        $dql .= 'ORDER BY p.name ASC';

        $results = $entityManager->createQuery($dql)->setParameter(":name", '%'.$search.'%')->getResult();

        return $results;
    }

    public function getProductByName()
    {
        return $this->createQueryBuilder('p')->orderBy('p.name')->getQuery()->getResult();
    }
}
?>