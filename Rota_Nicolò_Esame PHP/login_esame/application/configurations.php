<?php
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "cucina";
    private $username = "root";
    private $password = "mysql";
    public $conn;

    public function dbConnection()
    {

        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            header("location: error.php?75844857389034858593345677DatabaseError585849");
        }
        return $this->conn;
    }
}
?>

<?php
class config
{
    public static function get($param)
    {
        $config = array(

            'base_url' => 'http://localhost:8000',

            'redirect_login' => '../home.php',

            'redirect_logout' => 'login_esame/login.php',

            'change_pass' => true,

            'allow_signup' => true,

        );
        return $config[$param];
    }
}
?>