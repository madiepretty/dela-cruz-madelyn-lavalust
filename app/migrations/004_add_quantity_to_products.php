<?php

class Add_quantity_to_products
{
    private $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->dbforge();
    }

    public function up()
    {
        if (!$this->_lava->dbforge->column_exists('products', 'quantity')) {
            $this->_lava->dbforge->add_column('products', [
                'quantity' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'null' => FALSE,
                    'default' => 0,
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->_lava->dbforge->column_exists('products', 'quantity')) {
            $this->_lava->dbforge->drop_column('products', 'quantity');
        }
    }
}