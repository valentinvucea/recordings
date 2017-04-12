<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppHelper', 'View/Helper');
/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class SbmenuHelper extends AppHelper {
	
	protected $Submenu = null;
	public $helpers = array('Html');
	
	public function __construct()
	{
		$this->Submenu = ClassRegistry::init('Submenu');
	}
	
	public function getsbmenu($c='',$m='',$id=0)
	{	
		App::import('Helper', 'Html');
    	$this->Html = new HtmlHelper(new View);
		
		/* start output */
		$output = '';
		$link = '';
		$submeniu = $this->Submenu->find('first', array('conditions' => array('controller' => $c, 'method' => $m), 'order' => array('pozitie' => 'asc')));

		/*
		echo '<pre>';
		print_r($submeniu);
		echo '</pre>';
		*/
		
		$smenu = '';
		$smenu = explode('|',$submeniu['Submenu']['filtru']);
		
		for($i=0;$i<count($smenu);$i++)
		{
			$link = '';
			$link = explode('@', $smenu[$i]);
			$info = $this->Submenu->find('first', array('conditions' => array('controller' => $link[1], 'method' => $link[0])));
			
			$output.= '<li>';
			
			$url = FULL_BASE_URL . '/' . $link[1] . '/' . $link[0];
			
			if($id!=0)
			{
				if(isset($info['Submenu']['args']))
					if($info['Submenu']['args']!='')
						$url.= '/' . $id;				
			}
			else
			{
				if(isset($this->Session['Listare.page_value']))
					$url.= '/page:' . $this->Session['Listare.page_value'];
				
				if(isset($this->Session['Listare.sort_value']))
					$url.= '/sort:' . $this->Session['Listare.sort_value'];	
				
				if(isset($this->Session['Listare.sens_value']))
					$url.= '/direction:' . $this->Session['Listare.sens_value'];
			}
			
			$output.= $this->Html->link($info['Submenu']['nume'], $url, array('escape' => false, 'title' => $info['Submenu']['title']));
			$output.= '</li>';
		}
	
		if($output != '')
			$output = '<div class="subnav">' . '<ul class="nav nav-pills">' . $output . '</ul></div>';
		
		return $output;
		
	}
	
	
	
	
	
	
	
	
	
	
}
