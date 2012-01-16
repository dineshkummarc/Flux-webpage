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
  	if (!$request->getParameter('sf_culture')) {
  		if ($this->getUser()->isFirstRequest()) {
  			$culture = $request->getPreferredCulture(array('en', 'es', 'ca'));
  			$this->getUser()->setCulture($culture);
  			$this->getUser()->isFirstRequest(false);
  		}	else {
  			$culture = $this->getUser()->getCulture();
  		}
  		$this->redirect('localized_homepage');
  	}
  	//print ('Culture: '.$this->getUser()->getCulture());
  	$unit = Doctrine::getTable('Unit')->getHomepage();
  	$this->title = $unit->getTitle(); 
  	$this->text  = $unit->getDescription();
  }
  
  public function executeServices(sfWebRequest $request)
  {
  	$unit = Doctrine::getTable('Unit')->getServices();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();  	
  }
  
  public function executeTeam(sfWebRequest $request)
  {
  	
  }
  
  public function executeContact(sfWebRequest $request)
  {
  	
  }
  
}
