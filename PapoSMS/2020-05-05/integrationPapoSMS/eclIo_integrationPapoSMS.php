<?php

class eclIo_integrationPapoSMS
{ // class eclIo_integrationPapoSMS

public function send ($arguments)
{ // function send
global $io, $store;

if (!isset ($arguments[0]))
return [];

if (INTEGRATION_PAPO_SMS_USER == '' or INTEGRATION_PAPO_SMS_PASS == '')
return [];

$sms = $arguments[0];
if (!isset ($sms['number']) or !isset ($sms['message']))
return [];

$url = 'https://www.paposms.com/webservice/1.0/send/';

$fields = array (
'user' => INTEGRATION_PAPO_SMS_USER, 
'pass' => INTEGRATION_PAPO_SMS_PASS, 
'numbers' => $sms['number'], 
'message' => $sms['message'], 
'return_format' => 'json'
);

$url .= '?' . http_build_query ($fields, 'a', '&'	);

return $io->webservice->request($url);
} // function send

public function balance ()
{ // function balance
global $io;

if (INTEGRATION_PAPO_SMS_USER == '' or INTEGRATION_PAPO_SMS_PASS == '')
return [];

$url = 'https://www.paposms.com/webservice/1.0/saldo/';

$fields = [
'user' => INTEGRATION_PAPO_SMS_USER, 
'pass' => INTEGRATION_PAPO_SMS_PASS, 
'return_format' => 'json'
];

$url .= '?' . http_build_query ($fields, 'a', '&');

return $io->webservice->request($url);
} // function balance

public function close ()
{ // function close
} // function close

} // class eclIo_integrationPapoSMS

?>