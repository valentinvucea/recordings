<?php
App::uses('AppController', 'Controller');
/**
 * Directors Controller
 *
 * @property Director $Director
 */
class DirectorsController extends AppController {
	public $helpers = array('Icon', 'Sessionplus');	
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index() {
    
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    if(isset($this->data['Director']['name']) && $this->data['Director']['name'])
		        $filters['name'] = $this->data['Director']['name'];
			else
				$this->Session->write('DirectorSearch.name_value', null);
			
		    if(isset($this->data['Director']['position_id']))
		        $filters['position_id'] = $this->data['Director']['position_id'];
			else
				$this->Session->write('DirectorSearch.position_id_value', null);		        
				
			$this->Session->write('DirectorSearch.page_value', 1);
			
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
		
		//check filters on passedArgs
		$conditions = array();
		
		/* nume */
		if(isset($this->passedArgs['name']))	
   			$conditions['Director.name'] = $this->passedArgs['name'];
		else
			if($this->Session->check('DirectorSearch.name_value'))
				$conditions['Director.name'] = $this->Session->read('DirectorSearch.name_value');
		
		/* position_id */
		if(isset($this->passedArgs['position_id'])){
			if($this->passedArgs['position_id'] != '')  		
    			$conditions['Director.position_id'] = $this->passedArgs['position_id'];
		} else {
			if($this->Session->check('DirectorSearch.position_id_value'))
				if($this->Session->check('DirectorSearch.position_id_value') != '')
					$conditions['Director.position_id'] = $this->Session->read('DirectorSearch.position_id_value');
		}
		
		/* page */
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else
			if($this->Session->check('DirectorSearch.page_value'))
				$curpage = $this->Session->read('DirectorSearch.page_value');
			else
				$curpage = 1;
				
		/* WRITE FORM VALUES TO SESSION */
		foreach($conditions As $k=>$v)
		{
			$this->Session->write(str_replace('Director', 'DirectorSearch', $k) . '_value', $v);
		}
		
		if(array_key_exists('Director.name', $conditions) == true) {
			$name = array_shift($conditions);
			$conditions['Director.name LIKE'] = '%' . $name . '%';
		}
				
		$this->paginate = array (
			'conditions' => $conditions,
			'contain' => array('Position'),
			'fields' => array('Director.id', 'Director.name', 'Director.alt_name', 'Director.position_id', 'Position.position', 'Director.notes'),
			'order' => array ('Director.id' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		
		if(array_key_exists('Director.name LIKE', $conditions) == true) {
			$name = array_pop($conditions);
			$conditions['Director.name'] = str_replace('%', '', $name);
		}			
		
		/* INIT POSITION */
		$position_list = $this->Director->Position->find('list', array(
        	'fields' => array('Position.id', 'Position.position'),
        	'conditions' => array('Position.position !=' => ''),
        	'recursive' => 0
    	));
				
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('DirectorSearch.page_value', $curpage);
		
		$directors = $this->paginate('Director');

		$this->set(compact('position_list', 'directors', 'positions', 'conditions'));
	
		$this->render('index');
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Director->exists($id)) {
			throw new NotFoundException(__('Invalid director'));
		}
		$options = array('conditions' => array('Director.' . $this->Director->primaryKey => $id));
		$this->set('director', $this->Director->find('first', $options));
	}

	public function select($id = null) {
		if ($id) $this->Util->replaceInSess('DirectorSearch', array('id_value' => $id));
		$this->redirect(array('action' => 'index'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Director->create();
			if ($this->Director->save($this->request->data)) {
				$this->Session->setFlash(__('The director has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The director could not be saved. Please, try again.'));
			}
		}
		$positions = $this->Director->Position->find('list');
		$this->set(compact('positions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Director->exists($id)) {
			throw new NotFoundException(__('Invalid director'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Director->save($this->request->data)) {
				$this->Session->setFlash(__('The director has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The director could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Director.' . $this->Director->primaryKey => $id));
			$this->request->data = $this->Director->find('first', $options);
		}
		$positions = $this->Director->Position->find('list');
		$this->set(compact('positions'));
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
		$this->Director->id = $id;
		if (!$this->Director->exists()) {
			throw new NotFoundException(__('Invalid director'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Director->delete()) {
			$this->Session->setFlash(__('Director deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Director was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);
			$this->Session->setFlash(__('Director #' . $id . ' was removed from memory!'));
			$this->Util->delFromSess('Singers', array('director_id', 'Director.name'));
			$this->Util->delFromSess('DirectorSearch', array('id_value'));			
			$this->redirect(array('action' => 'index'));
		} else {
			if (!$this->Director->exists($id)) {
				throw new NotFoundException(__('Invalid director'));
			}	
			
			if ($this->Session->check('Singers') === false) {
				$this->Session->setFlash(__('No active Choir-Director session! Memory cleared!'));				
				$this->Util->delFromSess('Singers', array('director_id', 'Director.name'));
				$this->redirect(array('action' => 'index'));
			} else {
				$singers = $this->Session->read('Singers');

				$options = array('conditions' => array('Director.' . $this->Director->primaryKey => $id));
				$row = $this->Director->find('first', $options);

				$this->Util->replaceInSess('Singers', array('director_id' => $id, 'Director.name' => $row['Director']['name']));
				
				if($singers['method'] == 'add')
					$this->redirect(array('controller' => 'Singers', 'action' => 'add'));
				else
					$this->redirect(array('controller' => 'Singers', 'action' => 'edit/' . $singers['id']));
			}
		}	
	}		
}
