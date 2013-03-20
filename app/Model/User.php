<?php
class User extends AppModel {
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
		'email' => array(
            'rule1' => array(
				'rule' => array('email', true),
				'message' => 'Please enter a valid email address'
			 ),
			'rule2' => array(
				'rule'    => array('validateEmail'),
				'message' => 'Email is already in use'
			)
        ),
        'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
			 ),
			 'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'Paword should contain alphabets and numbers only'
            ),
			'length' => array(
				'rule'    => array('minLength', '8'),
				'message' => 'Password should be atleast 8 characters long'
			)
        )
    );
	
	function validateEmail($email){
		$isExists = $this->find('count',array('conditions' => array('email' => $email['email'])));
		if($isExists>0){
			return false;
		}else{
			return true;
		}
	}
}
?>