<?php
use User\Form\LoginForm;

return array(
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
			'login' => array(
        		'type' => 'segment',
				'options' => array(
					'route'	=> '/login[/:action[/:id]]',
					'contraints' => array(
						'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
						'id' => '[0-9]+',
					),
					'defaults' => array(
						'controller' => 'User\Controller\Index',
						'action' => 'index',
					),
				),
        	),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'User' => __DIR__ . '/../view',
        ),
    ),
		
	'service_manager' => array(
        	'factories' => array(
				'LoginForm' => function($sm)
        			{
        				$loginForm = new LoginForm();
        				return $loginForm;
        			}
			),
        ),
);
