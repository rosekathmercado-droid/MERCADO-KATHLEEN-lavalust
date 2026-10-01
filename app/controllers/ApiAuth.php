<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ApiAuth extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('UsersModel');
        $this->call->library('api');
    }

    public function login()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        if (!$username || !$password) {
            $this->api->respond_error(
                'Username and password are required.',
                400
            );
        }

        $user = $this->UsersModel->find_by('username', $username);

        if (!$user || $user['password'] !== $password) {
            $this->api->respond_error(
                'Invalid username or password.',
                401
            );
        }

        $tokens = $this->api->issue_tokens([
            'id'       => $user['id'],
            'username' => $user['username']
        ]);

        $this->api->respond([
            'message' => 'Login successful.',
            'user' => [
                'id'       => $user['id'],
                'username' => $user['username']
            ],
            'tokens' => $tokens
        ], 200);
    }
}
?>