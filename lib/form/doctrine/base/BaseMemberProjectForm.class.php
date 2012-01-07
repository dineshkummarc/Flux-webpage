<?php

/**
 * MemberProject form base class.
 *
 * @method MemberProject getObject() Returns the current form's model object
 *
 * @package    fluxweb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMemberProjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'project_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Project'), 'add_empty' => false)),
      'member_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'enumeration_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Enumeration'), 'add_empty' => false)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'project_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Project'))),
      'member_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'enumeration_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Enumeration'))),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('member_project[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberProject';
  }

}
