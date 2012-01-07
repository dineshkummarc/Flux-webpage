<?php

/**
 * BaseProject
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $unit_id
 * @property integer $enumeration_id
 * @property string $logo
 * @property string $alt_image
 * @property Unit $Unit
 * @property Enumeration $Enumeration
 * @property Doctrine_Collection $Projects
 * 
 * @method integer             getUnitId()         Returns the current record's "unit_id" value
 * @method integer             getEnumerationId()  Returns the current record's "enumeration_id" value
 * @method string              getLogo()           Returns the current record's "logo" value
 * @method string              getAltImage()       Returns the current record's "alt_image" value
 * @method Unit                getUnit()           Returns the current record's "Unit" value
 * @method Enumeration         getEnumeration()    Returns the current record's "Enumeration" value
 * @method Doctrine_Collection getProjects()       Returns the current record's "Projects" collection
 * @method Project             setUnitId()         Sets the current record's "unit_id" value
 * @method Project             setEnumerationId()  Sets the current record's "enumeration_id" value
 * @method Project             setLogo()           Sets the current record's "logo" value
 * @method Project             setAltImage()       Sets the current record's "alt_image" value
 * @method Project             setUnit()           Sets the current record's "Unit" value
 * @method Project             setEnumeration()    Sets the current record's "Enumeration" value
 * @method Project             setProjects()       Sets the current record's "Projects" collection
 * 
 * @package    fluxweb
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProject extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('project');
        $this->hasColumn('unit_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('enumeration_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('logo', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('alt_image', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Unit', array(
             'local' => 'unit_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Enumeration', array(
             'local' => 'enumeration_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('MemberProject as Projects', array(
             'local' => 'id',
             'foreign' => 'project_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}