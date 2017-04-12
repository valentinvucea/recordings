<?php
App::uses('AppController', 'Controller');
/**
 * Presentations Controller
 *
 * @property Presentation $Presentation
 */
class PresentationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Presentation->recursive = 0;
		$this->paginate = array('order' => 'presentation');
		$this->set('presentations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
		$this->set('presentation', $this->Presentation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Presentation->create();
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'));
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
		if (!$this->Presentation->exists($id)) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Presentation->save($this->request->data)) {
				$this->Session->setFlash(__('The presentation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presentation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Presentation.' . $this->Presentation->primaryKey => $id));
			$this->request->data = $this->Presentation->find('first', $options);
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
		$this->Presentation->id = $id;
		if (!$this->Presentation->exists()) {
			throw new NotFoundException(__('Invalid presentation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Presentation->delete()) {
			$this->Session->setFlash(__('Presentation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Presentation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
