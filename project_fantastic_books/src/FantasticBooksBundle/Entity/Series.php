<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Series
 *
 * @ORM\Table(name="series")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\SeriesRepository")
 */
class Series
{
    /**
     * @ORM\ManyToMany(targetEntity="FantasticBooksBundle\Entity\Book", mappedBy="setOfSeries")
     */
    private $books;

    /**
     * @ORM\ManyToMany(targetEntity="FantasticBooksBundle\Entity\Author", inversedBy="setOfSeries")
     */
    private $authors;
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    public function __toString()
    {
        return $this->getName();
    }
    /**
     * Series constructor.
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->authors = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Series
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }


}
