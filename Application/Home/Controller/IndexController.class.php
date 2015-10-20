<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
    	if (session('pid') == 1) {
    		$pid = 'blonk';
    	}else{
    		$pid = 'none';
    	}
    	if (session('isdown') == 1) {
    		$isdown = 'blonk';
    	}else{
    		$isdown = 'none';
    	}
    	$this->assign('needisdown',$isdown);
    	$this->assign('needpid',$pid);
        $this->display();
    }
    //首页下单处理
    public function downlist()
    {	
    	$db = M('order');
		$data = array(
			'uid' => session('uid'),
			'u_sj' => I('u_sj'),
			'u_tel' => I('u_tel'),
			'u_address' => I('u_address'),
			'u_num' => I('u_num'),
			'u_size' => I('u_size'),
			'u_color' => I('u_color'),
			'mid' => 0,
			'num' => 0,
			'addtime'=>time()
			);
		$result = $db->data($data)->add();
		if ($result) {
			$this->success('下单成功',U('/Home/Index/index'));
		}else{
			$this->error('下单失败');
		}
    }
    //订单查询
    public function downinfo()
    {
    	if (session('pid') == 1) {
    		$pid = 'blonk';
    	}else{
    		$pid = 'none';
    	}
    	if (session('isdown') == 1) {
    		$isdown = 'blonk';
    	}else{
    		$isdown = 'none';
    	}
    	$db = M('order');
    	$where = array(
    		'uid' => session('uid')
    		);
    	$result = $db->where($where)->select();

    	$this->assign('result',$result);
    	$this->assign('needisdown',$isdown);
    	$this->assign('needpid',$pid);
    	$this->display();
    }
    //订单处理
    public function downupdata()
    {
    	if (session('pid') == 1) {
    		$pid = 'blonk';
    	}else{
    		$pid = 'none';
    	}
    	if (session('isdown') == 1) {
    		$isdown = 'blonk';
    	}else{
    		$isdown = 'none';
    	}
    	$db = M('order');
    	
    	$result = $db->select();

    	$this->assign('result',$result);
    	$this->assign('needisdown',$isdown);
    	$this->assign('needpid',$pid);
    	$this->display();
    }
    //添加运单号
    public function addyundan()
    {
    	$db = M('order');
    	$where = array(
    		'id'=>I('id')
    		);
    	$data = array(
    		'num' => I('num')
    		);
    	$result = $db->where($where)->data($data)->save();
    	if ($result) {
    		$this->success('发货成功',U('/Home/Index/downupdata'));
    	}else{
    		$this->error('发货失败');
    	}
    }
    //平台是否受理
    public function addpingtai()
    {
    	$db = M('order');
    	$where = array(
    		'id'=>I('id')
    		);
    	$data = array(
    		'mid' => I('mid')
    		);
    	$result = $db->where($where)->data($data)->save();
    	if ($result) {
    		$this->success('修改成功',U('/Home/Index/downupdata'));
    	}else{
    		$this->error('修改失败');
    	}
    }
}