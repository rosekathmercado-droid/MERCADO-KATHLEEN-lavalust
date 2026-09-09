<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller
{
    public function login()
    {
        $this->call->database();
        $this->call->model('UsersModel');

        if ($this->io->method() === 'post') {

            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $user = $this->UsersModel->find_by('username', $username);

            if ($user && $user['password'] === $password) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header('Location: /products');
                exit;

            } else {

                $error = 'Invalid username or password.';

                $this->call->view('auth/login', [
                    'error' => $error
                ]);

                return;
            }
        }

        $this->call->view('auth/login');
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header('Location: /login');
        exit;
    }
}

?>