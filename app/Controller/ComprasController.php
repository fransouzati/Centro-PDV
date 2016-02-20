<?php
App::uses('AppController', 'Controller');
/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 */
class ComprasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = ['Locale.Locale', 'Math'];

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Compra->recursive = 0;
		$this->Paginator->settings = array('limit' => 20, 'order' => array('Compra.data' => 'DESC'));

		if ($this->request->is('requested')) {
            return $this->paginate();
        } else {
            $this->set('compras', $this->Paginator->paginate());
        }

        $formaPagamentos = $this->Compra->FormaPagamento->find('list', array('fields' => array('FormaPagamento.descricao'), 'order' => array('FormaPagamento.descricao' => 'ASC')));
		$suppliers = $this->Compra->Supplier->find('list', array('fields' => array('Supplier.fantasia'), 'order' => array('Supplier.fantasia' => 'ASC')));
		$this->set(compact('formaPagamentos', 'suppliers'));

	}

	public function home_index() {
		$this->Compra->recursive = 0;
		$this->Paginator->settings = array('conditions' => array('Compra.status' => array(1,2)) ,'order' => array('Compra.data_pagamento' => 'ASC'));

       if ($this->request->is('requested')) {
            return $this->paginate();
        } else {
            return null;
        }


        $formaPagamentos = $this->Compra->FormaPagamento->find('list', array('fields' => array('FormaPagamento.descricao'), 'order' => array('FormaPagamento.descricao' => 'ASC')));
		$suppliers = $this->Compra->Supplier->find('list', array('fields' => array('Supplier.fantasia'), 'order' => array('Supplier.fantasia' => 'ASC')));
		$this->set(compact('formaPagamentos', 'suppliers'));

	}

	public function totalizando(){
		//$entregues = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'),
        //array('status' => 1));

        //$status = $this->params->params['status'];
        $condicoes = $this->params->params['condicoes'];
        $ordem = isset($this->params->params['ordem']) ?: null;


        $compras = $this->Compra->find('all', array( 'conditions' => array($condicoes), $ordem ));


		$lista = array();
	  	foreach($compras as $compra){
		 	//$lista[] = number_format($compra['Compra']['valor']);
		 	$compra = explode(",", $compra['Compra']['valor']);
		 	$compra = implode(".", $compra);

		 	$lista[] = (float) $compra;
		 	//$lista[] =  number_format($compra['Compra']['valor'], 2);
		}

		return $lista;
	}

	public function comprasMes(){
		$condicoes = array(
	        'conditions' => $this->params->params['condicoes'],
	        'order' => isset($this->params->params['ordem']) ? $this->params->params['ordem'] : array()
	    );


		$compras = $this->Compra->find('all', $condicoes);

		return $compras;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
		$this->set('compra', $this->Compra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Compra->create();
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('The compra has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compra could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$formaPagamentos = $this->Compra->FormaPagamento->find('list', array('fields' => array('FormaPagamento.descricao')));
		$suppliers = $this->Compra->Supplier->find('list', array('fields' => array('Supplier.fantasia')));
		$this->set(compact('formaPagamentos', 'suppliers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('The compra has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compra could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
			$this->request->data = $this->Compra->find('first', $options);
		}
		$formaPagamentos = $this->Compra->FormaPagamento->find('list');
		$suppliers = $this->Compra->Supplier->find('list');
		$this->set(compact('formaPagamentos', 'suppliers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Compra->delete()) {
			$this->Session->setFlash(__('The compra has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The compra could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
