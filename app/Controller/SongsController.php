<?php
App::uses('AppController', 'Controller');
/**
 * Songs Controller
 *
 * @property Song $Song
 */
class SongsController extends AppController {
	public $helpers = array('Icon');
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index2() {
		$this->Song->recursive = 0;
		$this->set('songs', $this->paginate());
	}

	public function index() {
		
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();

		    /*
		    if( isset($this->data['Song']['composition_id']) )
		        $filters['composition_id'] = $this->data['Song']['composition_id'];
			else
				$this->Session->write('SongSearch.composition_id', null);

		    if( isset($this->data['Song']['composer_id']) )
		        $filters['composer_id'] = $this->data['Song']['composer_id'];
			else
				$this->Session->write('SongSearch.composition_id', null);			
			*/

		    if( isset($this->data['Song']['Composition@title']) )
		        $filters['Composition.title'] = $this->data['Song']['Composition@title'];
			else
				$this->Session->write('SongSearch.Composition.title', null);
				
			if( isset($this->data['Song']['Composer@name']) )
		        $filters['Composer.name'] = $this->data['Song']['Composer@name'];
			else
				$this->Session->write('SongSearch.Composer.name', null);		        
				
			$this->Session->write('SongSearch.page_value', 1);
		
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
				
		//build conditions from passedArgs
		$conditions = array();
		
		/*
		// composition_id
		if( isset($this->passedArgs['composition_id']) && $this->passedArgs['composition_id'] != '' )
    		$conditions['composition_id'] = $this->passedArgs['composition_id'];
		else 
			if($this->Session->check('SongSearch.composition_id') && $this->Session->check('SongSearch.composition_id') != '' )
				$conditions['composition_id'] = $this->Session->read('SongSearch.composition_id');

		// composer_id
		if( isset($this->passedArgs['composer_id']) && $this->passedArgs['composer_id'] != '' )
    		$conditions['composer_id'] = $this->passedArgs['composer_id'];
		else
			if( $this->Session->check('SongSearch.composer_id') && $this->Session->check('SongSearch.composer_id') != '' )
				$conditions['composer_id'] = $this->Session->read('SongSearch.composer_id');		     
		*/

		// Composition.title
		if( isset($this->passedArgs['Composition.title']) && $this->passedArgs['Composition.title'] != '' )	
    		$conditions['Composition.title'] = $this->passedArgs['Composition.title'];
		else 
			if( $this->Session->check('SongSearch.Composition.title') && $this->Session->check('SongSearch.Composition.title') != '' )
				$conditions['Composition.title'] = $this->Session->read('SongSearch.Composition.title');

		// Composer.name
		if( isset($this->passedArgs['Composer.name']) && $this->passedArgs['Composer.name'] != '' )
    		$conditions['Composer.name'] = $this->passedArgs['Composer.name'];
		else 
			if( $this->Session->check('SongSearch.Composer.name') && $this->Session->check('SongSearch.Composer.name') != '' )
				$conditions['Composer.name'] = $this->Session->read('SongSearch.Composer.name');	

		// Page
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else if($this->Session->check('SongSearch.page_value'))
			$curpage = $this->Session->read('SongSearch.page_value');
		else
			$curpage = 1;

		// WRITE FORM VALUES TO SESSION
		foreach($conditions As $k=>$v) { 
			$this->Session->write('SongSearch.' . $k, $v);
		}

		$passed = $conditions;
		
		// OVERWRITE CONDITIONS WITH FOR LIKE OPERATOR
		if( array_key_exists('Composition.title', $conditions) ) {
			$value = $conditions['Composition.title'];
			unset($conditions['Composition.title']);
			$conditions['Composition.title LIKE'] = '%' . $value . '%';
		}
		
		if( array_key_exists('Composer.name', $conditions) ) {
			$value = $conditions['Composer.name'];
			unset($conditions['Composer.name']);
			$conditions['Composer.name LIKE'] = '%' . $value . '%';
		}
				
		/*
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('Composition', 'Composer'),
			'fields' => array('Song.id', 'Song.composition_id', 'Song.composer_id', 'Composition.title', 'Composer.name'),
			'order' => array ('Song.no' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 2
		);
		*/

		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array(
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
			'order' => array ('Song.no' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 2
		);
		
		
		if(array_key_exists('Composition.title LIKE', $conditions) == true) {
			$name = str_replace('%', '', $conditions['Composition.name LIKE']);
			unset($conditions['Composition.title LIKE']);
			$conditions['Composition.title'] = str_replace('%', '', $name);
		}

		if(array_key_exists('Composer.name LIKE', $conditions) == true) {
			$name = str_replace('%', '', $conditions['Composer.name LIKE']);
			unset($conditions['Composer.name LIKE']);
			$conditions['Composer.name'] = str_replace('%', '', $name);
		}		
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('SongSearch.page_value', $curpage);
		
		$songs = $this->paginate('Song');

		$this->set(compact('songs', 'conditions'));
        
		$this->render('index');
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

			$this->Song->create();
			
			if ($this->Song->save($request, array('validate' => true))) {
				$this->Session->setFlash(__('The record has been saved'));
				$this->Util->delSess('Songs');
				$this->redirect(array('action' => 'index', $id));
			} else {
				$this->Session->setFlash(__('The record could not be saved. Please, try again.'));
			}
		}

		$songs = array();
		
		if ($this->Session->check('Songs') === false) {
			$songs = array(
				'method' => 'add',
			);
			$this->Session->write('Songs', $songs);
		} else {
			$songs = $this->Session->read('Songs');
		}

		$this->set(compact('songs'));

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
		$this->Song->id = $id;
		if (!$this->Song->exists()) {
			throw new NotFoundException(__('Invalid Composition-Composer pair'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Song->delete()) {
			$this->Session->setFlash(__('Composition-Composer pair deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Composition-Composer pair was not deleted'));
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
		if (!$this->Song->exists($id)) {
			throw new NotFoundException(__('Invalid Composition-Composer pair!'));
		}
		$options = array(
			'conditions' => array('Song.' . $this->Song->primaryKey => $id),
			'contain' => array(
				'Composition' => array('fields' => array('id', 'title'), 'Genre' => array('fields' => array('id','genre'))),
				'Composer' => array('fields' => array('id', 'name'))
			)
		);
		$this->set('song', $this->Song->find('first', $options));
	}

	public function edit($id = null) {
		if (!$this->Song->exists($id)) {
			throw new NotFoundException(__('Invalid Composition-Composer pair'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$request = $this->request->data;

			foreach( $request as $elem=>$val ) {
				if( substr($elem,0,1) == 'x' )
					unset($elem);
			}

			if ($this->Song->save($request, array('validate' => true))) {
				$this->Session->setFlash(__('The Composition-Composer pair has been saved'));
				$this->Util->delSess('Songs');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Composition-Composer could not be saved. Please, try again.'));
			}
		} else {
			$songs_db = $this->Song->find('first', array(
				'conditions' => array('Song.' . $this->Song->primaryKey => $id),
				'contain' => array(
					'Composition' => array('fields' => array('title'), 'Genre' => array('fields' => array('id','genre'))),
					'Composer' => array('fields' => array('name'))
				)
			));

			// process array to match session
			$songs = array();

			foreach( $songs_db as $model=>$arr ) {
				foreach( $arr as $key=>$value ) {
					if( $model == 'Song' ) {
						$songs[$key] = $value;
					} else {
						$songs[$model . '.' . $key] = $value;
					}
				}
			}

			// add session data to DB data
			if ($this->Session->check('Songs') === false) {
				$songs['method'] = 'edit';
				$songs['id'] = $id;
				$this->Session->write('Songs', $songs);
			} else {
				$songs_sess = $this->Session->read('Songs');
				if( $songs_sess['method'] != 'edit' ) {
					$this->Session->setFlash(__('Memory data was cleared (not set for EDIT action)!'));
					$this->Util->delSess('Songs');
					$this->redirect(array('action' => 'index'));
				} else if( $songs_sess['id'] != $id ) {
					$this->Session->setFlash(__('Memory data wass cleared (IDs not equal)!'));
					$this->Util->delSess('Songs');
					$this->redirect(array('action' => 'index'));
				} else {
					$songs['method'] = 'edit';
					if( isset($songs_sess['composition_id']) )
						$songs['composition_id'] = $songs_sess['composition_id'];
					if( isset($songs_sess['composer_id']) )
						$songs['composer_id'] = $songs_sess['composer_id'];
					if( isset($songs_sess['Composition.title']) )
						$songs['Composition.title'] = $songs_sess['Composition.title'];
					if( isset($songs_sess['Composer.name']) )
						$songs['Composer.name'] = $songs_sess['Composer.name'];
					$this->Util->delSess('Songs');
					$this->Session->write('Songs', $songs);
				}
			}

			$this->set(compact('songs'));
		}
	}

	public function current() {
		if ($this->Session->check('Songs') === false) {
			$this->Session->setFlash(__('No active Composition-Composer session in memory!'));				
			$this->redirect(array('action' => 'index'));
		} else {
			$songs = $this->Session->read('Songs');			
			if($songs['method'] == 'add')
				$this->redirect(array('controller' => 'Songs', 'action' => 'add'));
			else
				$this->redirect(array('controller' => 'Songs', 'action' => 'edit/' . $songs['id']));
		}
	}

	/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);

			if ($this->Session->check('links') === false) {
				$this->Session->setFlash(__('No active Composition-composer session! Memory cleared!'));				
				$this->redirect(array('action' => 'index'));
			} else {
				$links = $this->Session->read('links');

				if( isset($links['Songs']) ) {
					foreach($links['Songs'] as $i=>$song) {
						if( $song['song_id'] == $id ) {
							if( $song['source'] == 'db' ) {
								$this->loadModel('Recsong');
								$error = array();
								try {
									$this->Recsong->delete($song['id']);
								} catch(Exception $e) {
									$error[] = 'DELETE - Recsong id: ' . $song['id'] . '(' . $e . ')';
								}							

								if (count($error) != 0)
									$this->Session->setFlash(__('The record could not be deleted.' . $error[0]));
							}

							$this->Session->setFlash(__('The link (Composition-composer pair #' . $id . ') was removed from database/memory!'));
							$this->Util->delFromSessArr('Songs', 'song_id', $id, 'links');
							$this->redirect(array('action' => 'index'));							
						}
					}
				}
			}
		} else {
			if (!$this->Song->exists($id)) {
				throw new NotFoundException(__('Invalid Song'));
			}

            if ($this->Session->check('links') === false) {
				$this->Session->setFlash(__('No active Composition-composer session! Memory cleared!'));				
				$this->redirect(array('action' => 'index'));
			} else {
				$links = $this->Session->read('links');


                $options = array(
					'conditions' => array('Song.' . $this->Song->primaryKey => $id),
                    'contain' => array(
                        'Composition' => array(
                            'fields' => array('id', 'title'),
                            'Genre' => array('fields' => array('id', 'genre'))
                        ),
                        'Composer' => array(
                            'fields' => array('id', 'name')
                        ),
                    ),
				);
				
				$row = $this->Song->find('first', $options);

				$arr = array(
					'song_id' => $row['Song']['id'],
					'composition_id' => $row['Song']['composition_id'],
					'composer_id' => $row['Song']['composer_id'],
					'composition' => $row['Composition']['title'],
					'composer' => $row['Composer']['name'],
                    'genre_id' => $row['Composition']['Genre']['id'],
                    'genre' => $row['Composition']['Genre']['genre'],
					'source' => 'ses',
					'id' => 0
				);

                $this->Util->addToSessArr('Songs', $arr, 'links');
				$this->redirect(array('action' => 'index'));
			}
		}	
	}

	public function reset() {
        if($this->Session->check('SongSearch.Composition.title'))
            $this->Session->delete('SongSearch.Composition.title');
        
        if($this->Session->check('SongSearch.Composer.name'))
            $this->Session->delete('SongSearch.Composer.name');

		$this->redirect(array('action' => 'index'));
    }	

}