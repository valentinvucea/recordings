<?php
App::uses('AppController', 'Controller');
/**
 * Versions Controller
 *
 * @property Version $Version
 */
class VersionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Version->recursive = 0;
		$this->paginate = array('order' => 'version');
		$this->set('versions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Version->exists($id)) {
			throw new NotFoundException(__('Invalid version'));
		}
		$options = array('conditions' => array('Version.' . $this->Version->primaryKey => $id));
		$this->set('version', $this->Version->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Version->create();
			if ($this->Version->save($this->request->data)) {
				$this->Session->setFlash(__('The version has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The version could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Version->exists($id)) {
			throw new NotFoundException(__('Invalid version'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Version->save($this->request->data)) {
				$this->Session->setFlash(__('The version has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The version could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Version.' . $this->Version->primaryKey => $id));
			$this->request->data = $this->Version->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Version->id = $id;
		if (!$this->Version->exists()) {
			throw new NotFoundException(__('Invalid version'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Version->delete()) {
			$this->Session->setFlash(__('Version deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Version was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
