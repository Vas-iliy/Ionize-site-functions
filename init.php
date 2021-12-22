<?php

const BASE_URL = '/Project1Functions/';

const DB_HOST = 'localhost';
const DB_TABLE = 'project1functions';
const DB_USER = 'root';
const DB_PASSWORD = '';

include_once 'core/system.php';
include_once 'core/db.php';
include_once 'core/file.php';
include_once 'core/auth.php';
include_once 'core/logs.php';

include_once 'models/states.php';
include_once 'models/categories.php';
include_once 'models/images.php';
include_once 'models/users.php';
include_once 'models/sessions.php';
include_once 'models/comments.php';
include_once 'models/roles.php';