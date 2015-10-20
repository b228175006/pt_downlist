<?php 
namespace Home\Controller;
use Think\Controller;
/**
 * 后台登录控制器
 */
Class LoginController extends Controller{
	//登录页面视图
	Public function index(){
		// $rand = rand(1,4);
		// $bg = 'bg'.$rand.'.jpg';
		// switch ($rand) {
		// 	case '1':
		// 		$color = '#240d21';
		// 		# code...
		// 		break;
		// 	case '2':
		// 		$color = '#e7eaef';
		// 		# code...
		// 		break;
		// 	case '3':
		// 		$color = '#011240';
		// 		# code...
		// 		break;
		// 	case '4':
		// 		$color = '#1c1912';
		// 		# code...
		// 		break;	˜
		// 	default:
		// 		$color = '#FFF';˜
		// 		break;
		// }
		// $this->assign('color',$color);
		// $this->assign('bg',$bg);
		$this->display();

	}

	//验证码
	Public function verify(){
		$config =    array(
		    'fontSize'    =>    19,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		    // 'useNoise'    =>    false, // 关闭验证码杂点
		);
		
		// 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
		$Verify->useImgBg = true;
		$Verify = new \Think\Verify($config);
		// ob_end_clean();
		$Verify->entry();
		// import('ORG.Util.Image');
		// Image::buildImageVerify();
	}

	//登录验证
	Public function login(){
		if (!IS_POST) E('无效的页面');
		// $Verify = new \Think\Verify();
		//if(!$Verify->check($code)) $this->error('验证码错误');

		 $db=M('user');
		 $user=$db->where(array('username'=>I('username')))->find();
		 if (!$user || $user['psw'] != I('password','',md5)) {
		 	$this->error('账号或密码错误');
		 }
		 //更新最后一次登录时间及IP
		//  $data=array(
		//  	'id'=>$user['id'],
		//  	'logintime' => time(),
		//  	'loginip'=> get_client_ip()
		//  	);
		// $db->save($data);

		session('uid',$user['id']);
		session('username',$user['username']);
		session('name',$user['nikename']);
		session('logintime',date('Y-m-d H:i:s',$user['logintime']));
		session('loginip',$user['loginip']);
		if ($user['isdown'] == '1') {
			session('isdown','1');
		}else{
			session('isdown','0');
		}
		if ($user['pid'] == '1') {
			session('pid','1');
		}else{
			session('pid','0');
		}
		$this->redirect('/Home/Index/index');
	}

	//登出
	Public function loginout(){
		session(null);
		$this->success('您已安全退出', U('/Home/Login/index'));
			// $code = I('verify');
		}
	//注册
	public function zhuce()	
	{
		$this->display();
	}
	//注册表单
	public function zhucebiao()	
	{
		$db = M('user');
		$where=array('username'=>I('username'));
				$result=$db->where($where)->order('id DESC')->select();
				if($result){
					$this->error('此用户名已注册');
				}
				if(I('password','',md5)==I('password2','',md5)){
					$password = I('password','',md5);
				}else{
					$this->error('两次密码输入不一致');
				}
		$data = array(
			'pid' => 0,
			'username' => I('username'),
			'psw' => $password,
			'nikename' => I('nikename'),
			'tel' => I('tel')
			);
		$result = $db->data($data)->add();
		if ($result) {
			$this->success('注册成功，平台授权后可以下单',U('/Home/Index/index'));
		}else{
			$this->error('注册失败');
		}
	}
	//客户授权
	public function isdown()
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
			$db = M('user');
			
			$result = $db->select();

			$this->assign('result',$result);
			$this->assign('needisdown',$isdown);
			$this->assign('needpid',$pid);
			$this->display();
		}	
	//客户授权表单
	public function addisdown()	
	{
		$db = M('user');
    	$where = array(
    		'id'=>I('id')
    		);
    	$data = array(
    		'isdown' => I('isdown')
    		);
    	$result = $db->where($where)->data($data)->save();
    	if ($result) {
    		$this->success('修改成功',U('/Home/Login/isdown'));
    	}else{
    		$this->error('修改失败');
    	}
	}
}
?>
