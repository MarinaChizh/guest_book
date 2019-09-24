<?php

namespace App\Controller;

session_start();

use App\Core\Config;
use App\Model\DataStorage\DB_entity;
use mysqli;


class AuthController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->view->setViewPath(__DIR__ . '/../../templates/Auth/');
        $this->view->setLayoutsPath(__DIR__ . '/../../templates/_layouts/emptyLayout.php');
    }

    public function actionLoginForm()
    {

        $this->render("Form", [
            'formPath' => '?t=' . $this->classNameNP() . '&a=CheckLogin'
        ]);
    }

    public function actionCheckLogin()
    {
        $usersTable = new DB_entity(
            new mysqli(
                Config::HOST,
                Config::USER,
                Config::PASSWORD,
                Config::DATA_BASE
            ),
            Config::ADMIN_TABLE
        );

        $res = $usersTable
            ->add_where_condition("login LIKE '$_POST[login]' and password='$_POST[password]'")
            ->query();
//print_r($_POST);
        $users_array = json_decode(file_get_contents(Config::DATA_USERS), true);

        if (!empty($res)) {
            $_SESSION['autorized_user'] = $_POST['login'];
            $this->redirect('/dashboard');
        } else {
            echo "Неверный логин или пароль!";
            exit();
        }

    }


    public function actionLogout()
    {
        unset($_SESSION['autorized_user']);
        $this->redirect('/feedback');
    }

    public static function CheckRights(string $controllerName)
    {
        $rights_array = json_decode(file_get_contents(Config::USERS_RIGHTS), true);

        if (isset($_SESSION['autorized_user'])) {
            return in_array(strtolower($controllerName), array_map('strtolower', $rights_array["admin"]));
        } else {
            return in_array(strtolower($controllerName), array_map('strtolower', $rights_array["default"]));
        }
    }
}
