<?php

/**
 * User: sh_abdurasulov
 */
class m0001_initial
{

    public function up()
    {
        $db = \shuhratjon\mvc\Application::$app->db;
        $sql = <<<SQL
CREATE TABLE users( 
  id   INT AUTO_INCREMENT PRIMARY KEY,
  email  VARCHAR(255) NOT NULL, 
  firstname  VARCHAR(255) NOT NULL, 
  lastname   VARCHAR(255) NOT NULL,
  status   TINYINT NOT NULL DEFAULT 0,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=INNODB;
SQL;
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \shuhratjon\mvc\Application::$app->db;
        $sql = <<<SQL
DROP TABLE users;
SQL;
        $db->pdo->exec($sql);
    }
}