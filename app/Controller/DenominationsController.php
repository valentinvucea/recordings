<?php
App::uses('AppController', 'Controller');
/**
 * Denominations Controller
 *
 * @property Denomination $Denomination
 */
class DenominationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Denomination->recursive = 0;
		$this->paginate = array('order' => 'denomination');
		$this->set('denominations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Denomination->exists($id)) {
			throw new NotFoundException(__('Invalid denomination'));
		}
		$options = array('conditions' => array('Denomination.' . $this->Denomination->primaryKey => $id));
		$this->set('denomination', $this->Denomination->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Denomination->create();
			if ($this->Denomination->save($this->request->data)) {
				$this->Session->setFlash(__('The denomination has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The denomination could not be saved. Please, try again.'));
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
		if (!$this->Denomination->exists($id)) {
			throw new NotFoundException(__('Invalid denomination'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Denomination->save($this->request->data)) {
				$this->Session->setFlash(__('The denomination has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The denomination could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Denomination.' . $this->Denomination->primaryKey => $id));
			$this->request->data = $this->Denomination->find('first', $options);
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
		$this->Denomination->id = $id;
		if (!$this->Denomination->exists()) {
			throw new NotFoundException(__('Invalid denomination'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Denomination->delete()) {
			$this->Session->setFlash(__('Denomination deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Denomination was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
