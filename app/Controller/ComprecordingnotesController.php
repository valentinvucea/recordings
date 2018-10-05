<?php
App::uses('AppController', 'Controller');
/**
 * Comprecordingnotes Controller
 *
 * @property Comprecordingnote $Comprecordingnote
 */
class ComprecordingnotesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Comprecordingnote->recursive = 0;
		$this->paginate = array('order' => 'note');
		$this->set('comprecordingnotes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Comprecordingnote->exists($id)) {
			throw new NotFoundException(__('Invalid comprecordingnote'));
		}
		$options = array('conditions' => array('Comprecordingnote.' . $this->Comprecordingnote->primaryKey => $id));
		$this->set('comprecordingnote', $this->Comprecordingnote->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Comprecordingnote->create();
			if ($this->Comprecordingnote->save($this->request->data)) {
				$this->Session->setFlash(__('The comprecordingnote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comprecordingnote could not be saved. Please, try again.'));
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
		if (!$this->Comprecordingnote->exists($id)) {
			throw new NotFoundException(__('Invalid comprecordingnote'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comprecordingnote->save($this->request->data)) {
				$this->Session->setFlash(__('The comprecordingnote has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comprecordingnote could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Comprecordingnote.' . $this->Comprecordingnote->primaryKey => $id));
			$this->request->data = $this->Comprecordingnote->find('first', $options);
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
		$this->Comprecordingnote->id = $id;
		if (!$this->Comprecordingnote->exists()) {
			throw new NotFoundException(__('Invalid comprecordingnote'));
		}
		$this->request->onlyAllow('post', 'delete');

        if (false === $this->isAdmin()) {
            $this->Session->setFlash(__('Only Admins can delete records.'));
            $this->redirect(array('action' => 'index'));
        }

		if ($this->Comprecordingnote->delete()) {
			$this->Session->setFlash(__('Comprecordingnote deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comprecordingnote was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
