<?php

namespace Core\Database;

use PDO;

class QueryBuilder
{
    private $db;

    public function __construct(PDO $db)
    {

        $this->db = $db;
    }

    public function selectAll($table)
    {
        $sql = sprintf('SELECT * FROM %s',
            $table);
        $stmt = $this->db->query($sql);
        
        return $stmt->fetchAll();
    }

    public function insert($table, array $fields)
    {
        $keys = array_keys($fields);

        
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', $keys),
            ':' .implode(', :', $keys)
        );
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($fields);
    }

    public function update($table,$id)
    {
        $sql = sprintf('UPDATE %s SET complete = 1 WHERE id = %s',
        $table, $id);

        $stmt = $this->db->exec($sql);
        return $stmt;
    }

    public function delete($table,$id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = %s;',
    $table,$id);
        $stmt = $this->db->exec($sql);
        return $stmt;
        

    }
}