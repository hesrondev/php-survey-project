<?php

namespace QcmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questionnaire
 *
 * @ORM\Table(name="questionnaire")
 * @ORM\Entity(repositoryClass="QcmBundle\Repository\QuestionnaireRepository")
 */
class Questionnaire
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
     * @ORM\Column(name="theme", type="string", length=255)
     */
    private $theme;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function getTheme()
    {

        return $this->theme;
    }

    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

}

