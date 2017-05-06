<?php

/**
* 
*/
class User 
{
	
	function __construct()
	{
		
	}

	public function actionIndex($id){
		require ROOT."/views/header.php";
		echo "Сторінка виводу всіх користувачів $id";
		require ROOT."/views/footer.php";
		return true;
	}

	public function actionCreate(){
		echo "Сторінка створення користувача";
		return true;
	}

	public function actionEdit(){
		echo "Сторінка редагування користувача";
		return true;
	}

	public function actionDelete(){
		echo "Сторінка видалення користувача";
		return true;
	}

	public function actionAuthorization(){
		echo "Сторінка авторизації користувача";
		return true;
	}

	public function actionRegistration(){
		echo "Сторінка реєстрації користувача";
		return true;
	}

}

