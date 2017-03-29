<?php

namespace QcmBundle\Entity;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;

class QuestionChoix extends AbstractType
{
	private $idQuestion;
	private $libelle;

	private $listeChoix = array();




	public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'libelle' => 'libelle',
            'listeChoix' => 'listeChoix'
        ));
    }



	public function setIdQuestion($id)
	{
		$this->idQuestion=$id;
	}

	public function getIdQuestion()
	{
		return $this->idQuestion;
	}

	public function setLibelle($libelle)
	{
		$this->libelle=$libelle;
	}

	public function getLibelle()
	{
		return $this->libelle;
	}


	public function addChoix($choix)
	{
		array_push($this->listeChoix,$choix);
	}

	public function getListeChoix()
	{
		return $this->listeChoix;
	}


}