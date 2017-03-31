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
	
	public function view($ketqua_id = NULL)
	{
		$this->autoRender = false;
		$this->layout = false;
    	$paginator = $this->Bang->find('count',array(
    		'conditions' => array(
    			'Bang.ketqua_id' => $ketqua_id,
    			'Bang.date' => $this->Session->read('Session.date')
    			)
    		) );
    	$bang['ketqua_id'] = $ketqua_id;
    	$bang['date'] = $this->Session->read('Session.date');
    	$bang['so_bang'] = $paginator + 1;
    	$this->Bang->create();
        $bang = $this->Bang->save($bang);
        if ($bang) 
        {
            $this->Session->write('Session.bang',(int)($bang['Bang']['id']));
        }
        return $this->redirect(
            array('controller' => 'ketquas', 'action' => 'index')
        );
	}

}
