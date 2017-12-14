<?php
App::uses('AppController', 'Controller');
/**
 * Compositions Controller
 *
 * @property Composition $Composition
 */
class CompositionsController extends AppController {
	public $helpers = array('Icon', 'Sessionplus');	
	public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index_old() {
		$this->Composition->recursive = 0;
		$this->set('compositions', $this->paginate());
	}
	
	public function index() {	
		/* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
		if($this->request && $this->request->is('post'))
		{
		    $url = array('action'=>'index');
		    $filters = array();
			// Title
		    if(isset($this->data['Composition']['title']) && $this->data['Composition']['title'])
		        $filters['title'] = $this->data['Composition']['title'];
			else
				$this->Session->write('CompositionSearch.title_value', null);
			// Id
		    if(isset($this->data['Composition']['id']))
		        $filters['id'] = $this->data['Composition']['id'];
			else
				$this->Session->write('CompositionSearch.id_value', null);		        
			// Opening text
		    if(isset($this->data['Composition']['opening_text']) && $this->data['Composition']['opening_text'])
		        $filters['opening_text'] = $this->data['Composition']['opening_text'];
			else
				$this->Session->write('CompositionSearch.opening_text_value', null);
			// Genre
		    if(isset($this->data['Composition']['genre_id']) && $this->data['Composition']['genre_id'])
		        $filters['genre_id'] = $this->data['Composition']['genre_id'];
			else
				$this->Session->write('CompositionSearch.genre_id_value', null);
				
			
			$this->Session->write('CompositionSearch.page_value', 1);
			
			//redirect user to the index page including the selected filters
			$this->redirect(array_merge($url,$filters)); 
		}
		
		//check filters on passedArgs
		$conditions = array();
		
		/* id */
		if(isset($this->passedArgs['id'])){
			if($this->passedArgs['id'] != '')  		
    			$conditions['Composition.id'] = $this->passedArgs['id'];
		} else {
			if($this->Session->check('CompositionSearch.id_value'))
				if($this->Session->check('CompositionSearch.id_value') != '')
					$conditions['Composition.id'] = $this->Session->read('CompositionSearch.id_value');
		}     

		/* title */
        if(array_key_exists('Composition.id', $conditions) == false) {
            if(isset($this->passedArgs['title']))
                $conditions['Composition.title'] = $this->passedArgs['title']; 
            else
                if($this->Session->check('CompositionSearch.title_value'))
                    $conditions['Composition.title'] = $this->Session->read('CompositionSearch.title_value');
        }
		
		/* opening text */
        if(array_key_exists('Composition.id', $conditions) == false) {
            if(isset($this->passedArgs['opening_text']))
                $conditions['Composition.opening_text'] = $this->passedArgs['opening_text']; 
            else
                if($this->Session->check('CompositionSearch.opening_text_value'))
                    $conditions['Composition.opening_text'] = $this->Session->read('CompositionSearch.opening_text_value');
        }

		/* genre */
        if(array_key_exists('Composition.id', $conditions) == false) {
            if(isset($this->passedArgs['genre_id']))
                $conditions['Genre.genre'] = $this->passedArgs['genre_id'];
            else
                if($this->Session->check('CompositionSearch.genre_id_value'))
                    $conditions['Genre.genre'] = $this->Session->read('CompositionSearch.genre_id_value');
        }	

		/* page */
		if(isset($this->passedArgs['page']))
			$curpage = $this->passedArgs['page'];
		else
			if($this->Session->check('CompositionSearch.page_value'))
				$curpage = $this->Session->read('CompositionSearch.page_value');
			else
				$curpage = 1;
				
		/* WRITE FORM VALUES TO SESSION */
		foreach($conditions As $k=>$v)
		{
			if($k == 'Genre.genre')
				$this->Session->write('CompositionSearch.genre_id_value', $v);
			else
				$this->Session->write(str_replace('Composition', 'CompositionSearch', $k) . '_value', $v);
		}
		
		if(array_key_exists('Composition.title', $conditions) == true) {
			$title = array_shift($conditions);
			$conditions['Composition.title LIKE'] = '%' . $title . '%';
		}
		
		if(array_key_exists('Composition.opening_text', $conditions) == true) {
			$opening_text = array_shift($conditions);
			$conditions['Composition.opening_text LIKE'] = '%' . $opening_text . '%';
		}		
				
		$this->paginate = array (
			'conditions' => $conditions,
            'contain' => array('Genre', 'Version', 'Recordingnote', 'Voicing'),
			'fields' => array('Composition.id', 'Composition.title', 'Composition.opening_text', 'Composition.genre_id', 'Genre.genre', 'Composition.version_id', 'Version.version', 'Composition.key_name', 'Composition.collection_title'),
			'order' => array ('Composition.title' => 'ASC', 'Composition.id' => 'ASC'),
			'page' => $curpage,
			'limit' => 20,
			'recursive' => 1
		);
		// CREATE CONDITION ARRAY BY REUSING $conditions
		// Title
		if(array_key_exists('Composition.title LIKE', $conditions) == true) {		
			$title = str_replace('%', '', $conditions['Composition.title LIKE']);
			unset($conditions['Composition.title LIKE']);
			$conditions['Composition.title'] = str_replace('%', '', $title);
		}
		// Opening text
		if(array_key_exists('Composition.opening_text LIKE', $conditions) == true) {
			$opening_text = str_replace('%', '', $conditions['Composition.opening_text LIKE']);
			unset($conditions['Composition.opening_text LIKE']);
			$conditions['Composition.opening_text'] = str_replace('%', '', $opening_text);
		}			
						
		/* write page to session */
		if($curpage > 1)
			$this->Session->write('CompositionSearch.page_value', $curpage);
		
		$compositions = $this->paginate('Composition');

		$this->set(compact('compositions', 'conditions'));
        
		$this->render('index');
	}
    
    public function reset() {
        if($this->Session->check('CompositionSearch.id_value'))
            $this->Session->delete('CompositionSearch.id_value');
        
        if($this->Session->check('CompositionSearch.title_value'))
            $this->Session->delete('CompositionSearch.title_value');
			
        if($this->Session->check('CompositionSearch.opening_text_value'))
            $this->Session->delete('CompositionSearch.opening_text_value');			
            
        if($this->Session->check('CompositionSearch.genre_id_value'))
            $this->Session->delete('CompositionSearch.genre_id_value');	        
		
		$this->Session->delete('CompositionSearch.genre_id');
		
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
		if (!$this->Composition->exists($id)) {
			throw new NotFoundException(__('Invalid composition'));
		}
		$options = array('conditions' => array('Composition.' . $this->Composition->primaryKey => $id));
		$this->set('composition', $this->Composition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Composition->create();
			if ($this->Composition->save($this->request->data)) {
				$this->Session->setFlash(__('The composition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The composition could not be saved. Please, try again.'));
			}
		}
		$genres = $this->Composition->Genre->find('list', array('order'=>array('genre')));
		$versions = $this->Composition->Version->find('list', array('order'=>array('version')));
		$recordingnotes = $this->Composition->Recordingnote->find('list', array('order'=>array('recording_note')));
		$voicings = $this->Composition->Voicing->find('list', array('order'=>array('voicing')));
		$this->set(compact('genres', 'versions', 'recordingnotes', 'voicings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Composition->exists($id)) {
			throw new NotFoundException(__('Invalid composition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Composition->save($this->request->data)) {
				$this->Session->setFlash(__('The composition has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The composition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Composition.' . $this->Composition->primaryKey => $id));
			$this->request->data = $this->Composition->find('first', $options);
		}

		$genres = $this->Composition->Genre->find('list', array('order'=>array('genre')));
		$versions = $this->Composition->Version->find('list', array('order'=>array('version')));
		$recordingnotes = $this->Composition->Recordingnote->find('list', array('order'=>array('recording_note')));
		$voicings = $this->Composition->Voicing->find('list', array('order'=>array('voicing')));		
		$this->set(compact('genres', 'versions', 'recordingnotes', 'voicings'));
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
		$this->Composition->id = $id;
		if (!$this->Composition->exists()) {
			throw new NotFoundException(__('Invalid composition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Composition->delete()) {
			$this->Session->setFlash(__('Composition deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Composition was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function select($id = null) {
		if ($id) $this->Util->replaceInSess('CompositionSearch', array('id_value' => $id));
		$this->redirect(array('action' => 'index'));
	}
	
	/* SET THE SESSION FOR LINKING RECORDS */
	public function link($id = null) {
		if( substr($id, 0, 1) == 'u' ) {
			$id = substr($id, 1);
			$this->Session->setFlash(__('Composition #' . $id . ' was removed from memory!'));
			$this->Util->delFromSess('Songs', array('composition_id', 'Composition.title'));
			$this->Util->delFromSess('CompositionSearch', array('id_value'));			
			$this->redirect(array('action' => 'index'));
		} else {
			if (!$this->Composition->exists($id)) {
				throw new NotFoundException(__('Invalid composition'));
			}	
			
			if ($this->Session->check('Songs') === false) {
				$this->Session->setFlash(__('No active Composition-Composer session! Memory cleared!'));				
				$this->Util->delFromSess('Songs', array('composition_id', 'Composition.title'));
				$this->redirect(array('action' => 'index'));
			} else {
				$songs = $this->Session->read('Songs');

				$options = array('conditions' => array('Composition.' . $this->Composition->primaryKey => $id));
				$row = $this->Composition->find('first', $options);

				$this->Util->replaceInSess('Songs', array('composition_id' => $id, 'Composition.title' => $row['Composition']['title']));
				
				if($songs['method'] == 'add')
					$this->redirect(array('controller' => 'Songs', 'action' => 'add'));
				else
					$this->redirect(array('controller' => 'Songs', 'action' => 'edit/' . $songs['id']));
			}
		}	
	}	
}
