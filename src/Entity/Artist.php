<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 * @Vich\Uploadable
 */
class Artist extends BaseEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     * @var string
     */
    private $name;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=256, unique=true)
     * @var string
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="stringy", nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="artist_image", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
//
//    /**
//     * @ORM\Column(type="text", nullable=true)
//     */
//    private $history;
//
//    /**
//     * @ORM\Column(type="text", nullable=true)
//     */
//    private $medias;
//
//    /**
//     * @ORM\Column(type="string", length=256, nullable=true)
//     */
//    private $website;
//
//    /**
//     * @ORM\Column(type="string", length=256, nullable=true)
//     */
//    private $email;
//
//    /**
//     * @ORM\Column(type="string", length=128, nullable=true)
//     */
//    private $phone;
//
//    /**
//     * @ORM\Column(type="text", nullable=true)
//     */
//    private $sNetworks;

    /**
     * @ORM\ManyToMany(targetEntity="Disc", mappedBy="artists")
     */
    private $discs;

//    /**
//     * @ORM\Column(type="string", length=128, nullable=true)
//    */
//    private $region;


    // CUSTOM METHODS ============================================================

    public function __construct()
    {
        parent::__construct();
        $this->discs = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        if ($image) {
            $this->setUpdatedAt = new \DateTime('now');
        }
    }
    // AUTO-GENERATED METHODS =====================================================

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getDiscs()
    {
        return $this->discs;
    }

    /**
     * @param mixed $discs
     */
    public function setDiscs($discs): void
    {
        $this->discs = $discs;
    }

//    /**
//     * @return mixed
//     */
//    public function getRegion()
//    {
//        return $this->region;
//    }
//
//    /**
//     * @param mixed $region
//     */
//    public function setRegion($region): void
//    {
//        $this->region = $region;
//    }



}
