<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthTables extends Migration
{
    public function up()
    {
        /*
         * Users
         */
         
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'            => ['type' => 'varchar', 'constraint' => 30],
            'fullname'         => ['type' => 'VARCHAR', 'constraint' => 255],
            'password_hash'    => ['type' => 'varchar', 'constraint' => 255],
            'reset_hash'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'reset_at'         => ['type' => 'datetime', 'null' => true],
            'reset_expires'    => ['type' => 'datetime', 'null' => true],
            'activate_hash'    => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'           => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_message'   => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'force_pass_reset' => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users', true);
        
    # create permission to allow users to be assigned a task. 
    
    $this->forge->addField([
	    'id' => ['type'=> 'int', 'constraint'=>11, 'unsigned'=> true, "auto_increment" => "true"], 
	    'user_id' => ['type' => 'int', 'constraint' => 11], 
	    'transaction_ref' =>['type' => 'varchar', 'constraint' => 63], 
	    'transaction_type' =>['type' => 'varchar', 'constraint' => 30], 
	    'amount' => ['type' => 'varchar', 'constraint' => 63], 
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at' => ['type' => 'datetime', 'null' => true]
	  ]);
	  
	  #Always to get the url of the page or channel
	  $this->forge->addkey('id', true);
	  $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
	  $this->forge->createTable('invoices');
	  
	  
	  $this->forge->addField([
	    'user_id' => ['type' => 'int', 'constraint' => 11], 
	    'country' => ['type' => 'varchar', 'constraint' => 60], 
	    'address' => ['type' => 'text'],  
	    'zip' => ['type' => 'varchar', 'constraint' => 11],  
	    'phone' => ['type' => 'varchar', 'constraint' => 20], 
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at' => ['type' => 'datetime', 'null' => true]
	  ]);
	  $this->forge ->addKey('user_id', true);
	  $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
	  $this->forge ->createTable('user_info');

    /*
    *  Upgrade to identify different task types
    */
	  $this->forge->addField([
	    'id' => ['type'=> 'int', 'constraint'=>11, 'unsigned'=> true, "auto_increment" => true], 
	    'user_id' => ['type' => 'int', 'constraint' => 11], 
	    'dimension' =>['type' => 'varchar', 'constraint' => 20], 
	    'category' =>['type' => 'varchar', 'constraint' => 30], 
	    'cost' =>['type' => 'varchar', 'constraint' => 63],
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at'=> ['type' => 'datetime', 'null' => true]
	  ]);
	  #Always to get the url of the page or channel
	  $this->forge->addkey('id', true);
	  $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
	  $this->forge->createTable('plan');
	  
	  $this->forge->addField([
	    'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
	    'plan_id' => ['type' => 'varchar', 'constraint' => 11, 'unsigned' => true], 
	    'url' => ['type' => 'varchar', 'constraint' => 63], 
	    'type' => ['type' => 'int', 'constraint' => 63, 'default' => "current_timestamp"], 
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at' => ['type' => 'datetime', 'null' => true]
	  ]);
	  $this->forge->addkey('id', true);
	  $this->forge->addForeignKey('plan_id', 'plan', 'id', false, 'CASCADE');
	  $this->forge->createTable('plan_images');
	  
	  $this->forge->addField([
	    'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
	    'plan_id' => ['type' => 'varchar', 'constraint' => 11, 'unsigned' => true], 
	    'name' => ['type' => 'varchar', 'constraint' => 63], 
	    'value' => ['type' => 'int', 'constraint' => 63, 'default' => "current_timestamp"], 
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at' => ['type' => 'datetime', 'null' => true]
	  ]);
	  $this->forge->addkey('id', true);
	  $this->forge->addForeignKey('plan_id', 'plan', 'id', false, 'CASCADE');
	  $this->forge->createTable('plan_info');
	  
	  $this->forge->addField([
	    'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
	    'plan_id' => ['type' => 'varchar', 'constraint' => 63], 
	    'user_id' => ['type' => 'int', 'constraint' => 11], 
	    'cost' => ['type' => 'varchar', 'constraint' => 63,], 
	    'status' => [
	        'type' => 'enum', 
	        'constraint' => ['completed', 'canceled', 'pending'], 
	        'default' => 'pending'
	     ], 
	    'created_at' => ['type' => 'datetime', 'null' => true], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	    'deleted_at'=> ['type' => 'datetime', 'null' => true]
	  ]);
	  $this->forge->addkey('id', true);
	  $this->forge->addForeignKey('plan_id', 'plan', 'id', false, 'CASCADE');
	  $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
	  $this->forge->createTable('orders');
	  
	  
	  
	  $this->forge->addField([
	    'user_id' => ['type' => 'int', 'constraint' => 11],
	    'plan_id' => ['type' => 'varchar', 'constraint' => 63], 
	    'name' => ['type' => 'varchar', 'constraint' => 63], 
	    'value' => ['type' => 'int', 'constraint' => 63, 'default' => "current_timestamp"], 
	    'updated_at' => ['type' => 'datetime', 'null' => true], 
	  ]);
	  $this->forge->addkey('user_id', true);
	  $this->forge->addkey('plan_id', true);
	  $this->forge->addForeignKey('plan_id', 'plan', 'id', false, 'CASCADE');
	  $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
	  $this->forge->createTable('favorites');
	  

        /*
         * Auth Login Attempts
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'email'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Only for successful logins
            'date'       => ['type' => 'datetime', 'null' => true],
            'success'    => ['type' => 'tinyint', 'constraint' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->addKey('user_id');
        // NOTE: Do NOT delete the user_id or email when the user is deleted for security audits
        $this->forge->createTable('auth_logins', true);

        /*
         * Auth Tokens
         * @see https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
         */
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'selector'        => ['type' => 'varchar', 'constraint' => 255],
            'hashedValidator' => ['type' => 'varchar', 'constraint' => 255],
            'user_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'expires'         => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('selector');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->createTable('auth_tokens', true);

        /*
         * Password Reset Table
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'      => ['type' => 'varchar', 'constraint' => 255],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'user_agent' => ['type' => 'varchar', 'constraint' => 255],
            'token'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true, 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('auth_reset_attempts');

        /*
         * Activation Attempts Table
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'user_agent' => ['type' => 'varchar', 'constraint' => 255],
            'token'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'datetime', 'null' => true, 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('auth_activation_attempts');

        /*
         * Groups Table
         */
        $fields = [
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('auth_groups', true);

        /*
         * Permissions Table
         */
        $fields = [
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'        => ['type' => 'varchar', 'constraint' => 255],
            'description' => ['type' => 'varchar', 'constraint' => 255],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('auth_permissions', true);

        /*
         * Groups/Permissions Table
         */
        $fields = [
            'group_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'permission_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['group_id', 'permission_id']);
        $this->forge->addForeignKey('group_id', 'auth_groups', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'auth_permissions', 'id', false, 'CASCADE');
        $this->forge->createTable('auth_groups_permissions', true);

        /*
         * Users/Groups Table
         */
        $fields = [
            'group_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'user_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['group_id', 'user_id']);
        $this->forge->addForeignKey('group_id', 'auth_groups', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->createTable('auth_groups_users', true);

        /*
         * Users/Permissions Table
         */
        $fields = [
            'user_id'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'permission_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['user_id', 'permission_id']);
        $this->forge->addForeignKey('user_id', 'users', 'id', false, 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'auth_permissions', 'id', false, 'CASCADE');
        $this->forge->createTable('auth_users_permissions');
    }

    //--------------------------------------------------------------------

    public function down()
    {
		// drop constraints first to prevent errors
        if ($this->db->DBDriver != 'SQLite3')
        {
            $this->forge->dropForeignKey('auth_tokens', 'auth_tokens_user_id_foreign');
            $this->forge->dropForeignKey('auth_groups_permissions', 'auth_groups_permissions_group_id_foreign');
            $this->forge->dropForeignKey('auth_groups_permissions', 'auth_groups_permissions_permission_id_foreign');
            $this->forge->dropForeignKey('auth_groups_users', 'auth_groups_users_group_id_foreign');
            $this->forge->dropForeignKey('auth_groups_users', 'auth_groups_users_user_id_foreign');
            $this->forge->dropForeignKey('auth_users_permissions', 'auth_users_permissions_user_id_foreign');
            $this->forge->dropForeignKey('auth_users_permissions', 'auth_users_permissions_permission_id_foreign');
        }

		$this->forge->dropTable('users', true);
		$this->forge->dropTable('invoices', true);
		
		$this->forge->dropTable('user_info', true);
		$this->forge->dropTable('plan', true);
		$this->forge->dropTable('plan_info', true);
		$this->forge->dropTable('plan_images', true);
		$this->forge->dropTable('favorites', true);
		$this->forge->dropTable('orders', true);
		
		$this->forge->dropTable('auth_logins', true);
		$this->forge->dropTable('auth_tokens', true);
		$this->forge->dropTable('auth_reset_attempts', true);
    $this->forge->dropTable('auth_activation_attempts', true);
		$this->forge->dropTable('auth_groups', true);
		$this->forge->dropTable('auth_permissions', true);
		$this->forge->dropTable('auth_groups_permissions', true);
		$this->forge->dropTable('auth_groups_users', true);
		$this->forge->dropTable('auth_users_permissions', true);
    }
}
