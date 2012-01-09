<?php

/**
 * project actions.
 *
 * @package    fluxweb
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staticActions extends sfActions
{
	
  public function executeHome(sfWebRequest $request)
  {
  	$this->text = Doctrine::getTable('Unit')->getHomepage()->getDescription();
  }
  
  public function executeTeam(sfWebRequest $request)
  {
  	
  }
  
  public function executeContact(sfWebRequest $request)
  {
  	
  }
  
}
