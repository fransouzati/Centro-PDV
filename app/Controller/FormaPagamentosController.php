<?php
App::uses('AppController', 'Controller');
/**
 * FormaPagamentos Controller
 *
 * @property FormaPagamento $FormaPagamento
 * @property PaginatorComponent $Paginator
 */
class FormaPagamentosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FormaPagamento->recursive = 0;
		$this->set('formaPagamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FormaPagamento->exists($id)) {
			throw new NotFoundException(__('Invalid forma pagamento'));
		}
		$options = array('conditions' => array('FormaPagamento.' . $this->FormaPagamento->primaryKey => $id));
		$this->set('formaPagamento', $this->FormaPagamento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FormaPagamento->create();
			if ($this->FormaPagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The forma pagamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The forma pagamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
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
		if (!$this->FormaPagamento->exists($id)) {
			throw new NotFoundException(__('Invalid forma pagamento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FormaPagamento->save($this->request->data)) {
				$this->Session->setFlash(__('The forma pagamento has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The forma pagamento could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('FormaPagamento.' . $this->FormaPagamento->primaryKey => $id));
			$this->request->data = $this->FormaPagamento->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FormaPagamento->id = $id;
		if (!$this->FormaPagamento->exists()) {
			throw new NotFoundException(__('Invalid forma pagamento'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->FormaPagamento->delete()) {
			$this->Session->setFlash(__('The forma pagamento has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The forma pagamento could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
