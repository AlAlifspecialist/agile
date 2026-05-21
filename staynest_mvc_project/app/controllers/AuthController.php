<?php

require_once "../app/models/User.php";

class AuthController extends Controller
{

    public function register()
    {
        $this->view('auth/register');
    }

    public function storeRegister()
    {

        $user = new User();

        $existingUser = $user->findByEmail($_POST['email']);

        if($existingUser)
        {
            die("Email already exists.");
        }

        $data = [

            'full_name' => $_POST['full_name'],

            'email' => $_POST['email'],

            'phone_number' => $_POST['phone_number'],

            'password' => $_POST['password'],

            'user_role' => $_POST['user_role']

        ];

        $user->create($data);

        header("Location: /staynest_mvc_project/public/login");

        exit();
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function authenticate()
    {

        $userModel = new User();

        $user = $userModel->findByEmail($_POST['email']);

        if($user)
        {

            if($_POST['password'] == $user['password_hash'])
            {

                $_SESSION['user'] = $user;

                if($user['user_role'] == 'Admin')
                {

                    header("Location: /staynest_mvc_project/public/admin/dashboard");

                }

                elseif($user['user_role'] == 'Host')
                {

                    header("Location: /staynest_mvc_project/public/host/dashboard");

                }

                elseif($user['user_role'] == 'Staff')
                {

                    header("Location: /staynest_mvc_project/public/staff/dashboard");

                }

                else
                {

                    header("Location: /staynest_mvc_project/public/dashboard");

                }

                exit();
            }
        }

        die("Invalid Email or Password");
    }

    public function logout()
    {

        session_destroy();

        header("Location: /staynest_mvc_project/public/login");

    }

}
?>