<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('CrudUsersModel');
        $this->call->library('session');
    }

    public function login()
    {
        if ($this->session->userdata('user_id')) {
            redirect('/products');
        }

        $this->call->view('login');
    }

    public function register()
    {
        if ($this->session->userdata('user_id')) {
            redirect('/products');
        }

        $this->call->view('register', ['role' => 'User']);
    }

    public function authenticate()
    {
        $username = trim((string) $this->request->post('username', ''));
        $password = (string) $this->request->post('password', '');
        $account = $this->CrudUsersModel->find_by('username', $username);

        if (!$account || !password_verify($password, $account['password'])) {
            $this->call->view('login', ['error' => 'Invalid username or password.']);
            return;
        }

        $this->session->regenerate_on_login();
        $this->session->set_userdata([
            'user_id' => $account['id'],
            'username' => $username,
            'role' => $account['role'],
        ]);

        redirect('/products');
    }

    public function store_registration()
    {
        $username = trim((string) $this->request->post('username', ''));
        $password = (string) $this->request->post('password', '');
        $confirmation = (string) $this->request->post('password_confirmation', '');
        $role = (string) $this->request->post('role', 'User');

        if ($username === '' || strlen($username) > 100 || strlen($password) < 6 || $password !== $confirmation || !in_array($role, ['User', 'Admin'], true)) {
            $this->call->view('register', [
                'error' => 'Enter a username, choose a valid role, and enter a matching password of at least 6 characters.',
                'username' => $username,
                'role' => $role,
            ]);
            return;
        }

        if ($this->CrudUsersModel->find_by('username', $username)) {
            $this->call->view('register', [
                'error' => 'That username is already registered.',
                'username' => $username,
                'role' => $role,
            ]);
            return;
        }

        $this->CrudUsersModel->insert([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
        ]);

        redirect('/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }
}