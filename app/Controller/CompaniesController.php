<?php
App::uses('AppController', 'Controller');
/**
 * Companies Controller
 *
 * @property Company $Company
 */
class CompaniesController extends AppController {
    public $components = array('Util');
/**
 * index method
 *
 * @return void
 */
	public function index_old() {
		$this->Company->recursive = 0;
		$this->paginate = array('order' => 'company');
		$this->set('companies', $this->paginate());
	}

	public function index() {
        /* HANDLE POST DATA BY TRANSFORMING POST IN GET*/
        if($this->request && $this->request->is('post'))
        {
            $url = array('action'=>'index');
            $filters = array();

            if(isset($this->data['Company']['company']) && $this->data['Company']['company'])
                $filters['company'] = $this->data['Company']['company'];
            else
                $this->Session->write('CompanySearch.company_value', null);

            $this->Session->write('CompanySearch.page_value', 1);

            //redirect user to the index page including the selected filters
            $this->redirect(array_merge($url,$filters));
        }

        //check filters on passedArgs
        $conditions = array();

        /* name */
        if(isset($this->passedArgs['company'])) {
            $conditions['company'] = $this->passedArgs['company'];
        } else {
            if($this->Session->check('CompanySearch.company_value')) {
                $conditions['company'] = $this->Session->read('CompanySearch.company_value');
            }
        }

        /* page */
        if(isset($this->passedArgs['page']))
            $curpage = $this->passedArgs['page'];
        else
            if($this->Session->check('CompanySearch.page_value'))
                $curpage = $this->Session->read('CompanySearch.page_value');
            else
                $curpage = 1;

        /* WRITE FORM VALUES TO SESSION */
        foreach($conditions As $k=>$v)
        {
            //$this->Session->write(str_replace('Company', 'CompanySearch', $k) . '_value', $v);
        }

        if(array_key_exists('company', $conditions) == true) {
            $name = array_shift($conditions);
            $conditions['company LIKE'] = '%' . $name . '%';
        }

        $this->paginate = array (
            'conditions' => $conditions,
            'fields' => array('id', 'company'),
            'order' => array ('company' => 'ASC'),
            'page' => $curpage,
            'limit' => 20,
            'recursive' => 0
        );

        if(array_key_exists('company LIKE', $conditions) == true) {
            $name = str_replace('%', '', $conditions['company LIKE']);
            unset($conditions['company LIKE']);
            $conditions['company'] = str_replace('%', '', $name);
        }

        /* write page to session */
        if($curpage > 1)
            $this->Session->write('CompanySearch.page_value', $curpage);

        $companies = $this->paginate('Company');

        $this->set(compact('companies', 'conditions'));

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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
		$this->set('company', $this->Company->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Company->create();
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
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
		if (!$this->Company->exists($id)) {
			throw new NotFoundException(__('Invalid company'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Company->save($this->request->data)) {
				$this->Session->setFlash(__('The company has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The company could not be saved. Please, try again.'));
			}
		} else {
            if (false === $this->isAdmin()) {
                $this->Session->setFlash(__('Only Admins can edit records.'));
                $this->redirect(array('action' => 'index'));
            }

			$options = array('conditions' => array('Company.' . $this->Company->primaryKey => $id));
			$this->request->data = $this->Company->find('first', $options);
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
		$this->Company->id = $id;
		if (!$this->Company->exists()) {
			throw new NotFoundException(__('Invalid company'));
		}
		$this->request->onlyAllow('post', 'delete');

        if (false === $this->isAdmin()) {
            $this->Session->setFlash(__('Only Admins can delete records.'));
            $this->redirect(array('action' => 'index'));
        }

		if ($this->Company->delete()) {
			$this->Session->setFlash(__('Company deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Company was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

    /** reset session method **/
    public function reset() {
        $this->Util->delSession('CompanySearch');
        $this->Util->delSession('name_value');
        $this->Util->delSession('company_value');
        $this->Session->setFlash(__('Memory was reset!'));
        $this->redirect(array('action' => 'index'));
    }

}
