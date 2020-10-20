<?php
class DB
{
    private static $db;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!self::$db) {
            echo "ESTABLISH CONNECTION...<br>";
            self::$db = new mysqli(
                'db',
                'root',
                '',
                'skillup'
            );
        }

        echo "READ FROM EXISTING VARIABLE<br>";
        return self::$db;
    }
}

class User extends DB
{

    public $name, $password;

    function __construct($email, $password)
    {
        $this->user_email = $email;
        $this->user_password = $password;
    }

    public function setUser($email, $password)
    {
        $db = DB::getInstance();

        $this->user_email = $email;
        $this->user_password = md5($password);

        $query = $this->$db->mysql_query("INSERT INTO users (email, password) VALUES ('$this->user_email', '$this->user_password')")

        $this->users = $query;
  }

    public function getUserInfo()
    {

        $db = DB::getInstance();

        $query = $this->$db->mysql_query("SELECT * FROM users WHERE email = '$this->user_email' and password = '$this->user_password'");


        $users = $query->fetch_all(MYSQLI_ASSOC);

        return $this->$users;
    }

    public function updateUser($email, $password)
    {
        $db = DB::getInstance();

        $this->user_email = $email;

        $this->user_password = md5($password);

        $query = $this->$db->mysql_query("UPDATE * FROM users WHERE email = '$this->user_email' and password = '$this->user_password'");

        $this->users = $query;

        echo "Данні користувача оновленно!";
    }

    public function deleteUser($email, $password)
    {
        $db = DB::getInstance();

        $query = $this->$db->mysql_query("DELETE * FROM users WHERE email = '$this->user_email' and password = '$this->user_password'");

        $db->query($query);
    }
}
$users = new User;
$users->setUser('user@gmail.com','12345678');
echo $users->getUserInfo();

