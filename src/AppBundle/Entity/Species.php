<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Species
 *
 * @ORM\Table(name="species")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SpeciesRepository")
 */
class Species
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Animal", mappedBy="species")
     */
    private $animals;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Disease", mappedBy="specie")
     */
    private $diseases;


    public function __construct() {
        $this->animals = new ArrayCollection();
        $this->diseases = new ArrayCollection();
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
     * @return Species
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
     * Add animals
     *
     * @param \AppBundle\Entity\Animal $animals
     * @return Species
     */
    public function addAnimal(\AppBundle\Entity\Animal $animals)
    {
        $this->animals[] = $animals;

        return $this;
    }

    /**
     * Remove animals
     *
     * @param \AppBundle\Entity\Animal $animals
     */
    public function removeAnimal(\AppBundle\Entity\Animal $animals)
    {
        $this->animals->removeElement($animals);
    }

    /**
     * Get animals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnimals()
    {
        return $this->animals;
    }

    /**
     * Add diseases
     *
     * @param \AppBundle\Entity\Disease $diseases
     * @return Species
     */
    public function addDisease(\AppBundle\Entity\Disease $diseases)
    {
        $this->diseases[] = $diseases;

        return $this;
    }

    /**
     * Remove diseases
     *
     * @param \AppBundle\Entity\Disease $diseases
     */
    public function removeDisease(\AppBundle\Entity\Disease $diseases)
    {
        $this->diseases->removeElement($diseases);
    }

    /**
     * Get diseases
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDiseases()
    {
        return $this->diseases;
    }
}
