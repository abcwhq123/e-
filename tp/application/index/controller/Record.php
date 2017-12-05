<?php 


namespace app\index\controller;
use think\Controller;
use app\index\model\Paylist;

/**
* 交易
*/
class Record extends Controller
{
	/*
	投资中数据
	 */
	public function invest() {
		//实例化投资记录model
		$payList = new Paylist;
		//获取当前用户id
		$user_id = 1;
		//根据用户id查询记录
		$data = $payList->show('user_id='.$user_id);
		//投资中数据
		$investmentData = $this->data($data, $user_id);
		return view('invest', [
			'list' => $investmentData,
		]);
	}

	/*
	循环组装投资中数据
	 */
	protected function data($data, $user_id){
		foreach ($data as $k => $v) {
			if (time() - $data[$k]['pay_time'] < 3600*30) {
				$arr[$k] = $v;
				$arr[$k]['pay_time'] = date('Y-m-d H:i:s', $data[$k]['pay_time']); 
			}
		}
		return $arr;
	}

	/*
	查看更多
	 */
	public function more(){
		// 获取当前页
		$page = input('page');
		$limit = input('limit');
		//获取用户id
		$user_id = 1;
		//分页数据
		$pageData = $this->pageData($page, $user_id);
		echo json_encode($pageData);
	}

	/*
	获取分页数据
	 */
	protected function pageData($page, $user_id){
		$payList = new Paylist;
		$arr = $payList->page_demo($page, $user_id);
		$pageData = [
			'info' => $this->data($arr['info'], $user_id),
			'page' => $arr['page'],
			'page_num' => $arr['page_num']
		];
		return $pageData;
	}



/********************************************************************************************/


	/*
	回款中
	 */
	public function repayments(){
		//实例化投资记录model
		$payList = new Paylist;
		//获取当前用户id
		$user_id = 1;
		//根据用户id查询记录
		$data = $payList->show('user_id='.$user_id);
		//投资中数据
		$repaymentsData = $this->repaymentsData($data, $user_id);
		return view('repayments', [
			'list' => $repaymentsData,
		]);
	}

	/*
	循环组装回款中数据
	 */
	protected function repaymentsData($data, $user_id){
		foreach ($data as $k => $v) {
			if (time() - $data[$k]['pay_time'] >= 3600*30) {
				$arr[$k] = $v;
				$arr[$k]['pay_time'] = date('Y-m-d H:i:s', $data[$k]['pay_time']); 
			}
		}
		return $arr;
	}




// /********************************************************************************************/


// 	/*
// 	已完成
// 	 */
// 	public function out(){
// 		return view('out');
// 	}
}

