<?php
//Product.php
namespace Imie\Entity;

/**
 * @Table
 * @Entity(repositoryClass="ProductRepository")
 * @HasLifeCycleCallbacks()
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
        $str = "[";
        $str .= 'id: ' . $this->getId() . '';
        $str .= ',name: "' . $this->getName() . '"';
        $str .= ', image: "' . $this->getImage() . '"';
        $str .= "]";

        return $str;
    }

    /**
     * @postRemove
     */
    public function removeImage()
    {
        unlink("asset/images/" . $this->image);
    }

    /**
     * @postPersist
     */
    public function saveImage()
    {
        if (isset($_FILES['fileToUpload']))
        {
            $_FILES["fileToUpload"]["name"] = $this->image;
            $target_dir = BASE_DIR . "asset/images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = $_FILES['fileToUpload']["type"];

            // Check if image file is a actual image or fake image
            if (isset($_POST['fileToUpload']))
            {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false)
                {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                }
                else
                {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file))
            {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000)
            {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if ($imageFileType != "image/jpg" && $imageFileType != "image/png" && $imageFileType != "image/jpeg"
                && $imageFileType != "image/gif"
            )
            {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0)
            {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            }
            else
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                {
                    echo "File uploaded";
                }
                else
                {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        }
        else
        {
            echo "Nothing to do here";
        }
    }
}

?>