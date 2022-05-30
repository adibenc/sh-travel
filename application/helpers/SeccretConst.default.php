<?php
// rename to SecretConst.php
// ask admin for secrets
class SecretConst{
    const client_id = "";
    const client_secret = "";

    const DB_DSN = '';
    const DB_HOSTNAME = '127.0.0.1';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_DATABASE = 'db';
    const DB_DBDRIVER = 'mysql';
    const DB_PORT = 3306;
    const DB_DBPREFIX = '';
    const DB_PCONNECT = '';
    const DB_DB_DEBUG = false;
    const DB_CACHE_ON = false;
    const DB_CACHEDIR = '';
    const DB_CHAR_SET = '';
    const DB_DBCOLLAT = '';
    const DB_SWAP_PRE = '';
    const DB_ENCRYPT = false;
    const DB_COMPRESS = false;
    const DB_STRICTON = false;
    const DB_FAILOVER = [];
    const DB_SAVE_QUERIES = true;

    const SESS_DRIVER = 'files';
    // const SESS_COOKIE_NAME = 'ci_session';
    // const SESS_DRIVER = 'database';
    const SESS_COOKIE_NAME = 'ci_session';
    const SESS_EXPIRATION = 7200;
    const SESS_SAVE_PATH = 'ci_sessions';
    const SESS_MATCH_IP = TRUE;
    const SESS_TIME_TO_UPDATE = 600;
    const SESS_REGENERATE_DESTROY = FALSE;

    static function getBaseUrl(){
        return 'http://'.$_SERVER['HTTP_HOST'].'/tilang/';
        // return 'http://'.$_SERVER['HTTP_HOST'];
    }
}