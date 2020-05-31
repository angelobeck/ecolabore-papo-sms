<?php

class eclApp_integrationPapoSMS_test
{ // class eclApp_integrationPapoSMS_test

static function is_child ($parent, $name)
{ // function is_child
if(!defined('INTEGRATION_SMS_ENABLE') or !INTEGRATION_SMS_ENABLE or INTEGRATION_SMS_SERVER != 'integrationPapoSMS')
return false;

if ($name == 'test')
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

return ['test'];
} // function get_children_names

static function constructor_helper ($me)
{ // function constructor_helper
global $store;
$me->data = $store->control->read ('integrationPapoSMS_test_content');
$me->access = 4;
} // function constructor_helper

static function dispatch ($document)
{ // function dispatch
global $io, $store;
$me = $document->application;

$formulary = $document->createFormulary ('integrationPapoSMS_test_edit');

if ($formulary->command ('save') and $formulary->save ())
{ // save
print_a ($io->sms->send($formulary->data));


} // save

$document->mod->formulary = $formulary;
} // function dispatch

} // class eclApp_integrationPapoSMS_test

?>