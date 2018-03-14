<?php
App::uses('AppController', 'Controller');
/**
 * Composers Controller
 *
 * @property Composer $Composer
 */
class ComposersController extends AppController {
	public $helpers = array('Icon', 'Sessionplus');	
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index1() {
		$this->Composer->recursive = 0;
		$this->set('composers', $this->paginate());
	}
    
	public function index() {	
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    if(isset($this->data['Composer']['name']) && $this->data['Composer']['name'])
		        $filters['name'] = $this->data['Composer']['name'];
			else
				$this->Session->write('ComposerSearch.name_value', null);
			
		    if(isset($this->data['Composer']['id']))
		        $filters['id'] = $this->data['Composer']['id'];
			else
				$this->Session->write('ComposerSearch.id_value', null);		        
				
			$this->Session->write('ComposerSearch.page_value', 1);
			
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
		
		//check filters on passedArgs
		$conditions = array();
		
		/* id */
		if(isset($this->passedArgs['id'])){
			if($this->passedArgs['id'] != '')  		
    			$conditions['Composer.id'] = $this->passedArgs['id'];
		} else {
			if($this->Session->check('ComposerSearch.id_value'))
				if($this->Session->check('ComposerSearch.id_value') != '')
					$conditions['Composer.id'] = $this->Session->read('ComposerSearch.id_value');
		}     

		/* name */
        if(array_key_exists('Composer.id', $conditions) == false) {
            if(isset($this->passedArgs['name']))
                $conditions['Composer.name'] = $this->passedArgs['name']; 
            else
                if($this->Session->check('ComposerSearch.name_value'))
                    $conditions['Composer.name'] = $this->Session->read('ComposerSearch.name_value');
        }
	
		/* page */
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else
			if($this->Session->check('ComposerSearch.page_value'))
				$curpage = $this->Session->read('ComposerSearch.page_value');
			else
				$curpage = 1;
				
		/* WRITE FORM VALUES TO SESSION */
		foreach($conditions As $k=>$v)
		{
			$this->Session->write(str_replace('Composer', 'ComposerSearch', $k) . '_value', $v);
		}
		
		if(array_key_exists('Composer.name', $conditions) == true) {
			$name = array_shift($conditions);
			$conditions['Composer.name LIKE'] = '%' . $name . '%';
		}
				
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('Nationality'),
			'fields' => array('Composer.id', 'Composer.name', 'Composer.alt_name', 'Composer.nationality_id', 'Composer.notes', 'Composer.dates', 'Nationality.nationality'),
			'order' => array ('Composer.name' => 'ASC', 'Composer.alt_name' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		
		if(array_key_exists('Composer.name LIKE', $conditions) == true) {
			$name = array_pop($conditions);
			$conditions['Composer.name'] = str_replace('%', '', $name);
		}			
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('ComposerSearch.page_value', $curpage);
		
		$composers = $this->paginate('Composer');

		$this->set(compact('composers', 'conditions'));
        
		$this->render('index');
	}

	public function select($id = null) {
		if ($id) $this->Util->replaceInSess('ComposerSearch', array('id_value' => $id));
		$this->redirect(array('action' => 'index'));
	}	
    
    public function reset() {
        if($this->Session->check('ComposerSearch.id_value'))
            $this->Session->delete('ComposerSearch.id_value');
        
        if($this->Session->check('ComposerSearch.name_value'))
            $this->Session->delete('ComposerSearch.name_value');
            
        $this->redirect(array('action' => 'index'));
     }
    

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Composer->exists($id)) {
			throw new NotFoundException(__('Invalid composer'));
		}
		$options = array('conditions' => array('Composer.' . $this->Composer->primaryKey => $id));
		$this->set('composer', $this->Composer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Composer->create();
			if ($this->Composer->save($this->request->data)) {
				$this->Session->setFlash(__('The composer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The composer could not be saved. Please, try again.'));
			}
		}
        
        $nationalities = $this->Composer->Nationality->find('list', array('order'=>array('nationality')));
		$this->set(compact('nationalities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Composer->exists($id)) {
			throw new NotFoundException(__('Invalid composer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Composer->save($this->request->data)) {
				$this->Session->setFlash(__('The composer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The composer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Composer.' . $this->Composer->primaryKey => $id));
			$this->request->data = $this->Composer->find('first', $options);
		}
        $nationalities = $this->Composer->Nationality->find('list', array('order'=>array('nationality')));
		$this->set(compact('nationalities'));
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
		$this->Composer->id = $id;
		if (!$this->Composer->exists()) {
			throw new NotFoundException(__('Invalid composer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Composer->delete()) {
			$this->Session->setFlash(__('Composer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Composer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/* SET THE SESSION FOR LINKING RECORDS */
	public function link_old($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);
			$this->Util->delFromSession('Composer', $id);
		} else {
			if (!$this->Composer->exists($id)) {
				throw new NotFoundException(__('Invalid director'));
			}	
			$options = array('conditions' => array('Composer.' . $this->Composer->primaryKey => $id));
			$row = $this->Composer->find('first', $options);
			$this->Util->addToSession('Composer', $id, $row['Composer']['name']);
		}
		$this->redirect(array('action' => 'index'));	
	}

	/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);
			$this->Session->setFlash(__('Composer #' . $id . ' was removed from memory!'));
			$this->Util->delFromSess('Songs', array('composer_id', 'Composer.name'));
			$this->Util->delFromSess('ComposerSearch', array('id_value'));			
			$this->redirect(array('action' => 'index'));
		} else {
			if (!$this->Composer->exists($id)) {
				throw new NotFoundException(__('Invalid composer'));
			}	
			
			if ($this->Session->check('Songs') === false) {
				$this->Session->setFlash(__('No active Composition-Composer session! Memory cleared!'));				
				$this->Util->delFromSess('Songs', array('composer_id', 'Composer.name'));
				$this->redirect(array('action' => 'index'));
			} else {
				$songs = $this->Session->read('Songs');

				print_r($songs);

				$options = array('conditions' => array('Composer.' . $this->Composer->primaryKey => $id));
				$row = $this->Composer->find('first', $options);

				$this->Util->replaceInSess('Songs', array('composer_id' => $id, 'Composer.name' => $row['Composer']['name']));
				
				if($songs['method'] == 'add')
					$this->redirect(array('controller' => 'Songs', 'action' => 'add'));
				else
					$this->redirect(array('controller' => 'Songs', 'action' => 'edit/' . $songs['id']));
			}
		}	
	}
}
