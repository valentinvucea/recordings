<?php
App::uses('AppController', 'Controller');
/**
 * Recsongs Controller
 *
 * @property Recsong $Recsong
 */
class RecsongsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recsong->recursive = 0;
		$this->set('recsongs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recsong->exists($id)) {
			throw new NotFoundException(__('Invalid recsong'));
		}
		$options = array('conditions' => array('Recsong.' . $this->Recsong->primaryKey => $id));
		$this->set('recsong', $this->Recsong->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recsong->create();
			if ($this->Recsong->save($this->request->data)) {
				$this->Session->setFlash(__('The recsong has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recsong could not be saved. Please, try again.'));
			}
		}
		$recordings = $this->Recsong->Recording->find('list');
		$songs = $this->Recsong->Song->find('list');
		$this->set(compact('recordings', 'songs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recsong->exists($id)) {
			throw new NotFoundException(__('Invalid recsong'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recsong->save($this->request->data)) {
				$this->Session->setFlash(__('The recsong has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recsong could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recsong.' . $this->Recsong->primaryKey => $id));
			$this->request->data = $this->Recsong->find('first', $options);
		}
		$recordings = $this->Recsong->Recording->find('list');
		$songs = $this->Recsong->Song->find('list');
		$this->set(compact('recordings', 'songs'));
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
		$this->Recsong->id = $id;
		if (!$this->Recsong->exists()) {
			throw new NotFoundException(__('Invalid recsong'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recsong->delete()) {
			$this->Session->setFlash(__('Recsong deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recsong was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
