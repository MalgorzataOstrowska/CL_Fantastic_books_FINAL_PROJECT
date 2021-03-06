<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\OneToMany(targetEntity="FantasticBooksBundle\Entity\Author_Book", mappedBy="author")
     */
    private $authors_books;

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
     * @ORM\Column(name="firstName", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="linkToHomePage", type="string", length=255, nullable=true)
     */
    private $linkToHomePage;

    /**
     * Author constructor.
     */
    public function __construct()
    {
        $this->authors_books = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getFirstName() .' '. $this->getLastName() . ' (' . $this->getAlias() . ')';
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
     * Set firstName
     *
     * @param string $firstName
     * @return Author
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Author
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Author
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set linkToHomePage
     *
     * @param string $linkToHomePage
     * @return Author
     */
    public function setLinkToHomePage($linkToHomePage)
    {
        $this->linkToHomePage = $linkToHomePage;

        return $this;
    }

    /**
     * Get linkToHomePage
     *
     * @return string 
     */
    public function getLinkToHomePage()
    {
        return $this->linkToHomePage;
    }

    /**
     * @return mixed
     */
    public function getAuthorsBooks()
    {
        return $this->authors_books;
    }

    /**
     * @param mixed $authors_books
     */
    public function setAuthorsBooks($authors_books)
    {
        $this->authors_books = $authors_books;
    }


}
