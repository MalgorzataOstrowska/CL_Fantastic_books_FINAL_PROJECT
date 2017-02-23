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
     * @ORM\ManyToMany(targetEntity="FantasticBooksBundle\Entity\Author", mappedBy="books")
     */
    private $authors;

    /**
     *@ORM\ManyToMany(targetEntity="FantasticBooksBundle\Entity\Series", mappedBy="books")
     */
    private $setOfSeries;
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
     * Book constructor.
     */
    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->setOfSeries = new ArrayCollection();
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
}
