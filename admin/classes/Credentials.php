<?php
session_start();
/**
 * 
 */
class Credentials
{

    private $con;

    function __construct()
    {
        include_once("Database.php");
        $db = new Database();
        $this->con = $db->connect();
    }



    public function loginAdmin($email, $password)
    {
        $q = $this->con->query("SELECT * FROM admin WHERE email = '$email'");
        if ($q->num_rows > 0) {
            $row = $q->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['admin_name'] = $row['nom'];
                $_SESSION['admin_id'] = $row['id'];
                return ['status' => 202, 'message' => 'Bienvenue!'];
            } else {
                return ['status' => 303, 'message' => 'Email et/ou mot de passe sont incorrecte'];
            }
        }
    }
}


if (isset($_POST['admin_login'])) {
    extract($_POST);
    if (!empty($email) && !empty($password)) {
        $c = new Credentials();
        $result = $c->loginAdmin($email, $password);
        echo json_encode($result);
        exit();
    } else {
        echo json_encode(['status' => 303, 'message' => 'Empty fields']);
        exit();
    }
}
