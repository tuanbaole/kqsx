<?php
App::uses('AppController', 'Controller');
/**
 * Lotos Controller
 *
 * @property Loto $Loto
 * @property PaginatorComponent $Paginator
 */
class LotosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public function CapNhatKetQua()
    {
        $this->layout = false;
        // $this->autoRender = false;
        $this->loadModel('Giaithuong');
        if ( $this->Session->check('Session.date') ) 
        {
        	$giai_thuongs = $this->Giaithuong->find('all',array(
        		'conditions' => array(
        			'Giaithuong.date' => $this->Session->read('Session.date'),
        			'Giaithuong.ketqua_id IS NULL'
        			)
        		) );  
        	if (!empty($giai_thuongs)) 
            {
        	  	$this->loadModel('Loto');
                if ($this->Session->check('Session.date')) 
                {
                    $lotos = $this->Loto->find('list',array(
                        'conditions' => array(
                            'Loto.date' => $this->Session->read('Session.date')
                            ),
                        'order' => array('Loto.created DESC'),
                        'limit' => 27,
                        'fields' => array('Loto.id','Loto.loto')
                        ) );
                    $trungThuong = array_count_values($lotos);
                    foreach ($giai_thuongs as $key_giai_thuong => $value_giai_thuong) {
                        if ($value_giai_thuong['Giaithuong']['trang_thai'] === 1) {
                            if (isset( $trungThuong[$value_giai_thuong['Giaithuong']['loto']] ) ) 
                            {
                                pr($trungThuong[$value_giai_thuong['Giaithuong']['loto']]);
                            }
                        }
                    }
                    pr($trungThuong);
                    // pr($this->Session->read('Session.date'));
                    // pr($giai_thuongs);
                }
    	  	} 
            else 
            {
    	  		$this->Session->setFlash(__('Cập nhật thành công!'),'default',array('class' => 'alert alert-danger') );
	            // return $this->redirect(
	            //     array('controller' => 'ketquas', 'action' => 'index')
	            // );
    	  	}
        	pr($giai_thuongs);
        } 
        else 
        {
            $this->Session->setFlash(__('Session.bang hoặc Session.date không tồn tại !'),'default',array('class' => 'alert alert-danger') );
            return $this->redirect(
                array('controller' => 'ketquas', 'action' => 'index')
            );
        }
    }
	
}
