<?php
App::uses('AppController', 'Controller');
/**
 * Records Controller
 *
 * @property Record $Record
 */
class RecordsController extends AppController {
	public $helpers = array('Icon');
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index2() {
		$this->Record->recursive = 0;
		$this->set('records', $this->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		// load recording
		$this->loadModel('Recording');
		$options = array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id));
		$recording = $this->Recording->find('first', $options);
		
		$records = $this->Record->find('all', array(
				'conditions' => array('Record.recording_id' => $id),
				'order' => array('Record.id' => 'ASC'),
				'contain' => array(
					'Composition' => array(
						'fields' => array('id', 'title'),
					),
					'Reccomposer' => array(
						'Composer' => array(
							'fields' => array('id', 'name'),
						),
					),
					'Recchoir' => array(					
						'Choir' => array(
							'fields' => array('id', 'choir', 'city'),
							'State' => array( 'fields' => array('id')),
						),
					),
					'Recdirector' => array(					
						'Director' => array(
							'fields' => array('id', 'name'),
							'Position' => array( 'fields' => array( 'position'))
						)
					)
				)
				
			)
		);
		
		/*
		echo '<pre>';
		print_r($records);
		echo '</pre>';
		die;
		*/
		
		$add_title = '|' . $id;
		$edit_title = '';
		
		if ($this->Session->check('recs') != false) {
			$recs = $this->Session->read('recs');
		
			if( isset($recs['method']) && $recs['method'] == 'add' )
				$add_tile= $recs['Recording']['id'] . $add_title;
			
			if( isset($recs['method']) && $recs['method'] == 'edit' )
				if( isset($recs['Record']['id']) )
					$edit_title = $recs['Record']['id'];
		}

		$this->set(compact('recording', 'records', 'add_title', 'edit_title'));
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
		if (!$this->Record->exists($id)) {
			throw new NotFoundException(__('Invalid record'));
		}
		$options = array('conditions' => array('Record.' . $this->Record->primaryKey => $id));
		$this->set('record', $this->Record->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		// load recording
		$this->loadModel('Recording');
		$options = array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id));
		$recording = $this->Recording->find('first', $options);
	
		if ($this->request->is('post')) {
			
			$request = $this->request->data;
			
			foreach( $request as $model=>$data ) {
				if( substr($model,0,1) == 'x' ) {
					unset($request[$model]);
				} else {
					if( $model != 'Record') {
						$request['Rec' . strtolower($model)] = $request[$model];
						unset($request[$model]);
					}
				}
			}
			
			/*
			echo '<pre>';
			print_r($request);
			echo '</pre>';
			die;
			*/
			
			$this->Record->create();
			
			if ($this->Record->saveAll($request)) {
				$this->Session->setFlash(__('The record has been saved'));
				$this->Util->deleteSession();
				$this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));
			}
		}

		if( isset($id) && $id != '' ) {
			$recs = array();
			if ($this->Session->check('recs') === false ) {
				$recs = array( 
					'Recording' => array('id' => $id),
					'method' => 'add',
				);
				$this->Session->write('recs', $recs);			
			} else {
				$recs = $this->Session->read('recs');
				
				if( isset($recs['method']) && $recs['method']=='add') {
					if( $recs['Recording']['id'] != $id ) {
						$this->Session->setFlash(__('Warning! You have loaded into memory links for another recording (' . $recs['Recording']['id'] . ')'));
						$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
					}
				} else {
					$recs = array( 
						'Recording' => array('id' => $id),
						'method' => 'add',
					);
					$this->Session->write('recs', $recs);					
				}
			} 
		} else {
			$this->Session->setFlash(__('Warning! None of recordings was selected!'));
			$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
		}

		$this->set(compact('recording', 'recs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $mode = 'db') {
		if (!$this->Record->exists($id)) {
			throw new NotFoundException(__('Invalid record'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$request = $this->request->data;

			unset($request['Record']['x_composition_id']);
			
			foreach( $request as $model=>$data ) {
				if( substr($model,0,1) == 'x' ) {
					unset($request[$model]);
				} else {
					if( $model != 'Record') {
						$request['Rec' . strtolower($model)] = $request[$model];
						unset($request[$model]);
					}
				}
			}
			
			/* DELETE ZONE */
			$this->Record->Reccomposer->deleteAll(array('Reccomposer.record_id' => $id));
			$this->Record->Recchoir->deleteAll(array('Recchoir.record_id' => $id));
			$this->Record->Recdirector->deleteAll(array('Recdirector.record_id' => $id));
			
			/*
			echo '<pre>';
			print_r($request);
			echo '</pre>';
			//die;
			*/

			if ($this->Record->saveAll($request)) {
				$this->Session->setFlash(__('The record has been saved'));
				$this->Util->deleteSession();				
				$this->redirect(array('action' => 'index', $request['Record']['recording_id']));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));
			}
		} 				
		// RETRIEVE DATA FROM DB
		$recs_saved = $this->Record->find('first', array(
			'conditions' => array('Record.' . $this->Record->primaryKey => $id),
			'contain' => array(
				'Composition' => array(
					'fields' => array('id', 'title'),
				),
				'Reccomposer' => array(
					'Composer' => array(
						'fields' => array('id', 'name'),
					),
				),
				'Recchoir' => array(					
					'Choir' => array(
						'fields' => array('id', 'choir', 'city'),
						'State' => array( 'fields' => array('id')),
					),
				),
				'Recdirector' => array(					
					'Director' => array(
						'fields' => array('id', 'name'),
						'Position' => array( 'fields' => array( 'position'))
					)
				),
				'Recording' => array(
					'Format' => array('fields' => array( 'format' )),
					'Company' => array( 'fields' => array( 'company')),
					'Presentation' => array( 'fields' => array( 'presentation' )),
					'Ancillarymusic' => array( 'fields' => array( 'name' )),
					'Recordingnote' => array( 'fields' => array( 'recording_note' )),
				)
			)
		));
		
		// RECORDING ARRAY
		$recordings = $recs_saved['Recording'];
		$recording = array();
		foreach( $recordings as $key=>$value ) {
			if( is_array($value) ) 
				$recording[$key] = $value;
			else
				$recording['Recording'][$key] = $value;
		}
		
		if( $mode == 'db' ) {
			// CREATE ARRAY FOR LOADING INTO MEMORY
			$no = 0;
			$recs['Composition'][$no] = array(
				'id' => $recs_saved['Composition']['id'],
				'name' => $recs_saved['Composition']['title']
			);
			
			foreach( $recs_saved['Reccomposer']  as $composer ) {
				$recs['Composer'][$no] = array(
					'id' => $composer['Composer']['id'],
					'name' => $composer['Composer']['name']
				);
				$no++;
			}
			
			$no = 0;
			foreach( $recs_saved['Recdirector']  as $director ) {
				$display_director = $director['Director']['name'];
				$display_director.= ( $director['Director']['Position']['position'] != '' ? ' (' . $director['Director']['Position']['position'] . ')' : '');
				
				$recs['Director'][$no] = array(
					'id' => $director['Director']['id'],
					'name' => $display_director,
				);
				$no++;
			}

			$no = 0;
			foreach( $recs_saved['Recchoir']  as $choir ) {
				$display_name = $choir['Choir']['choir'] . ( !empty($choir['Choir']['city']) ? ', ' . $choir['Choir']['city'] : '');
				$display_name.= ( $choir['Choir']['State']['id'] != 'XX' ? ', ' . $choir['Choir']['State']['id'] : '');
				
				$recs['Choir'][$no] = array(
					'id' => $choir['Choir']['id'],
					'name' => $display_name, 
				);
				$no++;
			}
			
			$recs['Record']['id'] = $id;
			
			$recs['Recording'] = array(
					'id' => $recording['Recording']['id'],
			);
			
			$recs['method'] = 'edit';				
		
			// WRITE RECORD ARRAY INTO SESSION
			$this->Session->write('recs', $recs);
		} else if( $mode == 'session' ) {
			if ($this->Session->check('recs') === true ) {
				$recs = $this->Session->read('recs');
			} else {
				$this->Session->setFlash(__('Add record session instead? You were redirected to list!'));
				$this->redirect(array('action' => 'index', $recording['Recording']['id']));
			}
		} else {
			$this->Session->setFlash(__('Buggy data!? You were redirected to list!'));
			$this->redirect(array('action' => 'index', $recording['Recording']['id']));
		}
		
		/*		
		echo '<pre>';
		print_r($recs);
		echo '</pre>';
		die;
		*/
		
		$this->set(compact('recording', 'recs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $recording_id = null) {
		$this->Record->id = $id;
		if (!$this->Record->exists()) {
			throw new NotFoundException(__('Invalid record'));
		}
		$this->request->onlyAllow('post', 'delete');	
		
		echo $recording_id;
		
		if ($this->Record->delete()) {
			// DELETE ASSOCIATED TABLES
			$this->Record->Reccomposer->deleteAll(array('Reccomposer.record_id' => $id));
			$this->Record->Recchoir->deleteAll(array('Recchoir.record_id' => $id));
			$this->Record->Recdirector->deleteAll(array('Recdirector.record_id' => $id));
			
			$this->Session->setFlash(__('Record deleted'));
			$this->redirect(array('action' => 'index', $recording_id));
		}
		$this->Session->setFlash(__('Record was not deleted'));
		$this->redirect(array('action' => 'index', $recording_id));
	}
	
/**
 * compositions ajax method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */	
	public function composition() {
		$this->autoRender = false;
		
		$this->loadModel('Composition');
		
		$result = $this->Composition->find('all', 
			array(
				'conditions' => array(
					'title LIKE' => '%' . trim($this->request->query('term')) . '%'
				),
				'recursive' => 0,
				'fields' => array('Composition.id', 'Composition.title', 'Genre.genre', 'Version.version', 'Composition.opening_text'),
				'limit' => 8,
				'order' => array('title')
			)
		);
				
		return json_encode($result);
	}
	
	/**
	 * compositions ajax method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */	
	public function composer() {
		$this->autoRender = false;
		
		$this->loadModel('Composer');
		
		$result = $this->Composer->find('all', 
			array(
				'conditions' => array(
					'name LIKE' => '%' . trim($this->request->query('term')) . '%'
				),
				'recursive' => 0,
				'fields' => array('Composer.id', 'Composer.name', 'Nationality.nationality', 'Composer.dates'),
				'limit' => 10,
				'order' => array('name')
			)
		);
				
		return json_encode($result);
	}

	/**
	 * compositions ajax method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */	
	public function choir() {
		$this->autoRender = false;
		
		$this->loadModel('Choir');
		
		$result = $this->Choir->find('all', 
			array(
				'conditions' => array(
					'choir LIKE' => '%' . trim($this->request->query('term')) . '%'
				),
				'recursive' => 0,
				'fields' => array('Choir.id', 'Choir.choir', 'Choir.city', 'Choir.state_id', 'Country.country', 'Denomination.denomination'),
				'limit' => 8,
				'order' => array('choir')
			)
		);
				
		return json_encode($result);
	}

	/**
	 * compositions ajax method
	 *
	 * @throws NotFoundException
	 * @throws MethodNotAllowedException
	 * @param string $id
	 * @return void
	 */	
	public function director() {
		$this->autoRender = false;
		
		$this->loadModel('Director');
		
		$result = $this->Director->find('all', 
			array(
				'conditions' => array(
					'name LIKE' => '%' . trim($this->request->query('term')) . '%'
				),
				'recursive' => 0,
				'fields' => array('Director.id', 'Director.name', 'Position.position'),
				'limit' => 8,
				'order' => array('name')
			)
		);
				
		return json_encode($result);
	}
	
	public function current() {
		$recs = array();
		if ($this->Session->check('recs') != false)
			$recs = $this->Session->read('recs');
		
		if( !empty($recs) && isset($recs['Recording']['id']) )
			if( $recs['method'] == 'add' )
				$this->redirect(array('action' => 'add', $recs['Recording']['id']));
			else
				if( $recs['method'] == 'edit' )
					$this->redirect(array('action' => 'edit', $recs['Record']['id'], 'session'));
		else
			$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
	}
	
	public function check() {
		$recs = array();
		if ($this->Session->check('recs') != false)
			$recs = $this->Session->read('recs');
		
		if( !empty($recs) && isset($recs['Recording']['id']) )
			echo 'true';
		else
			echo 'false';
	}
	
	public function jump($source = null) {
		if( isset($source) ) {
			$this->redirect(array('controller' => $source, 'action' => 'index'));
		} else {
			$this->redirect(array('action' => 'index'));
		}
	}

	public function up($id = null) {
		echo '<pre>';
		print_r($this->Record->find('all', array('conditions' => array('Record.id' => $id))));
		echo '</pre>';
		die;
	}
	
	public function erase($id = null) {
		$this->Session->delete('recs');
		$this->redirect(array('action' => 'add', $id));
	}
	
	public function trash($model, $id) {
		$this->Util->delFromSession( $model, $id );
		
		$this->redirect(array('action' => 'current'));
	}
	
}
