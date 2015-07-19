<?php

ini_set('date.timezone', 'Australia/Adelaide');

require dirname(__FILE__) . '/vendor/autoload.php';

use Iatstuti\Telnet\TpLinkClient as Client;

// Load configuration
$dotenv = new Dotenv\Dotenv(dirname(__FILE__));
$dotenv->load();

$client = new Client($_ENV['ROUTER_IP_ADDRESS'], 23, 2, '#');
$client->login($_ENV['ROUTER_USERNAME'], $_ENV['ROUTER_PASSWORD']);
$client->execute('adsl show info');
$output = $client->getGlobalBuffer();
$client->disconnect();

var_dump($output);
