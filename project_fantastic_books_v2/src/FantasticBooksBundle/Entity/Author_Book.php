<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author_Book
 *
 * @ORM\Table(name="author__book")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\Author_BookRepository")
 */
class Author_Book
{
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
     * @ORM\Column(name="series", type="string", length=100, nullable=true)
     */
    private $series;

    /**
     * @var string
     *
     * @ORM\Column(name="volume", type="string", length=100, nullable=true)
     */
    private $volume;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set series
     *
     * @param string $series
     *
     * @return Author_Book
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
     * @param string $volume
     *
     * @return Author_Book
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return string
     */
    public function getVolume()
    {
        return $this->volume;
    }
}

