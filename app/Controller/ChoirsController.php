<?php
App::uses('AppController', 'Controller');
/**
 * Choirs Controller
 *
 * @property Choir $Choir
 */
class ChoirsController extends AppController {
	public $helpers = array('Icon', 'Sessionplus');	
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index_old() {
		$this->Choir->recursive = 0;
		$this->set('choirs', $this->paginate());
	}
	
	public function index() {
    
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    if(isset($this->data['Choir']['choir']) && $this->data['Choir']['choir'])
		        $filters['choir'] = $this->data['Choir']['choir'];
			else
				$this->Session->write('ChoirSearch.choir_value', null);
				
			if(isset($this->data['Choir']['city']) && $this->data['Choir']['city'])
		        $filters['city'] = $this->data['Choir']['city'];
			else
				$this->Session->write('ChoirSearch.city_value', null);
			
		    if(isset($this->data['Choir']['id']))
		        $filters['id'] = $this->data['Choir']['id'];
			else
				$this->Session->write('ChoirSearch.id_value', null);		        
				
			$this->Session->write('ChoirSearch.page_value', 1);
			
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
		
		//check filters on passedArgs
		$conditions = array();
		
		/* id */
		if(isset($this->passedArgs['id'])){
			if($this->passedArgs['id'] != '')  		
    			$conditions['Choir.id'] = $this->passedArgs['id'];
		} else {
			if($this->Session->check('ChoirSearch.id_value'))
				if($this->Session->check('ChoirSearch.id_value') != '')
					$conditions['Choir.id'] = $this->Session->read('ChoirSearch.id_value');
		}     

		/* choir */
        if(array_key_exists('Choir.id', $conditions) == false) {
            if(isset($this->passedArgs['choir']))
                $conditions['Choir.choir'] = $this->passedArgs['choir']; 
            else
                if($this->Session->check('ChoirSearch.choir_value'))
                    $conditions['Choir.choir'] = $this->Session->read('ChoirSearch.choir_value');
        }
		
		/* city */
        if(array_key_exists('Choir.id', $conditions) == false) {
            if(isset($this->passedArgs['city']))
                $conditions['Choir.city'] = $this->passedArgs['city']; 
            else
                if($this->Session->check('ChoirSearch.city_value'))
                    $conditions['Choir.city'] = $this->Session->read('ChoirSearch.city_value');
        }		
	
		/* page */
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else
			if($this->Session->check('ChoirSearch.page_value'))
				$curpage = $this->Session->read('ChoirSearch.page_value');
			else
				$curpage = 1;
					
		/* WRITE FORM VALUES TO SESSION */
		foreach($conditions As $k=>$v)
		{
			$this->Session->write(str_replace('Choir', 'ChoirSearch', $k) . '_value', $v);
		}
		
		if(array_key_exists('Choir.choir', $conditions) == true) {
			$name = array_shift($conditions);
			$conditions['Choir.choir LIKE'] = '%' . $name . '%';
		}
		
		if(array_key_exists('Choir.city', $conditions) == true) {
			$city = array_shift($conditions);
			$conditions['Choir.city LIKE'] = '%' . $city . '%';
		}
				
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('State', 'Country', 'Denomination', 'Vocalformat'),
			'fields' => array('Choir.id', 'Choir.choir', 'Choir.alt_name', 'Choir.state_id', 'Choir.notes', 'Choir.city', 'Choir.country_id', 'Choir.denomination_id', 'Choir.vocalformat_id', 'State.state', 'Country.country', 'Denomination.denomination', 'Vocalformat.vocalformat'),
			'order' => array ('Choir.choir' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		
		if(array_key_exists('Choir.choir LIKE', $conditions) == true) {
			$name = array_pop($conditions);
			$conditions['Choir.choir'] = str_replace('%', '', $name);
		}

		if(array_key_exists('Choir.city LIKE', $conditions) == true) {
			$city = array_pop($conditions);
			$conditions['Choir.city'] = str_replace('%', '', $city);
		}
		
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('ChoirSearch.page_value', $curpage);
		
		$choirs = $this->paginate('Choir');

		$this->set(compact('choirs', 'conditions'));
        
		$this->render('index');
	}
    
    public function reset() {
        if($this->Session->check('ChoirSearch.id_value'))
            $this->Session->delete('ChoirSearch.id_value');
        
        if($this->Session->check('ChoirSearch.choir_value'))
            $this->Session->delete('ChoirSearch.choir_value');
            
        if($this->Session->check('ChoirSearch.city_value'))
            $this->Session->delete('ChoirSearch.city_value');

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
		if (!$this->Choir->exists($id)) {
			throw new NotFoundException(__('Invalid choir'));
		}
		$options = array('conditions' => array('Choir.' . $this->Choir->primaryKey => $id));
		$this->set('choir', $this->Choir->find('first', $options));
	}

	public function select($id = null) {
		if ($id) $this->Util->replaceInSess('ChoirSearch', array('id_value' => $id));
		$this->redirect(array('action' => 'index'));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Choir->create();
			if ($this->Choir->save($this->request->data)) {
				$this->Session->setFlash(__('The choir has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choir could not be saved. Please, try again.'));
			}
		}
		$states = $this->Choir->State->find('list', array('order' => array('state' => 'asc')));
		$countries = $this->Choir->Country->find('list', array('order' => array('country' => 'asc')));
		$denominations = $this->Choir->Denomination->find('list', array('order' => array('denomination' => 'asc')));
		$vocalformats = $this->Choir->Vocalformat->find('list', array('order' => array('vocalformat' => 'asc')));
		$this->set(compact('states', 'countries', 'denominations', 'vocalformats'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Choir->exists($id)) {
			throw new NotFoundException(__('Invalid choir'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Choir->save($this->request->data)) {
				$this->Session->setFlash(__('The choir has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choir could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Choir.' . $this->Choir->primaryKey => $id));
			$this->request->data = $this->Choir->find('first', $options);
		}
		$states = $this->Choir->State->find('list', array('order' => array('state' => 'asc')));
		$countries = $this->Choir->Country->find('list', array('order' => array('country' => 'asc')));
		$denominations = $this->Choir->Denomination->find('list', array('order' => array('denomination' => 'asc')));
		$vocalformats = $this->Choir->Vocalformat->find('list', array('order' => array('vocalformat' => 'asc')));
		$this->set(compact('states', 'countries', 'denominations', 'vocalformats'));
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
		$this->Choir->id = $id;
		if (!$this->Choir->exists()) {
			throw new NotFoundException(__('Invalid choir'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Choir->delete()) {
			$this->Session->setFlash(__('Choir deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Choir was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);
			$this->Session->setFlash(__('Choir #' . $id . ' was removed from memory!'));
			$this->Util->delFromSess('Singers', array('choir_id', 'Choir.choir'));
			$this->Util->delFromSess('ChoirSearch', array('id_value'));			
			$this->redirect(array('action' => 'index'));
		} else {
			if (!$this->Choir->exists($id)) {
				throw new NotFoundException(__('Invalid choir'));
			}	
			
			if ($this->Session->check('Singers') === false) {
				$this->Session->setFlash(__('No active Choir-Director session! Memory cleared!'));				
				$this->Util->delFromSess('Singers', array('choir_id', 'Choir.choir'));
				$this->redirect(array('action' => 'index'));
			} else {
				$singers = $this->Session->read('Singers');

				$options = array('conditions' => array('Choir.' . $this->Choir->primaryKey => $id));
				$row = $this->Choir->find('first', $options);

				$this->Util->replaceInSess('Singers', array('choir_id' => $id, 'Choir.choir' => $row['Choir']['choir']));
				
				if($singers['method'] == 'add')
					$this->redirect(array('controller' => 'Singers', 'action' => 'add'));
				else
					$this->redirect(array('controller' => 'Singers', 'action' => 'edit/' . $singers['id']));
			}
		}	
	}	
}
