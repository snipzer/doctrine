<?php
namespace Imie\Entity;
/**
 * @Table
 * @Entity
 */
class Message
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;

    /**
     * @Name
     * @Column(type="string", length=140)
     */
    protected $name;


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


}
?>