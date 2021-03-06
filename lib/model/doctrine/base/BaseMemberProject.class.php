<?php

/**
 * BaseMemberProject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $task
 * @property integer $project_id
 * @property integer $member_id
 * @property integer $enumeration_id
 * @property Project $Project
 * @property Member $Member
 * @property Enumeration $Enumeration
 * 
 * @method string        getTask()           Returns the current record's "task" value
 * @method integer       getProjectId()      Returns the current record's "project_id" value
 * @method integer       getMemberId()       Returns the current record's "member_id" value
 * @method integer       getEnumerationId()  Returns the current record's "enumeration_id" value
 * @method Project       getProject()        Returns the current record's "Project" value
 * @method Member        getMember()         Returns the current record's "Member" value
 * @method Enumeration   getEnumeration()    Returns the current record's "Enumeration" value
 * @method MemberProject setTask()           Sets the current record's "task" value
 * @method MemberProject setProjectId()      Sets the current record's "project_id" value
 * @method MemberProject setMemberId()       Sets the current record's "member_id" value
 * @method MemberProject setEnumerationId()  Sets the current record's "enumeration_id" value
 * @method MemberProject setProject()        Sets the current record's "Project" value
 * @method MemberProject setMember()         Sets the current record's "Member" value
 * @method MemberProject setEnumeration()    Sets the current record's "Enumeration" value
 * 
 * @package    fluxweb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMemberProject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('member_project');
        $this->hasColumn('task', 'string', 2000, array(
             'type' => 'string',
             'length' => 2000,
             ));
        $this->hasColumn('project_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('member_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('enumeration_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Project', array(
             'local' => 'project_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Enumeration', array(
             'local' => 'enumeration_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $i18n0 = new Doctrine_Template_I18n(array(
             'fields' => 
             array(
              0 => 'task',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($i18n0);
    }
}