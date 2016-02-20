<?php
App::uses('AppModel', 'Model');
App::uses('Localize', 'Locale.Lib');
/**
 * Compra Model
 *
 * @property FormaPagamento $FormaPagamento
 * @property Supplier $Supplier
 */
class Compra extends AppModel {

var $actsAs = ['Locale.Locale'];

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'valor' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'data' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '<red>É Obrigatório o preenchimento da Data da Compra.<red>'
            )
        ),
        'entrega' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '<red>É Obrigatório o preenchimento da Data da Entrega.<red>'
            )
        ),
        'data_pagamento' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '<red>É Obrigatório o preenchimento da Data da Entrega.<red>'
            )
        ),
		'forma_pagamento_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'supplier_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FormaPagamento' => array(
			'className' => 'FormaPagamento',
			'foreignKey' => 'forma_pagamento_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);



	//$actsAs = ['Locale.Locale'];

}
