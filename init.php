<?
AddEventHandler('tasks', 'onBeforeTaskAdd', 'CheckTitle');

function CheckTitle(&$fields) {

    if(strpos($fields['TITLE'],'#ACTION') !== false){
        if(strpos($fields['DESCRIPTION'],'copyThisTask') !== false){
            //копировать 
        }
        if(strpos($fields['DESCRIPTION'],'addAdmin') !== false){
            $fields['ACCOMPLICES'] = array(1);
        }
    }else{
        $GLOBALS['APPLICATION']->throwException('Вы не указали #ACTION в названии задачи.');
        return false;
    }
}

?>