<?php

/**
 * ProjectTranslation filter form base class.
 *
 * @package    fluxweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseProjectTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'technology' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'technology' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('project_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProjectTranslation';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'technology' => 'Text',
      'lang'       => 'Text',
    );
  }
}
