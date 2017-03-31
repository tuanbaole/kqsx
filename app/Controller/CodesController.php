<?php
App::uses('AppController', 'Controller');
/**
 * Codes Controller
 *
 * @property Code $Code
 * @property PaginatorComponent $Paginator
 */
class CodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() 
	{
		$this->layout = 'layout2';
		$code = $this->Code->find('first');
		if (!empty($code)) 
		{
			if( $code['Code']['date'] >= date('Y-m-d') ) 
			{
				$this->Session->write('Session.dueDate',1);
				return $this->redirect(  array('controller' => 'ketquas', 'action' => 'index') );
			}
			else 
			{
				$this->Session->delete('Session.dueDate');
			}
		} 
		else 
		{
			$data['code'] = '0123456789';
			$data['date'] = date('Y-m-d');
			$this->Code->create();
			$this->Code->save($data);
		}
	}

	public function activeToolCurl()
    {
        $this->autoRender = false;
        $data = $this->request->data;
        // URL có chứa hai thông tin name và diachi
        // $url = 'http://kqxsdev-vni.rhcloud.com/inputKey.php?code=5096356160';
        $url = 'http://kqxsdev-vni.rhcloud.com/inputKey.php?code='.$data['Active']['dueDate'];         
        // Khởi tạo CURL
        $ch = curl_init($url);
         
        // Thiết lập có return
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
         
        $result = curl_exec($ch);
         
        curl_close($ch);

        if ($result === "true") {
        	$today = date('Y-m-d');
        	$dueDate = date('Y-m-d',strtotime($today.' +1 month '));
        	$this->Code->updateAll(array('Code.date' => "'".$dueDate."'"),array('1'));
        	$this->Session->write('Session.dueDate',1);
            $this->Session->setFlash(__('Thanh toán thành công !Cảm ơn bạn đã sử dụng phần mềm của chúng tôi !'),'default',array('class' => 'alert alert-success') );
            return $this->redirect(  array('controller' => 'ketquas', 'action' => 'index') );
        } else {
            $this->Session->setFlash(__('Mã số thẻ đã được sử dụng hoặc không tồn tại ! vui lòng liên hệ số 01663153993.'),'default',array('class' => 'alert alert-danger') );
            return $this->redirect(  array('controller' => 'codes', 'action' => 'index') );
        };
    }

}
