<?php
defined('BASEPATH') || exit('No direct script access allowed');

/** 
imap : configure it imap access into the imap.php file
sql : use a database check into the model
dummy: no check just pass any combination
simple: use just a general password and any user
code: hardcoded an user and password into model
*/
$config['auth_type'] = 'dummy';
