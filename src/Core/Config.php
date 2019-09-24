<?php

namespace App\Core;

class Config {

    // public const FILE_NAME = __DIR__.'/../../storage/data.mysql';
    public const FILE_NAME = 'host:localhost.user:root.password:.db:feedback_db.table:feedback.mysql';
    
    public const DATA_USERS = __DIR__.'/../../src/core/users.json';
    public const USERS_RIGHTS = __DIR__.'/../../src/core/rights.json';
    public const DEFAULT_CONTROLLER = 'FeedBack';
    public const DEFAULT_ACTION = 'ShowForm';
    public const HOST = 'localhost';
    public const USER = 'root';
    public const PASSWORD = '';
    public const DATA_BASE = 'feedback_db';
    public const ADMIN_TABLE = 'users';

}


?>