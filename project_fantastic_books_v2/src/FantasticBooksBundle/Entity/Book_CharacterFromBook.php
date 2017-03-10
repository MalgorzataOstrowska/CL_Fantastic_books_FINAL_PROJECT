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
     * @ORM\ManyToOne(targetEntity="FantasticBooksBundle\Entity\CharacterFromBook",
     *     inversedBy="books_characterFromBooks")
     */
    private $characterFromBook;
    /**
     * @ORM\ManyToOne(targetEntity="FantasticBooksBundle\Entity\Book",
     *     inversedBy="books_characterFromBooks")
     */

    private $book;
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

    /**
     * @return mixed
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param mixed $book
     */
    public function setBook($book)
    {
        $this->book = $book;
    }

    /**
     * @return mixed
     */
    public function getCharacterFromBook()
    {
        return $this->characterFromBook;
    }

    /**
     * @param mixed $characterFromBook
     */
    public function setCharacterFromBook($characterFromBook)
    {
        $this->characterFromBook = $characterFromBook;
    }

}

