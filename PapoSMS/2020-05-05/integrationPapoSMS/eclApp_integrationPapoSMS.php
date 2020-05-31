<?php

class eclApp_integrationPapoSMS
{ // class eclApp_integrationPapoSMS

static function is_child ($parent, $name)
{ // function is_child
if ($name != 'papo-sms')
return false;
if (SYSTEM_HOSTING_MODE == 0)
return true;
if ($parent->applicationName == 'adminIntegrations')
return true;

return false;
} // function is_child

static function get_menu_type ()
{ // function get_menu_type
return 'section';
} // function get_menu_type

static function get_children_names ($me)
{ // function get_children_names
if (SYSTEM_HOSTING_MODE == 0)
return array ('papo-sms');
if ($me->applicationName == 'adminIntegrations')
return array ('papo-sms');
if (defined ('INTEGRATION_SMS_MODE') and INTEGRATION_SMS_MODE > 1)
return array ('papo-sms');

return [];
} // function get_children_names

static function constructor_helper ($me)
{ // function constructor_helper
global $store, $system;
$me->data = $store->control->read ('integrationPapoSMS_content');
$me->map = ['integrationPapoSMS_config', 'integrationPapoSMS_test', 'integrationPapoSMS_balance'];
$me->groups = $system->groups;
$me->access = 4;
} // function constructor_helper

static function dispatch ($document)
{ // function dispatch
global $store;
$me = $document->application;

if(defined('INTEGRATION_SMS_ENABLE') and INTEGRATION_SMS_ENABLE and INTEGRATION_SMS_SERVER == 'integrationPapoSMS')
$document->dataMerge ('integrationPapoSMS_contentEnabled');
else
$document->dataMerge ('integrationPapoSMS_contentDisabled');

$document->mod->list = new eclMod_admin_list ($document);
} // function dispatch

} // class eclApp_integrationPapoSMS

?>