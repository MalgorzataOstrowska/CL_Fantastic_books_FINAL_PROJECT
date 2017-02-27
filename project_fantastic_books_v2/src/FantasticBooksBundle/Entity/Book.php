<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\ManyToMany(targetEntity="CharacterFromBook", mappedBy="books")
     */
    private $characters;

    /**
     * @ORM\ManyToMany(targetEntity="Author", inversedBy="books")
     */
    private $authors;

    /**
     * @return mixed
     */
    public function getCharacters()
    {
        return $this->characters;
    }

    /**
     * @param mixed $characters
     */
    public function setCharacters($characters)
    {
        $this->characters = $characters;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titlePolish", type="string", length=100, nullable=true)
     */
    private $titlePolish;

    /**
     * @var string
     *
     * @ORM\Column(name="titleEnglish", type="string", length=100, nullable=true)
     */
    private $titleEnglish;

    /**
     * @var string
     *
     * @ORM\Column(name="titleOriginal", type="string", length=100)
     */
    private $titleOriginal;

    /**
     * @var string
     *
     * @ORM\Column(name="series", type="string", length=100, nullable=true)
     */
    private $series;

    /**
     * @var float
     *
     * @ORM\Column(name="volume", type="float", nullable=true)
     */
    private $volume;

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->authors = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getTitlePolish() . ' - ' . $this->getTitleOriginal();
    }
    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $authors
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titlePolish
     *
     * @param string $titlePolish
     * @return Book
     */
    public function setTitlePolish($titlePolish)
    {
        $this->titlePolish = $titlePolish;

        return $this;
    }

    /**
     * Get titlePolish
     *
     * @return string 
     */
    public function getTitlePolish()
    {
        return $this->titlePolish;
    }

    /**
     * Set titleEnglish
     *
     * @param string $titleEnglish
     * @return Book
     */
    public function setTitleEnglish($titleEnglish)
    {
        $this->titleEnglish = $titleEnglish;

        return $this;
    }

    /**
     * Get titleEnglish
     *
     * @return string 
     */
    public function getTitleEnglish()
    {
        return $this->titleEnglish;
    }

    /**
     * Set titleOriginal
     *
     * @param string $titleOriginal
     * @return Book
     */
    public function setTitleOriginal($titleOriginal)
    {
        $this->titleOriginal = $titleOriginal;

        return $this;
    }

    /**
     * Get titleOriginal
     *
     * @return string 
     */
    public function getTitleOriginal()
    {
        return $this->titleOriginal;
    }

    /**
     * Set series
     *
     * @param string $series
     * @return Book
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string 
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set volume
     *
     * @param float $volume
     * @return Book
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return float 
     */
    public function getVolume()
    {
        return $this->volume;
    }
}