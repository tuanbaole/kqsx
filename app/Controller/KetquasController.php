<?php
App::uses('AppController', 'Controller');
/**
 * Ketquas Controller
 *
 * @property Ketqua $Ketqua
 * @property PaginatorComponent $Paginator
 */
class KetquasController extends AppController 
{

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function index() 
    {
        $this->loadModel('Loto');
        $today = date("Y-m-d");
        $lastday = date("Y-m-d",strtotime('-1 day'));
        $ketqua = $this->Ketqua->find('first',array(
            'conditions' => array('Ketqua.date' => $today),
            'fields' => array('Ketqua.id','Ketqua.dacbiet','Ketqua.nhat','Ketqua.nhi','Ketqua.ba','Ketqua.tu','Ketqua.nam','Ketqua.sau','Ketqua.bay')
        ));
        if (empty($ketqua)) {
            $ketqua = $this->Ketqua->find('first',array(
                'conditions' => array('Ketqua.date' => $lastday),
                'fields' => array('Ketqua.id','Ketqua.dacbiet','Ketqua.nhat','Ketqua.nhi','Ketqua.ba','Ketqua.tu','Ketqua.nam','Ketqua.sau','Ketqua.bay')

            ));
            $date = $lastday;
        } else {
            $date = $today;
        }

        $lotos = $this->Loto->find('all',array(
                'conditions' => array(
                    'Loto.date' => $date
                ),
                'order' => array('Loto.loto ASC'),
                'fields' => array('Loto.id','Loto.ketqua_id','Loto.loto','Loto.dau','Loto.dit','Loto.dacbiet','Loto.giai','Loto.date')
            ) );

        $daus = $dits = $lotos;

        for ($i=0; $i < 10; $i++) { 
            if (!isset($loto_daus[$i])) $loto_daus[$i] = array();
            if (!isset($loto_dits[$i])) $loto_dits[$i] = array();
            foreach ($daus as $key_dau => $value_dau) {
                if ($value_dau['Loto']['dau'] == $i) {
                    $loto_daus[$i][] = $value_dau;
                    unset($daus[$key_dau]);
                }
            }
            foreach ($dits as $key_dit => $value_dit) {
                if ($value_dit['Loto']['dit'] == $i) {
                    $loto_dits[$i][] = $value_dit;
                    unset($dits[$key_dit]);
                }
            }
        }
        $check_string = array('dacbiet','nhat');
        $id = $ketqua['Ketqua']['id'];
        unset($ketqua['Ketqua']['id']);

        $this->loadModel('Giaithuong');
        $giai_thuongs = $this->Giaithuong->find('all',array(
            'conditions' => array(
                'Giaithuong.ketqua_id' => $id,
                'Giaithuong.bang' => 1,
                'Giaithuong.date' => $date
                )
            ) );
        $this->set(compact('ketqua','date','id','check_string','lotos','loto_daus','loto_dits','giai_thuongs'));
    }

	public function update_today() 
    {
		$data = file_get_contents('http://xskt.com.vn/rss-feed/mien-bac-xsmb.rss');
		$xml_source = str_replace(array("&amp;", "&"), array("&", "&amp;"), $data);
    	$x = simplexml_load_string($xml_source);
    	$find = array("ĐB:","1:","2:","3:","4:","5:","6:","7:");
		$replace = array("kq","kq","kq","kq","kq","kq","kq","kq");
		$data = $x->channel->item;
		$description = explode("kq",str_replace($find,$replace,$data->description));
		$date = pathinfo(basename($data->link),PATHINFO_FILENAME);
		$this->loadModel('Loto');
		if(isset($description[2])) 
        {
			$kq['nhat'] = trim($description[2]);
		} 
        else 
        {
			$kq['nhat'] = NULL;
		}
		if(isset($description[3])) 
        {
			$kq['nhi'] 	= json_encode(explode('-', $description[3]));
		} 
        else 
        {
			$kq['nhi'] 	= NULL;
		}
		if(isset($description[4])) 
        {
			$kq['ba'] 	= json_encode(explode('-', $description[4]));
		} 
        else 
        {
			$kq['ba'] 	= NULL;
		}
		if(isset($description[5])) 
        {
			$kq['tu'] 	= json_encode(explode('-', $description[5]));
		} 
        else 
        {
			$kq['tu'] 	= NULL;
		}
		if(isset($description[6])) 
        {
			$kq['nam'] 	= json_encode(explode('-', $description[6]));
		} 
        else 
        {
			$kq['nam'] 	= NULL;
		}
		if(isset($description[7])) 
        {
			$kq['sau'] 	= json_encode(explode('-', $description[7]));
		} 
        else 
        {
			$kq['sau'] 	= NULL;
		}
		if(isset($description[8])) 
        {
			$kq['bay'] 	= json_encode(explode('-', $description[8]));
		} 
        else 
        {
			$kq['bay'] 	= NULL;
		}
		if(isset($description[1])) 
        {
			$kq['dacbiet'] 	= trim($description[1]);	
		} 
        else 
        {
			$kq['dacbiet'] 	= NULL;
		}
		$kq['date'] = date("Y-m-d",strtotime($date));
		$kt_kq	= $this->Ketqua->findByDate($kq['date']);
		$return_loto = false;
		if (empty($kt_kq)) 
        {
			$this->Ketqua->create();
			$ketqua = $this->Ketqua->save($kq);
		} 
        else 
        {
			$check_up = $this->Ketqua->find('first',array(
					'conditions' => array(
						'Ketqua.date' => $kq['date'],
						'Ketqua.nhat IS NOT NULL',
						'Ketqua.nhi IS NOT NULL',
						'Ketqua.ba IS NOT NULL',
						'Ketqua.tu IS NOT NULL',
						'Ketqua.nam IS NOT NULL',
						'Ketqua.sau IS NOT NULL',
						'Ketqua.bay IS NOT NULL',
						'Ketqua.dacbiet IS NOT NULL'
						)
					));
			if (empty($check_up)) 
            {
				if (!$this->Ketqua->exists($kt_kq['Ketqua']['id'])) 
                {
					throw new NotFoundException(__('Invalid order'));
				}
				$this->Ketqua->id = $kt_kq['Ketqua']['id'];
				$ketqua = $this->Ketqua->save($kq);
			} 
            else 
            {
				$ketqua = true;
			}
            $lotos = array();
            $i = 0;
            /* nhat */
            $lotos += $this->get_loto_string($kq['nhat'],$kt_kq['Ketqua']['id'],0,1,$kq['date'],$i);
            $i++;
            /* nhat */
            /* nhi */
            $nhi = $this->get_loto($kq['nhi'],$kt_kq['Ketqua']['id'],0,2,$kq['date'],$i);
            $lotos += $nhi['loto'];
            $i = $nhi['i'];
            /* nhi */
            /* ba */
            $ba = $this->get_loto($kq['ba'],$kt_kq['Ketqua']['id'],0,3,$kq['date'],$i);
            $lotos += $ba['loto'];
            $i = $ba['i'];
            /* ba */
            /* tu */
            $tu = $this->get_loto($kq['tu'],$kt_kq['Ketqua']['id'],0,4,$kq['date'],$i);
            $lotos += $tu['loto'];
            $i = $tu['i'];
            /* tu */
            /* nam */
            $nam = $this->get_loto($kq['nam'],$kt_kq['Ketqua']['id'],0,5,$kq['date'],$i);
            $lotos += $nam['loto'];
            $i = $nam['i'];
            /* nam */
            /* sau */
            $sau = $this->get_loto($kq['sau'],$kt_kq['Ketqua']['id'],0,6,$kq['date'],$i);
            $lotos += $sau['loto'];
            $i = $sau['i'];
            /* sau */
            /* bay */
            $bay = $this->get_loto($kq['bay'],$kt_kq['Ketqua']['id'],0,7,$kq['date'],$i);
            $lotos += $bay['loto'];
            $i = $bay['i'];
            /* bay */
            $lotos += $this->get_loto_string($kq['dacbiet'],$kt_kq['Ketqua']['id'],1,8,$kq['date'],$i);
            $delete = $this->Loto->deleteAll(array('Loto.date' => $kq['date']), false);
            $return_loto = $this->Loto->saveAll($lotos);
		}
        if ($ketqua && $return_loto) 
        {
            return true;
        } 
        else 
        {
            return false;
        }

	}

	public function update()
    {
		$this->layout = false;
		$this->autoRender = false;
        $this->loadModel('Loto');
		$data = file_get_contents('http://xskt.com.vn/rss-feed/mien-bac-xsmb.rss');
		$xml_source = str_replace(array("&amp;", "&"), array("&", "&amp;"), $data);
    	$x = simplexml_load_string($xml_source);
    	$find = array("ĐB:","1:","2:","3:","4:","5:","6:","7:");
		$replace = array("kq","kq","kq","kq","kq","kq","kq","kq");
		$i = 0;
		$kq = array();
    	foreach ($x->channel->item as $key => $value) 
        {
    		$description = explode("kq",str_replace($find,$replace,$value->description));
    		$date = pathinfo(basename($value->link),PATHINFO_FILENAME);
    		if (isset($description[2])) 
            {
    			$kq[$i]['nhat'] = trim($description[2]);
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[3])) 
            {
    			$kq[$i]['nhi'] 	= json_encode(explode('-', $description[3]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[4])) 
            {
    			$kq[$i]['ba'] 	= json_encode(explode('-', $description[4]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[5])) 
            {
    			$kq[$i]['tu'] 	= json_encode(explode('-', $description[5]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[6])) 
            {
    			$kq[$i]['nam'] 	= json_encode(explode('-', $description[6]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[7])) 
            {
    			$kq[$i]['sau'] 	= json_encode(explode('-', $description[7]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[8])) 
            {
    			$kq[$i]['bay'] 	= json_encode(explode('-', $description[8]));
    		} 
            else 
            {
    			continue;
    		}
    		if (isset($description[1])) 
            {
    			$kq[$i]['dacbiet'] 	= trim($description[1]);
    		} 
            else 
            {
    			continue;
    		}
    		$kq[$i]['date'] 	= $xml_date[$i] = date("Y-m-d", strtotime($date) );
    		$i++;
    	}
    	krsort($kq);
	    $find_date = $this->Ketqua->find('list',array(
	    			'conditions' => array(
	    				'Ketqua.date' => $xml_date
	    				),
	    			'fields' => array('Ketqua.id','Ketqua.date')
	    		));
    	foreach ($kq as $key_kq => $value_kq) 
        {
    		if (in_array($value_kq['date'], $find_date)) 
            {
    			unset($kq[$key_kq]);
    		}
    	}
    	if (!empty($kq)) 
        {
    		$ketqua = $this->Ketqua->saveAll($kq);
    	} 
        else 
        {
    		$ketqua = true;
    	}
        $this->Loto->deleteAll(array('Loto.date' => $xml_date),false);
        $find_loto = $this->Loto->find('list',array(
            'conditions' => array(
                'Loto.date' => $xml_date
                ),
            'fields' => array('Loto.id','Loto.ketqua_id')
            ));
    	$up_loto = $this->Ketqua->find('all',array(
	    			'conditions' => array(
	    				'Ketqua.date' => $xml_date,
                        'Ketqua.id !=' => $find_loto
	    				)
	    		));
        $lotos = array();
    	if (!empty($up_loto)) 
        {
    		$i = 0;
    		foreach ($up_loto as $key_up_loto => $value_up_loto) 
            {
    			/* nhat */
                $nhat[$key_up_loto] = $this->get_loto_string($value_up_loto['Ketqua']['nhat'],$value_up_loto['Ketqua']['id'],0,1,$value_up_loto['Ketqua']['date'],$i);
                $lotos += $nhat[$key_up_loto];
                // pr($nhat[$key_up_loto]);
    			$i++;
                // pr($lotos);
                // die();
    			/* nhat */
    			/* nhi */
    			$nhi[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['nhi'],$value_up_loto['Ketqua']['id'],0,2,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $nhi[$key_up_loto]['loto'];
    			$i = $nhi[$key_up_loto]['i'];
    			/* nhi */
    			/* ba */
    			$ba[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['ba'],$value_up_loto['Ketqua']['id'],0,3,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $ba[$key_up_loto]['loto'];
    			$i = $ba[$key_up_loto]['i'];
    			/* ba */
    			/* tu */
    			$tu[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['tu'],$value_up_loto['Ketqua']['id'],0,4,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $tu[$key_up_loto]['loto'];
    			$i = $tu[$key_up_loto]['i'];
    			/* tu */
    			/* nam */
    			$nam[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['nam'],$value_up_loto['Ketqua']['id'],0,5,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $nam[$key_up_loto]['loto'];
    			$i = $nam[$key_up_loto]['i'];
    			/* nam */
    			/* sau */
    			$sau[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['sau'],$value_up_loto['Ketqua']['id'],0,6,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $sau[$key_up_loto]['loto'];
    			$i = $sau[$key_up_loto]['i'];
    			/* sau */
    			/* bay */
    			$bay[$key_up_loto] = $this->get_loto($value_up_loto['Ketqua']['bay'],$value_up_loto['Ketqua']['id'],0,7,$value_up_loto['Ketqua']['date'],$i);
    			$lotos += $bay[$key_up_loto]['loto'];
    			$i = $bay[$key_up_loto]['i'];
    			/* bay */
                /* dacbiet */
                $lotos += $this->get_loto_string($value_up_loto['Ketqua']['dacbiet'],$value_up_loto['Ketqua']['dacbiet'],1,8,$value_up_loto['Ketqua']['date'],$i);
                 /* dacbiet */
                $i++;
    		}
    	}
        
    	if (!empty($lotos)) 
        {
    		$loto = $this->Loto->saveAll($lotos);
    		if ($loto && $ketqua) 
            {
    			$result = true;
    		} 
            else 
            {
    			$result = false;
    		}
    	} 
        else 
        {
    		$result = $ketqua;
    	}
    	
    	return $result;
	}

	private function get_loto($json,$ketqua_id,$dacbiet,$giai,$date,$i) 
    {
		$array = json_decode($json);
		$lotos = array();
		if (!empty($array)) 
        {
			foreach ($array as $key => $value) 
            {
				$lotos[$i]['ketqua_id'] = $ketqua_id;
    			$lotos[$i]['loto'] 		= substr( trim($value), -2 );
    			$lotos[$i]['dau'] 		= substr( trim($value), -2,-1 );
    			$lotos[$i]['dit'] 		= substr( trim($value), -1 );
    			$lotos[$i]['dacbiet'] 	= $dacbiet;
    			$lotos[$i]['giai'] 		= $giai;
    			$lotos[$i]['date'] 		= $date;
    			$i++;
			}
		}	
		$result['i'] = $i;
		$result['loto'] = $lotos; 
		return $result;
	}

    private function get_loto_string($value,$ketqua_id,$dacbiet,$giai,$date,$i) 
    {
        $lotos[$i]['ketqua_id']     = $ketqua_id;
        $lotos[$i]['loto']          = substr( trim($value), -2 );
        $lotos[$i]['dau']           = substr( trim($value), -2,-1 );
        $lotos[$i]['dit']           = substr( trim($value), -1 );
        $lotos[$i]['dacbiet']       = $dacbiet;
        $lotos[$i]['giai']          = $giai;
        $lotos[$i]['date']          = $date;
        return $lotos;
    }

    public function cap_nhat_tat_ca()
    {
        $this->layout = false;
        $this->autoRender = false;
        $return = $this->update();
        if ($return) {
            $this->Session->setFlash(__('Cập nhật thành công kết quả !'),'default',array('class' => 'alert alert-success') );
        } else {
            $this->Session->setFlash(__('Cập nhật thất bại kết quả !'),'default',array('class' => 'alert alert-danger') );
        }
        return $this->redirect(
            array('controller' => 'ketquas', 'action' => 'index')
        );
    }

    public function cap_nhat_hom_nay()
    {
        $this->layout = false;
        $this->autoRender = false;
        $return = $this->update_today();
        if ($return) {
            $this->Session->setFlash(__('Cập nhật thành công kết quả !'),'default',array('class' => 'alert alert-success') );
        } else {
            $this->Session->setFlash(__('Cập nhật thất bại kết quả !'),'default',array('class' => 'alert alert-danger') );
        }
        return $this->redirect(
            array('controller' => 'ketquas', 'action' => 'index')
        );
    }

    public function nhapvao()
    {
        if($this->request->is('ajax'))
        {
            $this->autoRender = false;
            $data = $this->request->data;
            $this->loadModel('Loto');
            $this->loadModel('Giaithuong');
            $so_nhay = $this->Loto->find('count',array(
                'conditions' => array(
                    'Loto.date' => $data['date'],
                    'Loto.loto' => $data['loto'] 
                    )
                ) );
            $giai_thuong['loto'] = $data['loto'];
            $giai_thuong['diem'] = $data['diem'];
            $giai_thuong['so_nhay'] = $so_nhay;
            $giai_thuong['tong_diem_trung'] = $so_nhay * $data['diem'];
            $giai_thuong['date'] = $data['date'];
            $giai_thuong['tien_danh'] = $data['diem'] * $data['gia_diem'];
            $giai_thuong['tien_trung'] = $data['diem'] * $data['gia_trung'] * $so_nhay;
            $giai_thuong['trang_thai'] = 1;
            $giai_thuong['gia_diem'] = $data['gia_diem'];
            $giai_thuong['gia_trung'] = $data['gia_trung'];
            $giai_thuong['ketqua_id'] = $data['ketqua_id'];
            $giai_thuong['bang'] = 1;
            $giai_thuong['so_du'] = $giai_thuong['tien_danh'] - $giai_thuong['tien_trung'];
            $this->Giaithuong->create();
            $ht_giai_thuong = $this->Giaithuong->save($giai_thuong);
            pr($ht_giai_thuong);
        }
    }

    public function delete_giaithuong(){

    }

}
