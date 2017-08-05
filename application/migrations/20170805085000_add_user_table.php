<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_table extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'firstname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'lastname' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'age' => array(
                                'type' => 'INT',
                        ),
                        'city' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'country' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'yearly_income' => array(
                                'type' => 'FLOAT'
                        ),
                        'monthly_expenses' => array(
                                'type' => 'FLOAT'
                        ),
                ));
                $this->dbforge->add_key('id', TRUE);
                $this->dbforge->create_table('users');
        }

        public function down()
        {
                $this->dbforge->drop_table('users');
        }
}