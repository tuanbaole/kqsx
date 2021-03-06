<?php
App::uses('AppController', 'Controller');
/**
 * Giaithuongs Controller
 *
 * @property Giaithuong $Giaithuong
 * @property PaginatorComponent $Paginator
 */
class GiaithuongsController extends AppController {

	public function delete()
    {
        if($this->request->is('ajax'))
        {
            $this->autoRender = false;
            $this->layout = false;
            $data = $this->request->data;
            
            $result = $this->Giaithuong->delete($data['giaithuong_id']);
            $giai_thuongs = $this->Giaithuong->find('all',array(
	            'conditions' => array(
	                'Giaithuong.ketqua_id' => $data['ketqua_id'],
	                'Giaithuong.bang' => $this->Session->read('Session.bang'),
	                'Giaithuong.date' => $data['date'],
                    'Giaithuong.trang_thai' => 1
	                )
	            ) );
            $this->set('date',$data['date']);
            $this->set(compact('giai_thuong_los'));
            $this->set('ket_qua_id', $data['ketqua_id']); // chú dòng này nếu có lỗi
            $this->render('/Elements/giaithuong_loto');
        }
    }

    public function delete_all()
    {
        $this->autoRender = false;
        $this->layout = false;
        if ($this->Session->read('Session.bang') === -1) {
            $option = array(
                'Giaithuong.date' => $this->Session->read('Session.date'),
            );
        } else {
            $option = array(
                'Giaithuong.bang' => $this->Session->read('Session.bang'),
                'Giaithuong.date' => $this->Session->read('Session.date'),
            );
        }
        $result = $this->Giaithuong->deleteAll($option, false);
        return $this->redirect(
            array('controller' => 'ketquas', 'action' => 'index')
        );
    }

    public function view()
    {
        if($this->request->is('ajax'))
        {
            $this->autoRender = false;
            $this->layout = false;
            $data = $this->request->data;
            
            // $result = $this->Giaithuong->delete($data['giaithuong_id']);
            // $giai_thuongs = $this->Giaithuong->find('all',array(
            //     'conditions' => array(
            //         'Giaithuong.ketqua_id' => $data['ketqua_id'],
            //         'Giaithuong.bang' => 1,
            //         'Giaithuong.date' => $data['date']
            //         )
            //     ) );
            // $this->set('date',$data['date']);
            // $this->set(compact('giai_thuongs'));
            // $this->set('ket_qua_id', $data['ketqua_id']); // chú dòng này nếu có lỗi
            // $this->render('/Elements/giaithuong_loto');
        }
    }

}
