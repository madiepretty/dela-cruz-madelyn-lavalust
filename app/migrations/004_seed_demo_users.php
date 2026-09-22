<?php

class Seed_demo_users
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->model('UsersModel');
    }

    public function up()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role' => 'admin',
                'is_active' => 1,
            ],
            [
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'role' => 'user',
                'is_active' => 1,
            ],
        ];

        foreach ($users as $user) {
            if (!$this->_lava->UsersModel->find_by('username', $user['username'])) {
                $this->_lava->UsersModel->insert($user);
            }
        }
    }

    public function down()
    {
        $this->_lava->UsersModel->delete_where(['username' => 'admin']);
        $this->_lava->UsersModel->delete_where(['username' => 'user']);
    }
}