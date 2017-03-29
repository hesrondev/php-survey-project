<?php

namespace QcmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Choix
 *
 * @ORM\Table(name="choix")
 * @ORM\Entity(repositoryClass="QcmBundle\Repository\ChoixRepository")
 */
class Choix
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estCorrect", type="boolean")
     */
    private $estCorrect;

    /**
   * @ORM\ManyToOne(targetEntity="QcmBundle\Entity\Question")
   * @ORM\JoinColumn(nullable=false)
   */
    private $question;


    public function getQuestion()
    {
        return $this->question;
    }


    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }



    /**
     * Get estCorrect
     *
     * @return boolean
     */
    public function getEstCorrect()
    {
        return $this->estCorrect;
    }

    /**
     * Set estCorrect
     *
     * @param boolean $estCorrect
     *
     * @return boolean
     */
    public function setEstCorrect($estCorrect)
    {
        $this->estCorrect = $estCorrect;

        return $this;
    }

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Choix
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}

