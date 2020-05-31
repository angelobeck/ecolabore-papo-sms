<?php

class eclApp_integrationPapoSMS_balance
{ // class eclApp_integrationPapoSMS_balance

static function is_child ($parent, $name)
{ // function is_child
if(!defined('INTEGRATION_SMS_ENABLE') or !INTEGRATION_SMS_ENABLE or INTEGRATION_SMS_SERVER != 'integrationPapoSMS')
return false;

if ($name == 'balance')
return true;

return false;
} // function is_child

static function get_menu_type ()
{ // function get_menu_type
return 'section';
} // function get_menu_type

static function get_children_names ()
{ // function get_children_names
if(!defined('INTEGRATION_SMS_ENABLE') or !INTEGRATION_SMS_ENABLE or INTEGRATION_SMS_SERVER != 'integrationPapoSMS')
return [];

return array ('balance');
} // function get_children_names

static function constructor_helper ($me)
{ // function constructor_helper
global $store;
$me->data = $store->control->read ('integrationPapoSMS_balance_content');
$me->access = 4;
} // function constructor_helper

static function dispatch ($document)
{ // function dispatch
global $io;

$document->mod->list = new eclMod_integrationPapoSMS_balance_values ($document);
} // function dispatch

} // class eclApp_integrationPapoSMS_balance

?>