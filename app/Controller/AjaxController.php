<?php
App::uses('AppController', 'Controller');
App::uses('ShellDispatcher', 'Console');
/**
 * Countries Controller
 *
 * @property Country $Country
 */
class AjaxController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $this->reset();
	}

    public function sessions() {
        header('Content-Type: application/json');
        $this->autoRender = false ;
        $active_sessions = array();
        $all_sessions = array(
            'CompositionSearch' => 'Compositions search',
            'DirectorSearch' => 'Directors search',
            'ChoirSearch' => 'Choirs search',
            'ComposerSearch' => 'Composers search',
            'RecordingSearch' => 'Recordings search',
            'SongSearch' => 'Composers-Compositions pairs search',
            'SingerSearch' => 'Choirs-Directors pairs search',
            'Singers' => 'Active Choir-Director pair',
            'Songs' => 'Active Composer-Composition pair',
            'links' => 'Active link',
        );

        foreach($all_sessions as $k=>$v) {
            if ($this->Session->check($k)) $active_sessions[$k] = $v;
        }

        echo json_encode($active_sessions);
    }

    public function destroy_session($name) {
        header('Content-Type: application/json');
        $this->autoRender = false ;
        
        if ($name == 'all')
            $this->Session->destroy();
        else
            if ($this->Session->check($name)) $this->Session->delete($name);

        echo 'Done';
    }

    private function reset() {
	    $preserve = array('Config', 'Auth', 'Message');
	    $sessions = $this->Session->read();

	    foreach ($sessions as $key=>$session) {
	        if (!in_array($key, $preserve)) {
                $this->Session->delete($key);
            }
        }
        $this->redirect(array('controller' => 'recordings', 'action' => 'index'));
    }

}
