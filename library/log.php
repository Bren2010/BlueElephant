<?php
/**
 * Logger operations
 * 
 * @package Library
 */
class Log {
    
    public static $start;
    public static $request;
    public static $arguments;
    
    private static $opened = false;
    private static $logModel;
    
    /**
     * Creates all resources needed.
     */
    public static function initiate() {
        self::$logModel = new logs(ConnectionFactory::get('mongo'), ConnectionFactory::get('redis'));
        
        openlog('hts', LOG_ODELAY, LOG_USER);
        self::$opened = true;
    }
    
    /**
     * Write a new error message to log.
     * 
     * @param int $priority One of the PHP Syslog priority constants.
     * @param string $message Message to log.
     * 
     * @return bool True on success.
     */
    public static function error($priority, $message) {
        if (!self::$opened) self::initiate();
        
        $logHeader = (!Session::isLoggedIn() ? 'Guest' : 'User ' . Session::getVar('username')) . 
            ' (' . microtime() . '):  ';
        return syslog($priority, $logHeader . $message);
    }
    
    /**
     * Log a user's login.
     * 
     * @param string $userId The user id.
     */
    public static function login($userId) {
        if (!self::$opened) self::initiate();
        self::$logModel->login($userId);
    }
    
    /**
     * Log user activity.
     */
    public static function activity($message, $reference) {
        if (!self::$opened) self::initiate();
        self::$logModel->activity($message, $reference);
    }
    
    /**
     * Log general activity.
     */
    public static function general() {
        if (!self::$opened) self::initiate();
        self::$logModel->general();
    }
    
    /**
     * Closes the syslog connection at the close of the script.
     */
    public function __destruct() {
        closelog();
    }
    
}
