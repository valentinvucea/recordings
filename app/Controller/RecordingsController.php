<?php
App::uses('AppController', 'Controller');
/**
 * Recordings Controller
 *
 * @property Recording $Recording
 */
class RecordingsController extends AppController {
	public $components = array('Util', 'Paginator');
/**
 * index method
 *
 * @return void
 */
	public function index1() {
		$this->Recording->recursive = 0;
		$this->set('recordings', $this->paginate());
	}
	
	public function index(){
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    if(isset($this->data['Recording']['name']) && $this->data['Recording']['name'])
		        $filters['name'] = $this->data['Recording']['name'];
			else
				$this->Session->write('RecordingSearch.name_value', null);
				
			if(isset($this->data['Recording']['format_id']) && $this->data['Recording']['format_id'])
		        $filters['format_id'] = $this->data['Recording']['format_id'];
			else
				$this->Session->write('RecordingSearch.format_id_value', null);
			
		    if(isset($this->data['Recording']['no']))
		        $filters['no'] = $this->data['Recording']['no'];
			else
				$this->Session->write('RecordingSearch.no_value', null);		        
				
			$this->Session->write('RecordingSearch.page_value', 1);
		
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
				
		//check filters on passedArgs
		$conditions = array();
		
		/* id */
		if(isset($this->passedArgs['no'])){
			if($this->passedArgs['no'] != '')  		
    			$conditions['Recording.no'] = $this->passedArgs['no'];
		} else {
			if($this->Session->check('RecordingSearch.no_value'))
				if($this->Session->check('RecordingSearch.no_value') != '')
					$conditions['Recording.no'] = $this->Session->read('RecordingSearch.no_value');
		}     

		/* name */
        if(array_key_exists('Recording.no', $conditions) == false) {
            if(isset($this->passedArgs['name']))
                $conditions['Recording.name'] = $this->passedArgs['name']; 
            else
                if($this->Session->check('RecordingSearch.name_value'))
                    $conditions['Recording.name'] = $this->Session->read('RecordingSearch.name_value');
        }
		
		/* company */
        if(array_key_exists('Recording.no', $conditions) == false) {
            if(isset($this->passedArgs['format_id']))
                $conditions['Recording.format_id'] = $this->passedArgs['format_id']; 
            else
                if($this->Session->check('RecordingSearch.format_id_value'))
                    $conditions['Recording.format_id'] = $this->Session->read('RecordingSearch.format_id_value');
        }

		/* page */
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else
			if($this->Session->check('RecordingSearch.page_value'))
				$curpage = $this->Session->read('RecordingSearch.page_value');
			else
				$curpage = 1;
				
		/* WRITE FORM VALUES TO SESSION */
		foreach($conditions As $k=>$v)
		{
			$this->Session->write(str_replace('Recording', 'RecordingSearch', $k) . '_value', $v);
		}
		
		if(array_key_exists('Recording.name', $conditions) == true) {
			$name = array_shift($conditions);
			$conditions['Recording.name LIKE'] = '%' . $name . '%';
		}
				
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('Format', 'Presentation', 'Comprecordingnote', 'Company', 'Ancillarymusic'),
			'fields' => array('Recording.id', 'Recording.no', 'Recording.name', 'Recording.company_id', 'Recording.catalog', 'Recording.notes', 'Company.company', 'Recording.format_id', 'Format.format', 'Recording.comprecordingnote_id', 'Comprecordingnote.note', 'Recording.presentation_id', 'Presentation.presentation', 'Recording.ancillarymusic_id', 'Ancillarymusic.name', 'Recording.no', 'Recording.notes', 'Recording.recsong_count', 'Recording.recsinger_count'),
			'order' => array ('Recording.no' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		
		if(array_key_exists('Recording.name LIKE', $conditions) == true) {
			$name = str_replace('%', '', $conditions['Recording.name LIKE']);
			unset($conditions['Recording.name LIKE']);
			$conditions['Recording.name'] = str_replace('%', '', $name);
		}
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('RecordingSearch.page_value', $curpage);
		
		$recordings = $this->paginate('Recording');

		$formats = $this->Recording->Format->find('list');
		$this->set(compact('recordings', 'conditions', 'formats'));
        
		$this->render('index');
	}
    
    public function reset() {
        if($this->Session->check('RecordingSearch.no_value'))
            $this->Session->delete('RecordingSearch.no_value');
        
        if($this->Session->check('RecordingSearch.name_value'))
            $this->Session->delete('RecordingSearch.name_value');
            
        if($this->Session->check('RecordingSearch.format_id_value'))
            $this->Session->delete('RecordingSearch.format_id_value');

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
		if (!$this->Recording->exists($id)) {
			throw new NotFoundException(__('Invalid recording'));
		}
		/*
		$options = array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id));
		$this->set('recording', $this->Recording->find('first', $options));
		*/
		$options = array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id));
		$recording = $this->Recording->find('first', $options);		

		$recsongs = $this->Recording->Recsong->find('all', array(
		    'conditions' => array('recording_id' => $id),
		    'contain' => array(
		        'Song' => array(
		            'Composition' => array(
		            	'fields' => array('id', 'title'),
		            	'Genre' => array(
		            		'fields' => array('id', 'genre')
		            	)
		            ),
		            'Composer' => array(
		            	'fields' => array('id', 'name')
		            )
		        ),
		    ),
		));

		$recsingers = $this->Recording->Recsinger->find('all', array(
		    'conditions' => array('recording_id' => $id),
		    'contain' => array(
		        'Singer' => array(
		            'Choir' => array(
		            	'fields' => array('id', 'choir')
		            ),
		            'Director' => array(
		            	'fields' => array('id', 'name')
		            )
		        ),
		    ),
		));

		$this->set(compact('recording', 'recsongs', 'recsingers'));
	}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recording->create();
			if ($this->Recording->save($this->request->data)) {
				$this->Session->setFlash(__('The recording has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording could not be saved. Please, try again.'));
			}
		}
		$formats = $this->Recording->Format->find('list');
		$companies = $this->Recording->Company->find('list', array('order' => array('company' => 'asc')));
		$comprecordingnotes = $this->Recording->Comprecordingnote->find('list', array('order' => array('note' => 'asc')));
		$ancillarymusics = $this->Recording->Ancillarymusic->find('list', array('order' => array('name' => 'asc')));
		$presentations = $this->Recording->Presentation->find('list', array('order' => array('presentation' => 'asc')));
		$this->set(compact('formats', 'companies', 'comprecordingnotes', 'ancillarymusics', 'presentations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Recording->exists($id)) {
			throw new NotFoundException(__('Invalid recording'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recording->save($this->request->data)) {
				$this->Session->setFlash(__('The recording has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recording could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id));
			$this->request->data = $this->Recording->find('first', $options);
		}
		$formats = $this->Recording->Format->find('list', array('order' => array('format' => 'asc')));
		$companies = $this->Recording->Company->find('list', array('order' => array('company' => 'asc')));
		$comprecordingnotes = $this->Recording->Comprecordingnote->find('list', array('order' => array('note' => 'asc')));
		$ancillarymusics = $this->Recording->Ancillarymusic->find('list', array('order' => array('name' => 'asc')));
		$presentations = $this->Recording->Presentation->find('list', array('order' => array('presentation' => 'asc')));
		$this->set(compact('formats', 'companies', 'comprecordingnotes', 'ancillarymusics', 'presentations'));
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
		$this->Recording->id = $id;
		if (!$this->Recording->exists()) {
			throw new NotFoundException(__('Invalid recording'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Recording->delete()) {
			$this->Session->setFlash(__('Recording deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recording was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	/** reset session method **/
	public function reset_session() {
		$this->Util->delSession('links');
		$this->Session->setFlash(__('Memory was reset!'));
		$this->redirect(array('action' => 'index'));
	}

	/** current method **/
	public function current() {
		if ($this->Session->check('links') === false ) {
			$this->redirect(array('action' => 'index'));
		} else {
			$links = $this->Session->read('links');
			if( !isset($links['Recording']['id']) ) {
				$this->redirect(array('action' => 'index'));
			} else {
				if( isset($links['method']) && $links['method']=='add' ) {
					$this->redirect(array('action' => 'linkadd/' . $links['Recording']['id']));
				} else {
					$this->redirect(array('action' => 'linkedit/' . $links['Recording']['id']));
				}
			}
		}
	}

	/** linkdel method **/
	public function linkdel($ids=null) {
		// THROW ERROR IF ID NOT EXISTS
		if ($ids == null) {
			throw new NotFoundException(__('No category or row sent'));
		}

		if ($this->Session->check('links') === false ) {
			$this->Session->setFlash(__('No active Links session!'));
			$this->redirect(array('action' => 'index'));
		} else {
			$urls = explode('-', $ids);

			$links = $this->Session->read('links');
			if( !isset($links['Recording']['id']) ) {
				$this->Session->setFlash(__('No RecordingID set for this Link session.'));
				$this->redirect(array('action' => 'index'));
			} else {
				if( $links[$urls[0]][$urls[1]]['source'] == 'db' ) {
					$error = array();

					switch($urls[0]) {
						case 'Songs':
							$this->loadModel('Recsong');
							$song = $links[$urls[0]][$urls[1]];

							try {
								$this->Recsong->delete($song['id']);
							} catch(Exception $e) {
								$error[] = 'DELETE - Recsong id: ' . $song['id'] . '(' . $e . ')';
							}
							break;
						case 'Singers':
							$this->loadModel('Recsinger');
							$singer = $links[$urls[0]][$urls[1]];
							try {
								$this->Recsinger->delete($singer['id']);
							} catch(Exception $e) {
								$error[] = 'DELETE - Recsinger id: ' . $singer['id'] . '(' . $e . ')';
							}
							break;
					}

					if (count($error) != 0)
						$this->Session->setFlash(__('The record could not be deleted.' . $error[0]));
				}

				$this->Session->setFlash(__('The link was deleted from database/memory'));
				$this->Util->delRowFromSessArr($urls[0], $urls[1], 'links');
				$this->redirect(array('action' => 'current'));				
			}
		}
	}	

/**
 * linkadd method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function linkadd($id = null) {
		// THROW ERROR IF ID NOT EXISTS
		if (!$this->Recording->exists($id)) {
			throw new NotFoundException(__('Invalid recording'));
		}

		/*
		echo '<pre>';
		print_r($this->request->data);
		echo '</pre>';
		*/
		
		// POST PROCESSING
		if ($this->request->is('post')) {	
			$postData = $this->request->data;
			$errors = array();

			if( isset($postData['Recsong']) && is_array($postData['Recsong']) ) {
				$this->loadModel('Recsong');

				foreach($postData['Recsong'] as $postsong) {
					$this->Recsong->create();
					try {
						$this->Recsong->save(array('recording_id' => $postData['Recording']['recording_id'], 'song_id' => $postsong['song_id']), array('validate' => true));
					} catch(Exception $e) {
						$error[] = 'Song_id: ' . $postsong['song_id'] . '(' . $e . ')';
					}
				}
			}

			if( isset($postData['Recsinger']) && is_array($postData['Recsinger']) ) {
				$this->loadModel('Recsinger');

				foreach($postData['Recsinger'] as $postsinger) {
					$this->Recsinger->create();
					try {
						$this->Recsinger->save(array('recording_id' => $postData['Recording']['recording_id'], 'singer_id' => $postsinger['singer_id']));
					} catch(Exception $e) {
						$error[] = 'Singer_id: ' . $postsinger['singer_id'] . '(' . $e . ')';
					}
				}
			}			
		
			if (count($errors) == 0) {
				$this->Session->setFlash(__('The records were saved'));
				$this->Util->delSession('links');
				$this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));

				echo '<pre>';
				var_dump($errors);
				echo '</pre>';
				die;
			}
		}

		// LOAD DATA FOR VIEW
		if( isset($id) && $id != '' ) {
			// GET DATA FROM SESSION
			if ($this->Session->check('links') === false ) {
				$links = array( 
					'Recording' => array('id' => $id),
					'method' => 'add',
				);
				$this->Session->write('links', $links);			
			} else {
				$links = $this->Session->read('links');
				
				if( isset($links['method']) && $links['method']=='add') {
					if( $links['Recording']['id'] != $id ) {
						$this->Session->setFlash(__('Warning! You have loaded into memory links for another recording (' . $links['Recording']['id'] . ') - <a href="Recordings/reset_session">Reset</a>'));
						$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
					}
				} else {
					$links = array( 
						'Recording' => array('id' => $id),
						'method' => 'add',
					);
					$this->Session->write('links', $links);					
				}
			} 
		} else {
			$this->Session->setFlash(__('Warning! None of recordings was selected.'));
			$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
		}

		$options = array(
			'conditions' => array(
			'Recording.' . $this->Recording->primaryKey => $id)
		);
		$recording = $this->Recording->find('first', $options);

		$this->set(compact('recording', 'links'));
	}

/**
 * linkedit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function linkedit($id=null) {
		// THROW ERROR IF ID NOT EXISTS
		if (!$this->Recording->exists($id)) {
			throw new NotFoundException(__('Invalid recording'));
		}

		// PROCESS RELATED DATA FROM DATABASE
		$recsongs_raw = $this->Recording->Recsong->find('all', array(
	    	'conditions' => array('Recsong.recording_id' => $id),
	    	'contain' => array(
	        	'Song' => array(
                    'Composer' => array(
                        'fields' => array('id', 'name'),
                    ),
	        	    'Composition' => array(
	            		'fields' => array('id', 'title'),
	            		'Genre' => array('fields' => array('id', 'genre'))
	            	),
	        	),
	    	)
		));

		$recsongs = array();
		$song_list = array();
		$songs_id_list = array();
		foreach($recsongs_raw as $song) {
			$recsongs[] = array(
				'song_id' => $song['Song']['id'],
				'composition_id' => $song['Song']['composition_id'],
				'composer_id' => $song['Song']['composer_id'],
				'composition' => $song['Song']['Composition']['title'],
				'composer' => $song['Song']['Composer']['name'],
				'genre_id' => $song['Song']['Composition']['Genre']['id'],
				'genre' => $song['Song']['Composition']['Genre']['genre'],
				'source' => 'db',
				'id' => $song['Recsong']['id']
			);
			$song_list[] = $song['Song']['id'];
			$songs_id_list[] = $song['Recsong']['id'];
		}

		/* sort array by composer and composition */
        usort($recsongs, function($a, $b) {
            $rdiff = strcasecmp($a['composer'],$b['composer']);
            if ($rdiff < 0) return $rdiff;
            if ($rdiff == 0) {
                $ldiff = strcasecmp($a['composition'],$b['composition']);
                if ($ldiff < 0) return $ldiff;
                if ($ldiff > 0) return 1;
            }
            return 1;
        });

		$recsingers_raw = $this->Recording->Recsinger->find('all', array(
		    'conditions' => array('recording_id' => $id),
		    'contain' => array(
		        'Singer' => array(
		            'Choir' => array(
		            	'fields' => array('id', 'choir', 'city')
		            ),
		            'Director' => array(
		            	'fields' => array('id', 'name')
		            )
		        ),
		    ),
		));

		$recsingers = array();
		$singer_list[] = array();
		$singers_id_list = array();
		foreach($recsingers_raw as $singer) {
			$recsingers[] = array(
				'singer_id' => $singer['Singer']['id'],
				'choir_id' => $singer['Singer']['choir_id'],
				'director_id' => $singer['Singer']['director_id'],
				'choir' => $singer['Singer']['Choir']['choir'],
				'director' => $singer['Singer']['Director']['name'],
				'city' => $singer['Singer']['Choir']['city'],
				'source' => 'db',
				'id' => $singer['Recsinger']['id']
			);
			$singer_list[] = $singer['Singer']['id'];
			$singers_id_list[] = $singer['Recsinger']['id'];
		}

        /* sort array by choir and director */
        usort($recsingers, function($a, $b) {
            $rdiff = strcasecmp($a['choir'],$b['choir']);
            if ($rdiff < 0) return $rdiff;
            if ($rdiff == 0) {
                $ldiff = strcasecmp($a['director'],$b['director']);
                if ($ldiff < 0) return $ldiff;
                if ($ldiff > 0) return 1;
            }
            return 1;
        });


		// POST PROCESSING
		if ($this->request->is('post')) {	
			$postData = $this->request->data;
			$errors = array();

			if( isset($postData['Recsong']) && is_array($postData['Recsong']) ) {
				$this->loadModel('Recsong');

				foreach($postData['Recsong'] as $postsong) {
					// INSERTS
					if( $postsong['id'] == 0 ) {
						$this->Recsong->create();	
						try {
							$this->Recsong->save(array('recording_id' => $postData['Recording']['recording_id'], 'song_id' => $postsong['song_id']));
						} catch(Exception $e) {
							$error[] = 'INSERT - Song_id: ' . $postsong['song_id'] . '(' . $e . ')';
						}
					// EDITS
					} else {
						try {
							$this->Recsong->save(array('id' => $postsong['id'], 'recording_id' => $postData['Recording']['recording_id'], 'song_id' => $postsong['song_id']));
							if(($x = array_search($postsong['id'], $songs_id_list)) !== false) {
    							unset($songs_id_list[$x]);
							}
						} catch(Exception $e) {
							$error[] = 'EDIT - Song_id: ' . $postsong['song_id'] . '(' . $e . ')';
						}
					}
				}

				// DELETES
				foreach($songs_id_list as $dsong) {
					try {
						$this->Recsong->delete($dsong);
					} catch(Exception $e) {
						$error[] = 'DELETE - Recsong id: ' . $dsong . '(' . $e . ')';
					}
				}
			}

			if( isset($postData['Recsinger']) && is_array($postData['Recsinger']) ) {
				$this->loadModel('Recsinger');

				foreach($postData['Recsinger'] as $postsinger) {
					// INSERTS
					if( $postsinger['id'] == 0 ) {
						$this->Recsinger->create();	
						try {
							$this->Recsinger->save(array('recording_id' => $postData['Recording']['recording_id'], 'singer_id' => $postsinger['singer_id']));
						} catch(Exception $e) {
							$error[] = 'INSERT - singer_id: ' . $postsinger['singer_id'] . '(' . $e . ')';
						}
					// EDITS
					} else {
						try {
							$this->Recsinger->save(array('id' => $postsinger['id'], 'recording_id' => $postData['Recording']['recording_id'], 'singer_id' => $postsinger['singer_id']));
							if(($x = array_search($postsinger['id'], $singers_id_list)) !== false) {
    							unset($singers_id_list[$x]);
							}
						} catch(Exception $e) {
							$error[] = 'EDIT - singer_id: ' . $postsinger['singer_id'] . '(' . $e . ')';
						}
					}
				}

				// DELETES
				foreach($singers_id_list as $dsinger) {
					try {
						$this->Recsinger->delete($dsinger);
					} catch(Exception $e) {
						$error[] = 'DELETE - Recsinger id: ' . $dsinger . '(' . $e . ')';
					}
				}
			}			
		
			if (count($errors) == 0) {
				$this->Session->setFlash(__('The records were saved'));
				$this->Util->delSession('links');
				$this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));

				echo '<pre>';
				var_dump($errors);
				echo '</pre>';
				die;
			}
		}

		// LOAD DATA FOR VIEW
		if( isset($id) && $id != '' ) {
			// GET DATA FROM DB
			$recording = $this->Recording->find('first', array('conditions' => array('Recording.' . $this->Recording->primaryKey => $id)));
		
			// REDIRECT TO LINKADD IF EMPTY SONGS & SINGERS
			if( count($recsongs)==0 && count($recsingers)==0 ) {
				$this->redirect(array('controller' => 'Recordings', 'action' => 'linkadd/' . $id));
			}

			// SESSION
			if ($this->Session->check('links') === false ) {
				$links = array( 
					'Recording' => array('id' => $id),
					'method' => 'edit',
				);
			} else {
				$links = $this->Session->read('links');
		
				if( $links['Recording']['id'] != $id ) {
					$this->Util->delSession('links');
					$this->Session->setFlash(__('Memory was reset!'));
					$links = array( 
						'Recording' => array('id' => $id),
						'method' => 'edit',
					);
				} else {
					if( isset($links['method']) && $links['method'] !='edit' ) {
						$this->Session->setFlash(__('Memory set for adding. Memory was erased.'));
						$this->Util->delSession('links');
						$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
					}
				}
			}

			// ADD SESSION TO DB
			if( isset($links['Songs']) ) {
				foreach($links['Songs'] as $lsong) {
					if( !in_array($lsong['song_id'], $song_list) ) {
						$recsongs[] = $lsong;
					} else {
						if( $lsong['source'] == 'del' ) {
							$k = array_search($lsong['song_id'], $song_list);
							unset($recsongs[$k]);
						}
					}	
				}
			}
			$links['Songs'] = array_values($recsongs);		

			if( isset($links['Singers']) ) {
				foreach($links['Singers'] as $lsinger) {
					if( !in_array($lsinger['singer_id'], $singer_list) ) {
						$recsingers[] = $lsinger;
					} else {
						if ( $lsinger['source'] == 'del' ) {
							$key = array_search($lsinger['singer_id'], $singer_list);
							unset($recsingers[$key]);
						}
					}
				}
			}
			$links['Singers'] = array_values($recsingers);		

			$this->Session->write('links', $links);					

		} else {
			$this->Session->setFlash(__('Warning! No recording selected.'));
			$this->redirect(array('controller' => 'Recordings', 'action' => 'index'));
		}

		$this->set(compact('recording', 'links'));
	}

    /**
     * Home page search method
     */
    public function search()
    {
        $emptySearch = 'Empty search...';
        $searchData  = [];

        $mapping = array(
            1 => array(
                'table' => 'choirs',
                'field' => 'choir'
            ),
            2 => array(
                'table' => 'composers',
                'field' => 'name'
            ),
            3 => array(
                'table' => 'compositions',
                'field' => 'title'
            ),
            4 => array(
                'table' => 'directors',
                'field' => 'name'
            ),
            5 => array(
                'table' => 'recordings',
                'field' => 'name'
            ),
        );

        if ($this->request && $this->request->is('post')) {
            $searchData = $this->request->data;

            $this->Session->write('searchData', $searchData);
        } else if ($this->Session->check('searchData') !== false) {
            $searchData = $this->Session->read('searchData');
        }

        if (false === isset($searchData['row'][0])) {
            $searchData['row'][0] = array(
                'searchTable' => 5,
                'searchTerm'  => $emptySearch,
            );
        }

        $selectSQL = 'SELECT DISTINCT recordings.id FROM recordings 
                          INNER JOIN recsongs ON recsongs.recording_id = recordings.id 
                          INNER JOIN recsingers ON recsingers.recording_id = recordings.id
                          INNER JOIN songs ON songs.id = recsongs.id 
                          INNER JOIN singers ON singers.id = recsingers.id 
                          INNER JOIN compositions ON compositions.id = songs.composition_id 
                          INNER JOIN composers ON composers.id = songs.composer_id 
                          INNER JOIN choirs ON choirs.id = singers.choir_id 
                          INNER JOIN directors ON directors.id = singers.director_id 
                          %s %s 
                          ORDER BY recordings.no
        ';

        /** Search criteria */
        $where = '';

        foreach ($searchData['row'] as $post) {
            $condition = [];
            $operator  = '';

            if (0 === (int) $post['searchTable']) {
                foreach ($mapping as $table) {
                    $condition[] = sprintf(
                        '%s.%s LIKE \'#%s#\'',
                        $table['table'],
                        $table['field'],
                        $post['searchTerm']
                    );
                }
            } else {
                $condition[] = sprintf(
                    '%s.%s LIKE \'#%s#\'',
                    $mapping[$post['searchTable']]['table'],
                    $mapping[$post['searchTable']]['field'],
                    $post['searchTerm']
                );
            }

            if (isset($post['searchOperator'])) {
                $operator = ' ' . $post['searchOperator'] . ' ';
            }

            $where .= $operator . implode(' OR ', str_replace('#', '%', $condition));
        }

        $preparedSQL = sprintf(
            $selectSQL,
            ('' ==! $where ? 'WHERE' : ''),
            $where
        );

        echo $preparedSQL;

        $db = ConnectionManager::getDataSource('default');
        $raw = $db->fetchAll($preparedSQL);

        $ids = array_reduce($raw, function($list, $row) {
            $list[] = $row['recordings']['id'];

            return $list;
        }, []);

        /* page */
        $currentPage = 1;
        if(isset($this->passedArgs['page'])) {
            $currentPage = $this->passedArgs['page'];
        }

        $this->Paginator->settings = array (
            'conditions' => array(
                'Recording.id' => $ids,
            ),
            'contain' => array(
                'Format' => array(
                    'fields' => array('format'),
                ),
                'Presentation' => array(
                    'fields' => array('presentation'),
                ),
                'Comprecordingnote' => array(
                    'fields' => array('note'),
                ),
                'Company' => array(
                    'fields' => array('company'),
                ),
                'Ancillarymusic' => array(
                    'fields' => array('name'),
                ),
                'Recsong' => array(
                    'Song' => array(
                        'Composer' => array(
                            'fields' => array('id', 'name'),
                        ),
                        'Composition' => array(
                            'fields' => array('id', 'title'),
                        ),
                    )
                ),
                'Recsinger' => array(
                    'Singer' => array(
                        'Choir' => array(
                            'fields' => array('id', 'choir', 'city'),
                        ),
                        'Director' => array(
                            'fields' => array('id', 'name'),
                        )
                    )
                ),
            ),
            'order' => array ('Recording.no' => 'ASC'),
            'page' => $currentPage,
            'limit' => 20,
            'recursive' => 1
        );

        $results = $this->Paginator->paginate('Recording');

        if ($emptySearch == $searchData['row'][0]['searchTerm']) {
            $searchData['row'][0] = array(
                'searchTable' => 0,
                'searchTerm'  => '',
            );
        }

        $this->set(compact('searchData', 'results', 'json'));
        $this->render('search');
    }
}