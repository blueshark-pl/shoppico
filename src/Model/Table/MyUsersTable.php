<?php

namespace App\Model\Table;

use CakeDC\Users\Model\Table\UsersTable;

/**
 * Application specific Users Table with non plugin conform field(s)
 */
class MyUsersTable extends UsersTable
{
    // important, you'll need to override the alias if you extend from an existing table
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setAlias('MyUsers');
    }
}