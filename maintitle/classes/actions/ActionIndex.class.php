<?php
/*
 * Плагин замены тайтла по умолчанию на главной странице (и страницах списка топиков)
 * Автор: Hangglider
 * Профиль: http://livestreet.ru/profile/HangGlider/
 * Сайт: http://sergeymarin.com
 */

class PluginMaintitle_ActionIndex extends PluginMaintitle_Inherit_ActionIndex {

    protected function EventIndex() {
        
        // Если не используем кэш, то имеет смысл переписать этот модуль
        // заменив вызов родителя, инструкциями из него.

        parent::EventIndex();

        // Номер страницы.
        $iPage=$this->GetEventMatch(2) ? $this->GetEventMatch(2) : 1;
        // Менять тайтл только на главной странице.
        $bMainOnly=Config::Get('plugin.maintitle.mainonly');
        // Менять тайтлы на документах постраничной разбивки.
        $bSeparate=Config::Get('plugin.maintitle.separate');

        // если надо менять только главную, а мы не на главной ...
        if ($bMainOnly==true and $iPage>1) {
            return; // ...уходим
        }

        // если НЕ активированы изменения тайтлов для документов постраничной разбивки...
        if ($bSeparate==false) {
            $iPage=1; // ...сброс на первую страницу. На всех страницах будет заголовок с главной
        }

        // повторно запросим список постов для нашей страницы. Скорее всего из кэша.
        $aResult=$this->Topic_GetTopicsGood($iPage,Config::Get('module.topic.per_page'));
		$aTopics=$aResult['collection'];
        
        if (count($aTopics)>0) {
            $eFirstTopic=reset($aTopics); // выбираем первый элемент
            // и передаем его в заголовок
            $this->Viewer_AddHtmlTitle(htmlspecialchars($eFirstTopic->getTitle()));
        }
    }        
}