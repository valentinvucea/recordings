<?php
App::uses('Component', 'Controller');

class UtilComponent extends Component {
    public $components = array('Session');

	public function addToSession($model, $id, $name) {
		
		$recs = array();
		if ($this->Session->check('recs') != false)
			$recs = $this->Session->read('recs');

		$arr = array();
		if(isset($recs[$model]) && !empty($recs[$model]))
			$arr = $recs[$model];
			
		if( $this->isInArray( $arr, 'id', $id ) === false ) {
			$arr[] = array('id' => $id, 'name' => $name);
			$recs[$model] = $arr;
			$this->Session->write('recs', $recs );
		}
    }
	
	public function delFromSession($model, $id) {
		
		$recs = array();
		if ($this->Session->check('recs') != false)
			$recs = $this->Session->read('recs');

		if( isset($recs[$model]) ) {
			foreach( $recs[$model] as $no=>$row ) {
				if( $row['id'] == $id ) {
					unset($recs[$model][$no]);
					break;
				}
			}
		}
		
		if( empty($recs[$model]) ) {
			unset($recs[$model]);
		} else {
			$arr = $recs[$model];
			sort($arr);
			$recs[$model] = $arr;
		}
		
		$this->Session->write('recs', $recs );
    }	
	
	public function replaceInSession($model, $id, $name) {
		
		$recs = array();
		if ($this->Session->check('recs') != false)
			$recs = $this->Session->read('recs');

		if( isset($recs[$model]) ) {
			unset($recs[$model]);
		}

		$recs[$model][0] = array('id' => $id, 'name' => $name);
		
		$this->Session->write('recs', $recs );
    }

    public function replaceInSess($sess, $opts) {
		
		$recs = array();
		if ($this->Session->check($sess) != false)
			$recs = $this->Session->read($sess);

		foreach( $opts as $k=>$v) {
			if( isset($recs[$k]) )
				unset($recs[$k]);

			$recs[$k] = $v;
		}
		
		$this->Session->write($sess, $recs );
    }

	public function delFromSess($sess, $opts) {
		
		$recs = array();
		if ($this->Session->check($sess) != false)
			$recs = $this->Session->read($sess);

		foreach( $opts as $item ) {
			if( isset($recs[$item]) )
				unset($recs[$item]);
		}
		
		$this->Session->write($sess, $recs );
    }

	public function delFromSessArr($arr, $key, $val, $sess) {
		$recs = array();
		
		if ($this->Session->check($sess) !== false) {
			$recs = $this->Session->read($sess);

			if( isset($recs[$arr]) && is_array($recs[$arr]) ) {
				foreach($recs[$arr] as $i=>$elem) {
					if( isset($elem[$key]) && $elem[$key] == $val ) {
						unset($recs[$arr][$i]);
						break;
					}
				}
			}

			$plus = $recs[$arr];
			$recs[$arr] = array_values($plus);

			$this->Session->write($sess, $recs);
		}
    }

	public function delRowFromSessArr($arr, $i, $sess) {
		$recs = array();
		
		if ($this->Session->check($sess) !== false) {
			$recs = $this->Session->read($sess);

			if( isset($recs[$arr][$i]) ) {
				unset($recs[$arr][$i]);

				$plus = $recs[$arr];
				$recs[$arr] = array_values($plus);

				$this->Session->write($sess, $recs);
			}
		}
    }    

    public function addToSessArr($arr, $val, $sess) {
		$recs = array();
		
		if ($this->Session->check($sess) !== false) {
			$recs = $this->Session->read($sess);

			$plus = array();
			if( isset($recs[$arr]) && is_array($recs[$arr]) )
				$plus = $recs[$arr];

			$plus[] = $val;

			$recs[$arr] = array_values($plus);

			$this->Session->write($sess, $recs);
		}
    }      
	
	public function isInArray( $arr, $key, $value ) {
		$ret = false;
		
		foreach($arr as $subarr) {
			if( $subarr[$key] == $value ) {
				$ret = true;
				break;
			}
		}
		
		return $ret;
	}
	
	public function isRecording() {
		$ret = false;
		
		$recs = array();
		if ($this->Session->check('recs') != false) {
			$recs = $this->Session->read('recs');
				
			if( isset($recs['Recording']['id']) )
				$ret = true;
		}
		
		return $ret;
	}
	
	public function deleteSession() {
		if ($this->Session->check('recs') != false) {
			$this->Session->delete('recs');
		}
	}

	public function delSession($sess = null) {
		if ($this->Session->check($sess) !== false) {
			$this->Session->delete($sess);
		}
	}	

	public function delSess($sess) {
		if ($this->Session->check($sess) != false) {
			$this->Session->delete($sess);
		}
	}
	
	public function translateModel( $model ) {
		switch ( $model ) {
			case 'Reccomposer': return 'Composer'; break;
			case 'Recchoir': return 'Choir'; break;
			case 'Recdirector': return 'Director'; break;
			case 'Record': return 'Record'; break;
			case 'Recording': return 'Recording'; break;
			case 'Composition': return 'Composition'; break;
		}
	}
	
	
}