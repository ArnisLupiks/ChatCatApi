<?php
class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './php_includes/db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    $data = json_decode(file_get_contents("php://input"));
    $usrid =$data->uid;

    // destructor
    function __destruct() {

    }

    /**
     * Get user by email and password
     */
    public function getUserByUid($email) {
        $result = mysql_query("SELECT * FROM addGSMUser WHERE uid = '$usrid' LIMIT 1");
        return $result;
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM addGSMUser");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from addGSMUser WHERE uid = '$usrid'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

}

?>
