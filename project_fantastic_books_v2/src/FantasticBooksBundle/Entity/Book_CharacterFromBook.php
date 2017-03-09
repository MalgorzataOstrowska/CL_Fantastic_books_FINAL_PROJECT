<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book_CharacterFromBook
 *
 * @ORM\Table(name="book__character_from_book")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\Book_CharacterFromBookRepository")
 */
class Book_CharacterFromBook
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
     * @var int
     *
     * @ORM\Column(name="characterFromBookId", type="integer")
     */
    private $characterFromBookId;

    /**
     * @var int
     *
     * @ORM\Column(name="bookId", type="integer")
     */
    private $bookId;

    /**
     * @var string
     *
     * @ORM\Column(name="characterType", type="string", length=100)
     */
    private $characterType;


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
     * Set characterFromBookId
     *
     * @param integer $characterFromBookId
     *
     * @return Book_CharacterFromBook
     */
    public function setCharacterFromBookId($characterFromBookId)
    {
        $this->characterFromBookId = $characterFromBookId;

        return $this;
    }

    /**
     * Get characterFromBookId
     *
     * @return int
     */
    public function getCharacterFromBookId()
    {
        return $this->characterFromBookId;
    }

    /**
     * Set bookId
     *
     * @param integer $bookId
     *
     * @return Book_CharacterFromBook
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;

        return $this;
    }

    /**
     * Get bookId
     *
     * @return int
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * Set characterType
     *
     * @param string $characterType
     *
     * @return Book_CharacterFromBook
     */
    public function setCharacterType($characterType)
    {
        $this->characterType = $characterType;

        return $this;
    }

    /**
     * Get characterType
     *
     * @return string
     */
    public function getCharacterType()
    {
        return $this->characterType;
    }
}

