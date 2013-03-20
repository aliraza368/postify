<?php
// app/Controller/UsersController.php
class UsersController extends AppController {
	//$this->uses
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				$history = array('id' => null, 'user_id' => $user['id'],'loggedin_time'=> date('Y-m-d H:i:s'));
				Controller::loadModel('History');
				$this->History->save($history);
				$this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function index() {
        $this->User->recursive = 0;
        $user = $this->Auth->user();
		Controller::loadModel('History');
		$history = $this->History->find('all', array('conditions' => array('user_id' => $user['id']),'order' => array('loggedin_time' => 'DESC'),'limit'=>5));
		$this->set('history',$history);
		$this->set('username',$user['email']);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
				$this->Auth->login($this->request->data);
				
				$this->Session->setFlash(__('The user has been created'));
				if ($this->Auth->login()) {
					$user = $this->Auth->user();
					$history = array('id' => null, 'user_id' => $user['id'],'loggedin_time'=> date('Y-m-d H:i:s'));
					Controller::loadModel('History');
					$this->History->save($history);
					$this->redirect($this->Auth->redirect());
				}
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
}
?>