<?php
namespace Imie\Entity;
/**
 * @Table(name="images")
 * @Entity
 */
class Image
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string", length=150)
     */

    protected $name;
    /**
     * @Column(type="string", length=10)
     */

    protected $width;

    /**
     * @Column(type="string", length=10)
     */
    protected $height;

    /**
     * @OneToOne(targetEntity="ProductImage", inversedBy="image")
     */
    private $product;

    public function __construct($width = "150px", $height = "150px")
    {
        $this->setHeight($height);
        $this->setWidth($width);
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

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct(ProductImage $product)
    {
        $this->product = $product;
        $product->setImage($this);
    }

}

?>