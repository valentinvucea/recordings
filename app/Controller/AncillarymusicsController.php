<?php
App::uses('AppController', 'Controller');
/**
 * Ancillarymusics Controller
 *
 * @property Ancillarymusic $Ancillarymusic
 */
class AncillarymusicsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ancillarymusic->recursive = 0;
		$this->paginate = array('order' => 'name');
		$this->set('ancillarymusics', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ancillarymusic->exists($id)) {
			throw new NotFoundException(__('Invalid ancillarymusic'));
		}
		$options = array('conditions' => array('Ancillarymusic.' . $this->Ancillarymusic->primaryKey => $id));
		$this->set('ancillarymusic', $this->Ancillarymusic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ancillarymusic->create();
			if ($this->Ancillarymusic->save($this->request->data)) {
				$this->Session->setFlash(__('The ancillarymusic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ancillarymusic could not be saved. Please, try again.'));
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
		if (!$this->Ancillarymusic->exists($id)) {
			throw new NotFoundException(__('Invalid ancillarymusic'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ancillarymusic->save($this->request->data)) {
				$this->Session->setFlash(__('The ancillarymusic has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ancillarymusic could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ancillarymusic.' . $this->Ancillarymusic->primaryKey => $id));
			$this->request->data = $this->Ancillarymusic->find('first', $options);
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
		$this->Ancillarymusic->id = $id;
		if (!$this->Ancillarymusic->exists()) {
			throw new NotFoundException(__('Invalid ancillarymusic'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ancillarymusic->delete()) {
			$this->Session->setFlash(__('Ancillarymusic deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ancillarymusic was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
