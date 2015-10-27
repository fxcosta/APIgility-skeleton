<?php

namespace SuicideGirl\V1\Rest\SuicideGirl\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class SuicideGirlEntity
 * @package SuicideGirl\V1\Rest\SuicideGirl\Entity
 *
 * @ORM\Table(name="suicidegirl")
 * @ORM\Entity(repositoryClass="SuicideGirl\V1\Rest\SuicideGirl\Repository\SuicideGirlRepository")
 */
class SuicideGirlEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private $image;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


}