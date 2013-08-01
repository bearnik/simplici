<?php

/**
 * Migration Blog Creation class
 */
class Migration_Create_blog extends CI_Migration {

    
    // creating table
    public function up() {
        $this->dbforge->add_field( array(
                                    'event_id'        => array(
                                        'type'       =>  'INT',
                                        'constraint' =>  11,
                                        'unsigned'   =>  TRUE,
                                        'auto_increment' => TRUE
                                    ),
                                    'event_title'     => array(
                                        'type'       =>  'VARCHAR',
                                        'constraint' => 150
                                    ),
                                    'article_subtitle'  => array(
                                        'type'       =>  'VARCHAR',
                                        'constraint' => 150
                                    ),
                                    'article_text'  => array(
                                        'type'      =>   'TEXT' 
                                    ),
                                    'author_id'         => array(
                                        'type'  =>  'TINYINT',
                                        'constrstraint' => 2 
                                    ),
                                    'article_date'      => array(
                                        'type'  => 'DATETIME'
                                    ),
                                    'published'         => array(
                                        'type'  =>  'BOOLEAN'
                                    )
                                  ));
                                
       $this->dbforge->add_key('article_id', TRUE);              
       $this->dbforge->create_table('blog');
    }
    
    // drop table
    public function down() {
        $this->dbforge->drop_table('blog');
    }
}
