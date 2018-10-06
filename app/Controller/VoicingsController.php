<?php
App::uses('AppController', 'Controller');
/**
 * Voicings Controller
 *
 * @property Voicing $Voicing
 */
class VoicingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Voicing->recursive = 0;
		$this->paginate = array('order' => 'voicing');		
		$this->set('voicings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Voicing->exists($id)) {
			throw new NotFoundException(__('Invalid voicing'));
		}
		$options = array('conditions' => array('Voicing.' . $this->Voicing->primaryKey => $id));
		$this->set('voicing', $this->Voicing->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Voicing->create();
			if ($this->Voicing->save($this->request->data)) {
				$this->Session->setFlash(__('The voicing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voicing could not be saved. Please, try again.'));
			}
		}

        if (false === $this->isAdmin()) {
            $this->Session->setFlash(__('Only Admins can add new records.'));
            $this->redirect(array('action' => 'index'));
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
		if (!$this->Voicing->exists($id)) {
			throw new NotFoundException(__('Invalid voicing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Voicing->save($this->request->data)) {
				$this->Session->setFlash(__('The voicing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The voicing could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Voicing.' . $this->Voicing->primaryKey => $id));
			$this->request->data = $this->Voicing->find('first', $options);
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
        if (false === $this->isAdmin()) {
            $this->Session->setFlash(__('Only Admins can delete records.'));
            $this->redirect(array('action' => 'index'));
        }

		$this->Voicing->id = $id;
		if (!$this->Voicing->exists()) {
			throw new NotFoundException(__('Invalid voicing'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Voicing->delete()) {
			$this->Session->setFlash(__('Voicing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Voicing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
