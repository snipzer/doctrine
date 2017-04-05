<?php

namespace Imie\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Table(name="productImage")
 * @Entity
 */
class ProductImage
{
    /**
     * @id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", length=140)
     */
    protected $name;

//    /**
//     * @OneToOne(targetEntity="Imie\Entity\Image", cascade={"persist", "remove"}, mappedBy="product")
//     * @JoinColumn(nullable = false)
//     */
//    private $image;


    /**
     * @OneToMany(targetEntity="Image", mappedBy="product")
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImage(Image $image)
    {
        $image->setProduct($this);
        $this->images[] = $image;
        return $this;
    }

    public function removeImage(Image $image)
    {
        $this->images->remove($image);
    }
}

?>