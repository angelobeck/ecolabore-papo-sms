<?php

class eclApp_integrationPapoSMS_config
{ // class eclApp_integrationPapoSMS_config

static function is_child ($parent, $name)
{ // function is_child
if ($name == 'config')
return true;

return false;
} // function is_child

static function get_menu_type ()
{ // function get_menu_type
return 'section';
} // function get_menu_type

static function get_children_names ()
{ // function get_children_names
return array ('config');
} // function get_children_names

static function constructor_helper ($me)
{ // function constructor_helper
global $store;
$me->data = $store->control->read ('integrationPapoSMS_config_content');
$me->access = 4;
} // function constructor_helper

static function dispatch ($document)
{ // function dispatch
global $io, $store;
$me = $document->application;

$data = [];
if(defined ('INTEGRATION_SMS_ENABLE') and defined ('INTEGRATION_SMS_SERVER') and INTEGRATION_SMS_ENABLE and INTEGRATION_SMS_SERVER == 'integrationPapoSMS')
$data['sms_enable'] = 1;

$formulary = $document->createFormulary ('integrationPapoSMS_config_edit', $data);

if ($formulary->command ('save') and $formulary->save ())
{ // save
if (isset ($formulary->data['sms_enable']))
{ // enable papo service
$io->systemConstants->set ('INTEGRATION_SMS_ENABLE', true);
$io->systemConstants->set ('INTEGRATION_SMS_SERVER', 'integrationPapoSMS');
} // enable papo service
else
{ // disable papo service
$io->systemConstants->set ('INTEGRATION_SMS_ENABLE', false);
} // disable papo service

$document->mod->humperstilshen->alert ('system_msg_alertDataUpdated');
} // save

$document->mod->formulary = $formulary;
} // function dispatch

} // class eclApp_integrationPapoSMS_config

?>