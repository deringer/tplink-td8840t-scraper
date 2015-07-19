<?php

namespace Iatstuti\Telnet;

use Bestnetwork\Telnet\TelnetClient;

class TpLinkClient extends TelnetClient
{
    public function login($username, $password)
    {
        try {
            $this->read('username:');
            $this->write((string) $username);
            $this->read('password:');
            $this->write((string) $password);
            $this->clearBuffer();
            return true;
        } catch (TelnetException $e) {
            throw new TelnetException('Login failed.', 0, $e);
        }
    }
}
