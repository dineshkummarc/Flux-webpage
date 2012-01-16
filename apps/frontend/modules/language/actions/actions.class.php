<?php

class languageActions extends sfActions
{
	public function executeChangeLanguage(sfWebRequest $request)
	{
		/*
		 	print ('Request language: '. $request->getGetParameter('lang'). '<br/>');
			print ('Path info: '. $request->getPathInfo(). '<br/>');
			print ('Referer: '. $request->getReferer(). '<br/>');
			print ('Current user culture: '. $this->getUser()->getCulture(). '<br/>');
		 */
		$newURL = str_replace('/'.$this->getUser()->getCulture().'/' , '/'.$request->getGetParameter('lang').'/', $request->getReferer());
		$this->getUser()->setCulture($request->getGetParameter('lang'));
		return $this->redirect($newURL);
	}

}