<?php
namespace User\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Captcha;
class LoginForm extends Form
{
	public function __construct()
	{
		parent::__construct('login form');
		$this->setAttribute('method', 'get');
		$this->setAttribute('enctype', 'multipart/form-data');
		
		$email = new Element('email');
		$email->setLabel('Email address');
		$email->setAttributes(array('type' => 'email', 'placeholder' => 'user@domain.com', 'class' => 'form-control'));
		$this->add($email);
		
		$password = new Element('password');
		$password->setLabel('Password');
		$password->setAttributes(array('type' => 'password', 'placeholder' => '*********', 'class' => 'form-control'));
		$this->add($password);
		
		$checkbox = new Element\Checkbox('checkbox');
		$checkbox->setAttribute('type', 'checkbox');		
		$this->add($checkbox);	

		$csrf = new Element\Csrf('csrf');
		$this->add($csrf);
		
		$captcha = new Element\Captcha('captcha');
		$figlet = new Captcha\Figlet();
		$figlet->setWordlen(4);
		$captcha->setCaptcha($figlet);			
		$captcha->setLabel('Please verify');
		$this->add($captcha);		
		
		$submit = new Element('submit');
		$submit->setAttribute('type', 'sumbmit');
		$submit->setAttribute('class', 'btn btn-default');
		$submit->setValue('Sign in');
		$this->add($submit);		
	}
}