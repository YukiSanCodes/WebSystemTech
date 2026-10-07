<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsers extends Migration
{
    public function up()
    {
        // SHOW TABLES is case-insensitive on MAMP's default filesystem and
        // also handles databases where the table was created as `USERS`.
        if ($this->db->query("SHOW TABLES LIKE 'users'")->getNumRows() > 0) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'first_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'last_name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 20],
            'address' => ['type' => 'VARCHAR', 'constraint' => 255],
            'city' => ['type' => 'VARCHAR', 'constraint' => 100],
            'state' => ['type' => 'VARCHAR', 'constraint' => 50],
            'zip_code' => ['type' => 'VARCHAR', 'constraint' => 10],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'user_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'default'    => 'customer',
            ],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'email_verified' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
