<?php
App::uses('AppController', 'Controller');
/**
 * Bangs Controller
 *
 * @property Bang $Bang
 * @property PaginatorComponent $Paginator
 */
class BangsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	// public $components = array('Paginator');
	
	public function view()
	{
		$this->autoRender = false;
		$this->layout = false;
		if ($this->request->is('ajax')) 
        {
        	$data = $this->request->data;
        	$paginator = $this->Bang->find('count',array(
        		'conditions' => array(
        			'Bang.ketqua_id' => $data['ketqua_id'],
        			'Bang.date' => $data['date']
        			)
        		) );
        	$bang['ketqua_id'] = $data['ketqua_id'];
        	$bang['date'] = $data['date'];
        	$bang['so_bang'] = $paginator + 1;
        	$this->Bang->create();
            $bang = $this->Bang->save($bang);
            
            $bangs = $this->Bang->find('list',array(
            'conditions' => array(
                'Bang.ketqua_id' => $data['ketqua_id'],
                'Bang.date' => $data['date'],
                ),
            'fields' => array('Bang.id','Bang.so_bang')
            ) );
        	$this->set(compact('bangs'));
        	$this->render('/Elements/bang');

        }
	}

}
