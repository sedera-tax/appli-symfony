<?php

/**
 * Description of Categorie
 *
 * @author Sedera
 */

namespace FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Film {

    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 3)
     */
    private $titre;

    /**
     * @ORM\Column(type="string",length=500)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @Assert\NotBlank()
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="Acteur")
     */
    private $acteurs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param \FilmBundle\Entity\Categorie $categorie
     * @return Film
     */
    public function setCategorie(\FilmBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \FilmBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add acteurs
     *
     * @param \FilmBundle\Entity\Acteur $acteurs
     * @return Film
     */
    public function addActeur(\FilmBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \FilmBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\FilmBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }

    /**
     * Get acteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
}
