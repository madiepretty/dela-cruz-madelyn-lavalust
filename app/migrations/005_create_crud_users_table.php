<?php

class Create_crud_users_table
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        if ($this->_lava->dbforge->table_exists('crud_users')) {
            return;
        }

        $this->_lava->dbforge
            ->add_field([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE,
                    'null' => FALSE,
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'null' => FALSE,
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE,
                ],
                'role' => [
                    'type' => 'ENUM',
                    'constraint' => "'User','Admin'",
                    'null' => FALSE,
                    'default' => 'User',
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => FALSE,
                    'default' => 'CURRENT_TIMESTAMP',
                ],
            ])
            ->add_key('id', primary: TRUE)
            ->add_key('username', unique: TRUE, name: 'crud_users_username_unique')
            ->create_table('crud_users');
    }

    public function down()
    {
        $this->_lava->dbforge->drop_table('crud_users');
    }
}