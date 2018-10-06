<?php
App::uses('AppController', 'Controller');
/**
 * Recordingnotes Controller
 *
 * @property Recordingnote $Recordingnote
 */
class RecordingnotesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recordingnote->recursive = 0;
		$this->paginate = array('order' => 'recording_note');
		$this->set('recordingnotes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Recordingnote->exists($id)) {
			throw new NotFoundException(__('Invalid recordingnote'));
		}
		$options = array('conditions' => array('Recordingnote.' . $this->Recordingnote->primaryKey => $id));
		$this->set('recordingnote', $this->Recordingnote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recordingnote->create();
			if ($this->Recordingnote->save($this->request->data)) {
				$this->Session->setFlash(__('The recordingnote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recordingnote could not be saved. Please, try again.'));
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
		if (!$this->Recordingnote->exists($id)) {
			throw new NotFoundException(__('Invalid recordingnote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recordingnote->save($this->request->data)) {
				$this->Session->setFlash(__('The recordingnote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recordingnote could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Recordingnote.' . $this->Recordingnote->primaryKey => $id));
			$this->request->data = $this->Recordingnote->find('first', $options);
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

		$this->Recordingnote->id = $id;
		if (!$this->Recordingnote->exists()) {
			throw new NotFoundException(__('Invalid recordingnote'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recordingnote->delete()) {
			$this->Session->setFlash(__('Recordingnote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recordingnote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
