<?php
namespace Imie\Entity;

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

    /**
     * @OneToOne(targetEntity="Imie\Entity\Image", cascade={"persist", "remove"}, mappedBy="product")
     * @JoinColumn(nullable = false)
     */
    private $image;

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(Image $image = null)
    {
        $this->image = $image;
        $image->setProduct($this);
    }

}
?>