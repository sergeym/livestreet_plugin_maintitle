<?php
/*
 * Плагин замены тайтла по умолчанию на главной странице (и страницах списка топиков)
 * Автор: Hangglider
 * Профиль: http://livestreet.ru/profile/HangGlider/
 * Сайт: http://sergeymarin.com
 */

$config=array();

// true - заменять ТОЛЬКО заголовок на главной странице. На документах постраничной разбивки заголовок останется по умолчанию. 
$config['mainonly']=false;

// true - для каждой страницы свой заголовк (от первого поста на этой странице)
// false - у всех страниц заголовок как на главной
$config['separate']=true;

return $config;