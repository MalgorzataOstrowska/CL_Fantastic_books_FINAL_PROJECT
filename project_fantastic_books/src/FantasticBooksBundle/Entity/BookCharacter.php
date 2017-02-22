<?php

namespace FantasticBooksBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BookCharacter
 *
 * @ORM\Table(name="book_character")
 * @ORM\Entity(repositoryClass="FantasticBooksBundle\Repository\BookCharacterRepository")
 */
class BookCharacter
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=20)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="species", type="string", length=100)
     */
    private $species;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=20)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="ability", type="string", length=255, nullable=true)
     */
    private $ability;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="string", length=255, nullable=true)
     */
    private $occupation;

    /**
     * @var string
     *
     * @ORM\Column(name="notHuman", type="string", length=100, nullable=true)
     */
    private $notHuman;

    /**
     * @var string
     *
     * @ORM\Column(name="mythology", type="string", length=100, nullable=true)
     */
    private $mythology;

    /**
     * @var string
     *
     * @ORM\Column(name="biblicalCharacter", type="string", length=100, nullable=true)
     */
    private $biblicalCharacter;

    /**
     * @var string
     *
     * @ORM\Column(name="mythologicalCreature", type="string", length=100, nullable=true)
     */
    private $mythologicalCreature;

    /**
     * @var string
     *
     * @ORM\Column(name="animalBeast", type="string", length=100, nullable=true)
     */
    private $animalBeast;

    /**
     * @var string
     *
     * @ORM\Column(name="otherCreature", type="string", length=100, nullable=true)
     */
    private $otherCreature;

    /**
     * @var string
     *
     * @ORM\Column(name="otherInformations", type="text", nullable=true)
     */
    private $otherInformations;


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
     * @return BookCharacter
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
     * Set gender
     *
     * @param string $gender
     * @return BookCharacter
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set species
     *
     * @param string $species
     * @return BookCharacter
     */
    public function setSpecies($species)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get species
     *
     * @return string 
     */
    public function getSpecies()
    {
        return $this->species;
    }

    /**
     * Set age
     *
     * @param string $age
     * @return BookCharacter
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return string 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set ability
     *
     * @param string $ability
     * @return BookCharacter
     */
    public function setAbility($ability)
    {
        $this->ability = $ability;

        return $this;
    }

    /**
     * Get ability
     *
     * @return string 
     */
    public function getAbility()
    {
        return $this->ability;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     * @return BookCharacter
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string 
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set notHuman
     *
     * @param string $notHuman
     * @return BookCharacter
     */
    public function setNotHuman($notHuman)
    {
        $this->notHuman = $notHuman;

        return $this;
    }

    /**
     * Get notHuman
     *
     * @return string 
     */
    public function getNotHuman()
    {
        return $this->notHuman;
    }

    /**
     * Set mythology
     *
     * @param string $mythology
     * @return BookCharacter
     */
    public function setMythology($mythology)
    {
        $this->mythology = $mythology;

        return $this;
    }

    /**
     * Get mythology
     *
     * @return string 
     */
    public function getMythology()
    {
        return $this->mythology;
    }

    /**
     * Set biblicalCharacter
     *
     * @param string $biblicalCharacter
     * @return BookCharacter
     */
    public function setBiblicalCharacter($biblicalCharacter)
    {
        $this->biblicalCharacter = $biblicalCharacter;

        return $this;
    }

    /**
     * Get biblicalCharacter
     *
     * @return string 
     */
    public function getBiblicalCharacter()
    {
        return $this->biblicalCharacter;
    }

    /**
     * Set mythologicalCreature
     *
     * @param string $mythologicalCreature
     * @return BookCharacter
     */
    public function setMythologicalCreature($mythologicalCreature)
    {
        $this->mythologicalCreature = $mythologicalCreature;

        return $this;
    }

    /**
     * Get mythologicalCreature
     *
     * @return string 
     */
    public function getMythologicalCreature()
    {
        return $this->mythologicalCreature;
    }

    /**
     * Set animalBeast
     *
     * @param string $animalBeast
     * @return BookCharacter
     */
    public function setAnimalBeast($animalBeast)
    {
        $this->animalBeast = $animalBeast;

        return $this;
    }

    /**
     * Get animalBeast
     *
     * @return string 
     */
    public function getAnimalBeast()
    {
        return $this->animalBeast;
    }

    /**
     * Set otherCreature
     *
     * @param string $otherCreature
     * @return BookCharacter
     */
    public function setOtherCreature($otherCreature)
    {
        $this->otherCreature = $otherCreature;

        return $this;
    }

    /**
     * Get otherCreature
     *
     * @return string 
     */
    public function getOtherCreature()
    {
        return $this->otherCreature;
    }

    /**
     * Set otherInformations
     *
     * @param string $otherInformations
     * @return BookCharacter
     */
    public function setOtherInformations($otherInformations)
    {
        $this->otherInformations = $otherInformations;

        return $this;
    }

    /**
     * Get otherInformations
     *
     * @return string 
     */
    public function getOtherInformations()
    {
        return $this->otherInformations;
    }
}
