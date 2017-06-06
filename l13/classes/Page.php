<?php

class Page{
    function __construct()
	{
		
	}
    
    public function actionNotFound(){
        echo "Дана сторінка не існує";
        return true;
    }
}