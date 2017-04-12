<?php
App::uses('AppController', 'Controller');
/**
 * Nationalities Controller
 *
 * @property Nationality $Nationality
 */
class NationalitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Nationality->recursive = 0;
		$this->paginate = array('order' => 'nationality');
		$this->set('nationalities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Nationality->exists($id)) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		$options = array('conditions' => array('Nationality.' . $this->Nationality->primaryKey => $id));
		$this->set('nationality', $this->Nationality->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nationality->create();
			if ($this->Nationality->save($this->request->data)) {
				$this->Session->setFlash(__('The nationality has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nationality could not be saved. Please, try again.'));
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
		if (!$this->Nationality->exists($id)) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Nationality->save($this->request->data)) {
				$this->Session->setFlash(__('The nationality has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nationality could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Nationality.' . $this->Nationality->primaryKey => $id));
			$this->request->data = $this->Nationality->find('first', $options);
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
		$this->Nationality->id = $id;
		if (!$this->Nationality->exists()) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Nationality->delete()) {
			$this->Session->setFlash(__('Nationality deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Nationality was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
