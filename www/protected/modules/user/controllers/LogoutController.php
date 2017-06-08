<?php

class LogoutController extends SBaseController // Controller
{
	public $defaultAction = 'logout';
	public $breadcrumbs=array();
	public $menu=array();
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
	}

}