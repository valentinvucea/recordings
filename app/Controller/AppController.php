<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
		//'DebugKit.Toolbar'
    );
    public $helpers = array('Html', 'Form', 'Session', 'Sbmenu', 'Authorize');

    public function beforeFilter()
    {
        //Configure AuthComponent
        $this->Auth->loginAction = ['controller' => 'users', 'action' => 'login'];
        $this->Auth->logoutRedirect = ['controller' => 'users', 'action' => 'login'];
        $this->Auth->loginRedirect = ['controller' => 'pages', 'action' => 'dashboard'];
        $this->Auth->allow('display');
    }

    /** Pass in all views if the user is admin */
    public function beforeRender() {
        $this->set('isAdmin', $this->isAdmin());
    }

    /**
     * @return bool|mixed
     */
    public function isAdmin()
    {
        $user = $this->Auth->user();

        if (null !== $user) {
            $groupId = $user['Group']['id'];
            if (1 == $groupId) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->Auth->user();
    }
}
