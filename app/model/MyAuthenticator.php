<?php

use Nette\Security as NS;

class MyAuthenticator extends Nette\Object implements NS\IAuthenticator
{
    public $connection;

    function __construct(Nette\Database\Connection $connection)
    {
        $this->connection = $connection;
    }

    function authenticate(array $credentials)
    {
        list($username, $password) = $credentials;
        $query = "SELECT * FROM users WHERE username=%s";
        $row = dibi::query($query, $username)->fetch();

        if (!$row) {
            throw new NS\AuthenticationException('User not found.');
        }

        if ($row->password !== sha1($password)) {
            throw new NS\AuthenticationException('Invalid password.');
        }

        return new NS\Identity($row->username, $row->role);
    }
}