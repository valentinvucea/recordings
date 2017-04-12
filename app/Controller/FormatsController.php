<?php
App::uses('AppController', 'Controller');
/**
 * Formats Controller
 *
 * @property Format $Format
 */
class FormatsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Format->recursive = 0;
		$this->paginate = array('order' => 'format');		
		$this->set('formats', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Format->exists($id)) {
			throw new NotFoundException(__('Invalid format'));
		}
		$options = array('conditions' => array('Format.' . $this->Format->primaryKey => $id));
		$this->set('format', $this->Format->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Format->create();
			if ($this->Format->save($this->request->data)) {
				$this->Session->setFlash(__('The format has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The format could not be saved. Please, try again.'));
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
		if (!$this->Format->exists($id)) {
			throw new NotFoundException(__('Invalid format'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Format->save($this->request->data)) {
				$this->Session->setFlash(__('The format has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The format could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Format.' . $this->Format->primaryKey => $id));
			$this->request->data = $this->Format->find('first', $options);
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
		$this->Format->id = $id;
		if (!$this->Format->exists()) {
			throw new NotFoundException(__('Invalid format'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Format->delete()) {
			$this->Session->setFlash(__('Format deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Format was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
