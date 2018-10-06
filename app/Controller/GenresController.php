<?php
App::uses('AppController', 'Controller');
/**
 * Genres Controller
 *
 * @property Genre $Genre
 */
class GenresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Genre->recursive = 0;
		$this->paginate = array('order' => 'genre');
		$this->set('genres', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Genre->exists($id)) {
			throw new NotFoundException(__('Invalid genre'));
		}
		$options = array('conditions' => array('Genre.' . $this->Genre->primaryKey => $id));
		$this->set('genre', $this->Genre->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Genre->create();
			if ($this->Genre->save($this->request->data)) {
				$this->Session->setFlash(__('The genre has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The genre could not be saved. Please, try again.'));
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
		if (!$this->Genre->exists($id)) {
			throw new NotFoundException(__('Invalid genre'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Genre->save($this->request->data)) {
				$this->Session->setFlash(__('The genre has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The genre could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Genre.' . $this->Genre->primaryKey => $id));
			$this->request->data = $this->Genre->find('first', $options);
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

		$this->Genre->id = $id;
		if (!$this->Genre->exists()) {
			throw new NotFoundException(__('Invalid genre'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Genre->delete()) {
			$this->Session->setFlash(__('Genre deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Genre was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
