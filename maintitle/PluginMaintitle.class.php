<?php
/*
 * Плагин замены тайтла по умолчанию на главной странице (и страницах списка топиков)
 * Автор: Hangglider
 * Профиль: http://livestreet.ru/profile/HangGlider/
 * Сайт: http://sergeymarin.com
 */

if (!class_exists('Plugin')) {
	die('Hacking attemp!');
}

class PluginMaintitle extends Plugin {

	public $aDelegates = array();

	public $aInherits=array(
            'action' => array('ActionIndex'=>'PluginMaintitle_ActionIndex')
    );
    
    /*
	// Не надо ничего активировать
	public function Activate() {
		return true;
	}
    
	// ... и деактивировать
	public function Deactivate(){
        return true;
    }


	// и даже инициализировать
	public function Init() {
	
	}
    *
    */
}