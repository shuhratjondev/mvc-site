<?php
/**
 * User: sh_abdurasulov
 * @package app\migrations
 */

class m0002_add_password_column
{

    public function up()
    {
        $db = \shuhratjon\mvc\Application::$app->db;
        $sql = <<<SQL
ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;
SQL;
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \shuhratjon\mvc\Application::$app->db;
        $sql = <<<SQL
ALTER TABLE users DROP COLUMN password;
SQL;
        $db->pdo->exec($sql);
    }

}