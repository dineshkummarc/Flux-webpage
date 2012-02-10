<?php
class ContactForm extends sfForm
{
	public function setup()
	{	
		$this->setWidgets(array(
		      'name'        => new sfWidgetFormInputText(),
					'email'       => new sfWidgetFormInputText(),
					'phone'       => new sfWidgetFormInputText(),
					'message'     => new sfWidgetFormTextarea()
		));
		$this->setValidators(array(
					'name'       => new sfValidatorString(array('min_length' => 3, 'max_length' => 255)), //, array('required' => '*dato obligatorio')),
					'email'      => new sfValidatorEmail(), //array(), array('invalid' => '*dato inválido', 'required' => '*dato obligatorio')),
					'phone'      => new sfValidatorString(array('required' => false, 'min_length' => 3)), //, array('required' => '*dato obligatorio')),
					'message'    => new sfValidatorString(array('max_length' => 4000)) //, array('required' => '*dato obligatorio'))
		));
		$this->widgetSchema->setNameFormat('contacte[%s]');
	}
}