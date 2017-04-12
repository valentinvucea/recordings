<?php
App::uses('AppController', 'Controller');
/**
 * Conductors Controller
 *
 * @property Conductor $Conductor
 */
class ConductorsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Conductor->recursive = 0;
		$this->set('conductors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conductor->exists($id)) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		$options = array('conditions' => array('Conductor.' . $this->Conductor->primaryKey => $id));
		$this->set('conductor', $this->Conductor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conductor->create();
			if ($this->Conductor->save($this->request->data)) {
				$this->Session->setFlash(__('The conductor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conductor could not be saved. Please, try again.'));
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
		if (!$this->Conductor->exists($id)) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Conductor->save($this->request->data)) {
				$this->Session->setFlash(__('The conductor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The conductor could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conductor.' . $this->Conductor->primaryKey => $id));
			$this->request->data = $this->Conductor->find('first', $options);
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
		$this->Conductor->id = $id;
		if (!$this->Conductor->exists()) {
			throw new NotFoundException(__('Invalid conductor'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Conductor->delete()) {
			$this->Session->setFlash(__('Conductor deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Conductor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
