<?php
App::uses('AppController', 'Controller');
/**
 * Singers Controller
 *
 * @property Singer $Singer
 */
class SingersController extends AppController {
	public $helpers = array('Icon');
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index2() {
		$this->Singer->recursive = 0;
		$this->set('singers', $this->paginate());
	}

	public function index() {
		
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    if( isset($this->data['Singer']['choir_id']) )
		        $filters['choir_id'] = $this->data['Singer']['choir_id'];
			else
				$this->Session->write('SingerSearch.choir_id', null);

		    if( isset($this->data['Singer']['director_id']) )
		        $filters['director_id'] = $this->data['Singer']['director_id'];
			else
				$this->Session->write('SingerSearch.director_id', null);			

		    if( isset($this->data['Singer']['Choir@choir']) )
		        $filters['Choir.choir'] = $this->data['Singer']['Choir@choir'];
			else
				$this->Session->write('SingerSearch.Choir.choir', null);
				
			if( isset($this->data['Singer']['Director@name']) )
		        $filters['Director.name'] = $this->data['Singer']['Director@name'];
			else
				$this->Session->write('SingerSearch.Director.name', null);		        
				
			$this->Session->write('SingerSearch.page_value', 1);
		
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
				
		//build conditions from passedArgs
		$conditions = array();
		
		// choir_id
		if( isset($this->passedArgs['choir_id']) && $this->passedArgs['choir_id'] != '' )
    		$conditions['choir_id'] = $this->passedArgs['choir_id'];
		else 
			if($this->Session->check('SingerSearch.choir_id') && $this->Session->check('SingerSearch.choir_id') != '' )
				$conditions['choir_id'] = $this->Session->read('SingerSearch.choir_id');

		// director_id
		if( isset($this->passedArgs['director_id']) && $this->passedArgs['director_id'] != '' )
    		$conditions['director_id'] = $this->passedArgs['director_id'];
		else
			if( $this->Session->check('SingerSearch.director_id') && $this->Session->check('SingerSearch.director_id') != '' )
				$conditions['director_id'] = $this->Session->read('SingerSearch.director_id');		     

		// Choir.choir
		if( isset($this->passedArgs['Choir.choir']) && $this->passedArgs['Choir.choir'] != '' )	
    		$conditions['Choir.choir'] = $this->passedArgs['Choir.choir'];
		else 
			if( $this->Session->check('SingerSearch.Choir.choir') && $this->Session->check('SingerSearch.Choir.choir') != '' )
				$conditions['Choir.choir'] = $this->Session->read('SingerSearch.Choir.choir');

		// Director.name
		if( isset($this->passedArgs['Director.name']) && $this->passedArgs['Director.name'] != '' )
    		$conditions['Director.name'] = $this->passedArgs['Director.name'];
		else 
			if( $this->Session->check('SingerSearch.Director.name') && $this->Session->check('SingerSearch.Director.name') != '' )
				$conditions['Director.name'] = $this->Session->read('SingerSearch.Director.name');	

		// Page
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else if($this->Session->check('SingerSearch.page_value'))
			$curpage = $this->Session->read('SingerSearch.page_value');
		else
			$curpage = 1;

		// WRITE FORM VALUES TO SESSION
		foreach($conditions As $k=>$v) { 
			$this->Session->write('SingerSearch.' . $k, $v);
		}

		$passed = $conditions;
		
		// OVERWRITE CONDITIONS WITH FOR LIKE OPERATOR
		if( array_key_exists('Choir.choir', $conditions) ) {
			$value = $conditions['Choir.choir'];
			unset($conditions['Choir.choir']);
			$conditions['Choir.choir LIKE'] = '%' . $value . '%';
		}
		
		if( array_key_exists('Director.name', $conditions) ) {
			$value = $conditions['Director.name'];
			unset($conditions['Director.name']);
			$conditions['Director.name LIKE'] = '%' . $value . '%';
		}
				
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('Choir', 'Director'),
			'fields' => array('Singer.id', 'Singer.choir_id', 'Singer.director_id', 'Choir.choir', 'Director.name'),
			'order' => array ('Singer.id' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		
		if(array_key_exists('Choir.choir LIKE', $conditions) == true) {
			$name = str_replace('%', '', $conditions['Choir.choir LIKE']);
			unset($conditions['Choir.choir LIKE']);
			$conditions['Choir.choir'] = str_replace('%', '', $name);
		}

		if(array_key_exists('Director.name LIKE', $conditions) == true) {
			$name = str_replace('%', '', $conditions['Director.name LIKE']);
			unset($conditions['Director.name LIKE']);
			$conditions['Director.name'] = str_replace('%', '', $name);
		}		
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('SingerSearch.page_value', $curpage);
		
		$singers = $this->paginate('Singer');
		$this->set(compact('singers', 'conditions'));
        
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
		if (!$this->Singer->exists($id)) {
			throw new NotFoundException(__('Invalid singer'));
		}
		$options = array('conditions' => array('Singer.' . $this->Singer->primaryKey => $id));
		$singer = $this->Singer->find('first', array(
			'conditions' => array('Singer.' . $this->Singer->primaryKey => $id),
			'contain' => array(
				'Choir' => array('fields' => array('id', 'choir', 'city', 'state_id')),
				'Director' => array(
						'Position' => array('fields' => array('position')),
						),
				),
			));

		$this->set(compact('singer'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$request = $this->request->data;

			foreach( $request as $elem=>$val ) {
				if( substr($elem,0,1) == 'x' )
					unset($elem);
			}

			$this->Singer->create();
			
			if ($this->Singer->save($request, array('validate' => true))) {
				$this->Session->setFlash(__('The record has been saved'));
				$this->Util->delSess('Singers');
				$this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));
			}
		}

		$singers = array();
		
		if ($this->Session->check('Singers') === false) {
			$singers = array(
				'method' => 'add',
			);
			$this->Session->write('Singers', $singers);
		} else {
			$singers = $this->Session->read('Singers');
		}

		$this->set(compact('singers'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Singer->exists($id)) {
			throw new NotFoundException(__('Invalid Choir-Director pair'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$request = $this->request->data;

			foreach( $request as $elem=>$val ) {
				if( substr($elem,0,1) == 'x' )
					unset($elem);
			}

			if ($this->Singer->save($request, array('validate' => true))) {
				$this->Session->setFlash(__('The Choir-Director pair has been saved'));
				$this->Util->delSess('Singers');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Choir-Director could not be saved. Please, try again.'));
			}
		} else {
			$singers_db = $this->Singer->find('first', array(
				'conditions' => array('Singer.' . $this->Singer->primaryKey => $id),
				'contain' => array(
					'Choir' => array('fields' => array('choir')),
					'Director' => array('fields' => array('name')),					
				)
			));

			// process array to match session
			$singers = array();

			foreach( $singers_db as $model=>$arr ) {
				foreach( $arr as $key=>$value ) {
					if( $model == 'Singer' ) {
						$singers[$key] = $value;
					} else {
						$singers[$model . '.' . $key] = $value;
					}
				}
			}

			// add session data to DB data
			if ($this->Session->check('Singers') === false) {
				$singers['method'] = 'edit';
				$singers['id'] = $id;
				$this->Session->write('Singers', $singers);
			} else {
				$singers_sess = $this->Session->read('Singers');
				if( $singers_sess['method'] != 'edit' ) {
					$this->Session->setFlash(__('Memory data was cleared (not set for EDIT action)'));
					$this->Util->delSess('Singers');
					$this->redirect(array('action' => 'index'));
				} else if( $singers_sess['id'] != $id ) {
					$this->Session->setFlash(__('Memory data was cleared (IDs not equal)'));
					$this->Util->delSess('Singers');
					$this->redirect(array('action' => 'index'));
				} else {
					$singers['method'] = 'edit';
					if( isset($singers_sess['choir_id']) )
						$singers['choir_id'] = $singers_sess['choir_id'];
					if( isset($singers_sess['director_id']) )
						$singers['director_id'] = $singers_sess['director_id'];
					if( isset($singers_sess['Choir.choir']) )
						$singers['Choir.choir'] = $singers_sess['Choir.choir'];
					if( isset($singers_sess['Director.name']) )
						$singers['Director.name'] = $singers_sess['Director.name'];
					$this->Util->delSess('Singers');
					$this->Session->write('Singers', $singers);
				}
			}

			$this->set(compact('singers'));
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
		$this->Singer->id = $id;
		if (!$this->Singer->exists()) {
			throw new NotFoundException(__('Invalid singer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Singer->delete()) {
			$this->Session->setFlash(__('Singer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Singer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function current() {
		if ($this->Session->check('Singers') === false) {
			$this->Session->setFlash(__('No active Choir-Director session in memory'));
			$this->redirect(array('action' => 'index'));
		} else {
			$singers = $this->Session->read('Singers');			
			if($singers['method'] == 'add')
				$this->redirect(array('controller' => 'Singers', 'action' => 'add'));
			else
				$this->redirect(array('controller' => 'Singers', 'action' => 'edit/' . $singers['id']));
		}
	}

	/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);

			if ($this->Session->check('links') === false) {
				$this->Session->setFlash(__('No active Choir-director session! Memory cleared'));
				$this->redirect(array('action' => 'index'));
			} else {
				$links = $this->Session->read('links');

				if( isset($links['Singers']) ) {
					foreach($links['Singers'] as $i=>$singer) {
						if( $singer['singer_id'] == $id ) {
							if( $singer['source'] == 'db' ) {
								$this->loadModel('Recsinger');
								$error = array();
								try {
									$this->Recsinger->delete($singer['id']);
								} catch(Exception $e) {
									$error[] = 'DELETE - Recsinger id: ' . $singer['id'] . '(' . $e . ')';
								}							

								if (count($error) != 0)
									$this->Session->setFlash(__('The record could not be deleted.' . $error[0]));
							}

							$this->Session->setFlash(__('The link (Choir-director pair #' . $id . ') was removed from database/memory'));
							$this->Util->delFromSessArr('Singers', 'singer_id', $id, 'links');
							$this->redirect(array('action' => 'index'));							
						}
					}
				}
			}
		} else {
			if (!$this->Singer->exists($id)) {
				throw new NotFoundException(__('Invalid Choir-director pair'));
			}	
			
			if ($this->Session->check('links') === false) {
				$this->Session->setFlash(__('No active Choir-director session. Memory cleared'));
				$this->redirect(array('action' => 'index'));
			} else {
				$links = $this->Session->read('links');

				$options = array(
					'conditions' => array('Singer.' . $this->Singer->primaryKey => $id),
					'fields' => array('Singer.id', 'Singer.choir_id', 'Singer.director_id', 'Choir.choir', 'Director.name'),
				);
				
				$row = $this->Singer->find('first', $options);

				$arr = array(
					'singer_id' => $row['Singer']['id'],
					'choir_id' => $row['Singer']['choir_id'],
					'director_id' => $row['Singer']['director_id'],
					'choir' => $row['Choir']['choir'],
					'director' => $row['Director']['name'],
					'source' => 'ses',
					'id' => 0
				);			

				$this->Util->addToSessArr('Singers', $arr, 'links');
				$this->redirect(array('action' => 'index'));
			}
		}	
	}	
    
    public function reset() {
        if($this->Session->check('SingerSearch.choir_id'))
            $this->Session->delete('SingerSearch.choir_id');
        
        if($this->Session->check('SingerSearch.director_id'))
            $this->Session->delete('SingerSearch.director_id');
        
        if($this->Session->check('SingerSearch.Choir.choir'))
            $this->Session->delete('SingerSearch.Choir.choir');        
            
        if($this->Session->check('SingerSearch.Director.name'))
            $this->Session->delete('SingerSearch.Director.name'); 

        $this->redirect(array('action' => 'index'));
     }	    
}
