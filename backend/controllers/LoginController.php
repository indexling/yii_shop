<?php
namespace backend\controllers;		

use Yii;
use yii\web\Controller;				
use app\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Session;

class LoginController extends Controller
{
	public $enableCsrfValidation = false;

	/**
	 * 登录
	 * @return [type] [description]
	 */
	public function actionLogin()
	{
		$request = Yii::$app->request;
		$session = Yii::$app->session;
		if($request->isPost)
		{
			$user = $request->post();
			$userObj = User::find()->where(['username'=>$user['username'], 'password'=>$user['password']])->asArray()->one();
			//var_dump($userObj);
			if(!empty($userObj))
			{
				$time = date("Y/m/d H:i:s");
				/*$userMsg = User::updateAll(['time'=>$time])->where(['uid'=>$userObj['uid']])->asArray()->one();*/
				/*$userMsg->time = date("Y/m/d H:i:s");*/
				/*$userMsg = Yii::$app->db->createCommand()->update("user",['time'=>$time])->where(['uid'=>$userObj['uid']])->execute();
				var_dump($userMsg);die;*/
				$session->set('uid', $userObj['uid']);
				$session->set('username', $userObj['username']);
				return $this->redirect('?r=login/show');
			}
			else
			{
				echo "<script>alert('登录失败');location.href='?r=login/login';</script>";
			}
		}
		else
		{
			return $this->render('login');
		}
	}


	/**
	 * 信息展示
	 * @return [type] [description]
	 */
	public function actionShow()
	{
		$request = Yii::$app->request;
		$session = Yii::$app->session;
		$uid = $session->get('uid');
		$query = (new \yii\db\Query())		//用户权限
				//->select()
				->from('u_c')
				->leftJoin('user', 'user.uid = u_c.uid')
				->leftJoin('categary as c', 'c.cid = u_c.cid')
				->where(['u_c.uid'=>$uid])
				->all();
		//var_dump($query);die;
		if(!empty($query))
		{
			$uTime = User::find()->select('uid, time, username')->asArray()->all();
			//var_dump($uTime);die;
			return $this->render('show', ['mess'=>$query, 'time'=>$uTime]);
		}
	}


	/**
	 * 退出
	 * @return [type] [description]
	 */
	public function actionOutlogin()
	{
		$out = Yii::$app->session->remove('username');
		if($out)
		{
			return $this->redirect('?r=login/login');
		}
	}


}