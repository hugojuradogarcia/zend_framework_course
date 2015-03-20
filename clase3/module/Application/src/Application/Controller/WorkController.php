<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class WorkController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function otroAction()
    {
        return new ViewModel();
    }
    public function recibeparametrosAction()
    {
    	$saludo = "Mensaje para correr desnudo por la casa";
    	$array = array("Hugo", "Karen", "Leo");
        return new ViewModel( array( 
        	'saludo' => $saludo, 
        	'segundo' => 'cualquier cosa', 
        	'nombres' => $array ));
    }
    public function valoresurlAction()
    {
    	$id = (int) $this->params()->fromRoute("id", null);
    	$id2 = (int) $this->params()->fromRoute("id2", null);
    	$url = $this->getRequest()->getBaseUrl();
    	$titulo = "Valores GET por la URL";
    	return new viewModel( array('titulo'=>$titulo, 'id'=>$id, 'id2'=>$id2, 'url'=>$url ));
    }

    // plugin redirect
    public function redireccionarAction()
    {
    	return $this->redirect()->toUrl( $this->getRequest()->getBaseUrl().'/application/work/index' );
    }
    // pugin forward
    public function cargarotravistaAction()
    {
    	return $this->forward()->dispatch('Application\Controller\Work', array('action'=>'otro'));
    }

    public function conrenderAction()
    {
    	// Renders application/trabajo/conrender.phtml
    	$view = new ViewModel;
    	return $view;
    }
}
