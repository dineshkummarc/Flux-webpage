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
  	$unit = UnitTable::getHomepage();
  	$this->title = $unit->getTitle(); 
  	$this->text  = $unit->getDescription();
  }
  
  public function executeServices(sfWebRequest $request)
  {
  	$unit = UnitTable::getServices();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  }
  
  public function executeTeam(sfWebRequest $request)
  {
  	
  }
  
  public function executeContact(sfWebRequest $request)
  {
  	$unit = UnitTable::getContact();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  	$this->form  = new ContactForm();
  	if ($request->isMethod(sfRequest::POST)) {
  		$this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
  		if ($this->form->isValid()) {
  			// Send message and redirect
  			$message = Swift_Message::newInstance()
  			->setSubject('Missatge de contacte web Flux')
  			->setFrom(array($this->form->getValue('email') => $this->form->getValue('name')))
  			->setTo(array('david@flux.cat' => 'David Romani'))
  			->setBody('Missatge de contacte formulari web')
  			->addPart(
  					'<p>Missatge de contacte formulari web<br/><br/></p>'.
  					'<p>Enviat per: '. $this->form->getValue('name'). '<br/><br/>'.
  					'Email: '. $this->form->getValue('email'). '<br/><br/>'.
  					'Telèfon: '. $this->form->getValue('phone'). '<br/><br/>'.
  					'Missatge: '. $this->form->getValue('message'). '</p>', 'text/html');
  			$this->getMailer()->send($message);
  			$this->getUser()->setFlash('msg', 'Email send');
  			$this->form  = new ContactForm();
  		}
  	}
  }
  
  public function executePrivacy(sfWebRequest $request)
  {
  	$unit = UnitTable::getPrivacy();
  	$this->title = $unit->getTitle();
  	$this->text  = $unit->getDescription();
  }
  
}
