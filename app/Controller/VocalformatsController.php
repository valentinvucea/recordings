<?php
App::uses('AppController', 'Controller');
/**
 * Vocalformats Controller
 *
 * @property Vocalformat $Vocalformat
 */
class VocalformatsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vocalformat->recursive = 0;
		$this->paginate = array('order' => 'vocalformat');		
		$this->set('vocalformats', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vocalformat->exists($id)) {
			throw new NotFoundException(__('Invalid vocalformat'));
		}
		$options = array('conditions' => array('Vocalformat.' . $this->Vocalformat->primaryKey => $id));
		$this->set('vocalformat', $this->Vocalformat->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vocalformat->create();
			if ($this->Vocalformat->save($this->request->data)) {
				$this->Session->setFlash(__('The vocalformat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocalformat could not be saved. Please, try again.'));
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
		if (!$this->Vocalformat->exists($id)) {
			throw new NotFoundException(__('Invalid vocalformat'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Vocalformat->save($this->request->data)) {
				$this->Session->setFlash(__('The vocalformat has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vocalformat could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Vocalformat.' . $this->Vocalformat->primaryKey => $id));
			$this->request->data = $this->Vocalformat->find('first', $options);
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

		$this->Vocalformat->id = $id;
		if (!$this->Vocalformat->exists()) {
			throw new NotFoundException(__('Invalid vocalformat'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vocalformat->delete()) {
			$this->Session->setFlash(__('Vocalformat deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Vocalformat was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
