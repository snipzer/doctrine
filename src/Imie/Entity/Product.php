<?php
//Product.php
namespace Imie\Entity;

/**
 * @Table
 * @Entity
 */

class Product
{

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     **/
    protected $id;

    /**
     * @Column(type="string",length=140)
     **/
    protected $name;

    /**
     * @Column(type="string", length=255)
     */
    protected $image;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        echo 1;
        $this->name = $name;
    }

    public function setImage($path)
    {
        $this->image = $path;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function toString()
    {
        $str= "[";
        $str .= 'id: '.$this->getId().'';
        $str .= ',name: "'.$this->getName().'"';
        $str .= ', image: "'.$this->getImage().'"';
        $str .= "]";

        return $str;
    }

}

?>