<?php 
class Migration_Create_Sessions extends CI_Migration {

  public function up()
  {
    // Drop table 'ci_sessions' if it exists
      $this->dbforge->drop_table('ci_sessions', TRUE);
      // Table structure for table 'groups'
      $this->dbforge->add_field(array(
          'id' => array(
              'type' => 'VARCHAR',
              'constraint' => '40',
              'null' => FALSE
          ),
          'ip_address' => array(
              'type' => 'VARCHAR',
              'constraint' => '45',
              'null' => FALSE
          ),
          'timestamp' => array(
              'type' => 'INT',
              'constraint' => '10',
              'unsigned' => TRUE,
              'default' => 0,
              'null' => FALSE
          ),
          'data' => array(
              'type' => 'blob',
              'null' => FALSE
          )
      ));
      $this->dbforge->create_table('ci_sessions');
      $this->db->query('CREATE INDEX `ci_sessions_timestamp` ON `ci_sessions` (`timestamp`)');
      $this->db->query('ALTER TABLE `ci_sessions` ADD PRIMARY KEY (`id`, `ip_address`)');
  }

  public function down()
  {
    $this->dbforge->drop_table('ci_sessions');
  }

}