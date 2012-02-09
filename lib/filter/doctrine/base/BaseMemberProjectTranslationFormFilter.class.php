<?php

/**
 * MemberProjectTranslation filter form base class.
 *
 * @package    fluxweb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMemberProjectTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'task' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'task' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_project_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberProjectTranslation';
  }

  public function getFields()
  {
    return array(
      'id'   => 'Number',
      'task' => 'Text',
      'lang' => 'Text',
    );
  }
}
