<?php

class languageActions extends sfActions
{
	public function executeChangeLanguage(sfWebRequest $request)
	{
		$this->getUser()->setCulture($request->getGetParameter('lang'));
		$accio = substr(strrchr($request->getReferer(), "/"), 1);
		$found = false;
		
		if ($accio == 'inicio' || $accio == 'inici' || $accio == 'home') {
			$newRoute = '@homepage_'.$request->getGetParameter('lang'); $found = true;
		} else if ($accio == 'proyecto' || $accio == 'projecte' || $accio == 'project') {
			$newRoute = '@projectes_'.$request->getGetParameter('lang'); $found = true;
		} else if ($accio == 'servicios' || $accio == 'serveis' || $accio == 'services') {
			$newRoute = '@serveis_'.$request->getGetParameter('lang'); $found = true;
		} else if ($accio == 'equipo' || $accio == 'equip' || $accio == 'team') {
			$newRoute = '@equip_'.$request->getGetParameter('lang'); $found = true;
		} else if ($accio == 'contacto' || $accio == 'contacte' || $accio == 'contact') {
			$newRoute = '@contacte_'.$request->getGetParameter('lang'); $found = true;
		} else if ($accio == 'privacidad' || $accio == 'privacitat' || $accio == 'privacy') {
			$newRoute = '@privacitat_'.$request->getGetParameter('lang'); $found = true;
		}
		
		if (!$found) {
			// Es un detall de projecte (show)
			$newRoute = '@project_by_name_'.$request->getGetParameter('lang').'?name='.$accio;
		}
		
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] Request language: '.$request->getGetParameter('lang'));
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] Path info: '.$request->getPathInfo());
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] Referer: '.$request->getReferer());
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] Current user culture: '.$this->getUser()->getCulture());
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] Action: '.$accio);
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] New route: '.$newRoute);
		sfContext::getInstance()->getLogger()->debug('[language/changeLanguage] New jump: '.$this->getController()->genUrl($newRoute));
		
		return $this->redirect($this->getController()->genUrl($newRoute));
	}

}