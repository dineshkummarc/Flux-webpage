<?php

/**
 * project actions.
 *
 * @package    fluxweb
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class projectActions extends sfActions
{
	
  public function executeIndex(sfWebRequest $request)
  {
    $this->projects = Doctrine_Core::getTable('Project')
      ->createQuery('a')
      ->leftJoin('a.Enumeration e')
      ->where('e.is_active = 1')
      ->orderBy('e.position')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->project = Doctrine_Core::getTable('Project')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->project);
  }

}
