<?php

/**
 * menu actions.
 *
 * @package    amep
 * @subpackage menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuComponents extends sfComponents
{
 public function executeShowMenu()
  {
  	$arr = sfConfig::get('app_menus_backend_menu');
  	$this->menu = ioMenuItem::createFromArray($arr);
  }
}
