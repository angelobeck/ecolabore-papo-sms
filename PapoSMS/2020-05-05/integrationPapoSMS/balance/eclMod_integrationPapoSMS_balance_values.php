<?php

class eclMod_integrationPapoSMS_balance_values
{ // class eclMod_integrationPapoSMS_balance_values
public $document;

public function __construct ($document)
{ // function __construct
$this->document = $document;
} // function __construct

public function setModule ($mod, $arguments)
{ // function setModule
global $io, $store;
$document = $this->document;
$mod->data = $store->control->read ('integrationPapoSMS_balance_values');

$data = $io->sms->balance();

$fields = [
'Balance' => 'saldo',
'Scheduled' => 'agendados',
'Sent' => 'enviados',
'Received' => 'recebidos',
'Failures' => 'falhas'
];

foreach ($fields as $name => $field)
{ // each field
if (!isset ($data['valores'][$field]))
continue;

$row = $mod->appendChild();
$row->appendChild('integrationPapoSMS_balance_values' . $name);
$row->appendChild(['caption' => $document->textMerge ($data['valores'][$field])]);
} // each field

$mod->enabled = true;

} // function setModule

} // class eclMod_integrationPapoSMS_balance_values

?>