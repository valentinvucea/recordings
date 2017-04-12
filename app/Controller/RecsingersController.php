<?php
App::uses('AppController', 'Controller');
/**
 * Recsingers Controller
 *
 * @property Recsinger $Recsinger
 */
class RecsingersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recsinger->recursive = 0;
		$this->set('recsingers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recsinger->exists($id)) {
			throw new NotFoundException(__('Invalid recsinger'));
		}
		$options = array('conditions' => array('Recsinger.' . $this->Recsinger->primaryKey => $id));
		$this->set('recsinger', $this->Recsinger->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recsinger->create();
			if ($this->Recsinger->save($this->request->data)) {
				$this->Session->setFlash(__('The recsinger has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recsinger could not be saved. Please, try again.'));
			}
		}
		$recordings = $this->Recsinger->Recording->find('list');
		$singers = $this->Recsinger->Singer->find('list');
		$this->set(compact('recordings', 'singers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recsinger->exists($id)) {
			throw new NotFoundException(__('Invalid recsinger'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recsinger->save($this->request->data)) {
				$this->Session->setFlash(__('The recsinger has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recsinger could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recsinger.' . $this->Recsinger->primaryKey => $id));
			$this->request->data = $this->Recsinger->find('first', $options);
		}
		$recordings = $this->Recsinger->Recording->find('list');
		$singers = $this->Recsinger->Singer->find('list');
		$this->set(compact('recordings', 'singers'));
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
		$this->Recsinger->id = $id;
		if (!$this->Recsinger->exists()) {
			throw new NotFoundException(__('Invalid recsinger'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recsinger->delete()) {
			$this->Session->setFlash(__('Recsinger deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recsinger was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
