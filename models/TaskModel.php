<?php
require $_SERVER['DOCUMENT_ROOT'] . '/database/Connection.php';

class TaskModel
{
    public function __construct()
    {
        $this->table = "task";
        $this->connection = new Connection();
        $this->connection = $this->connection->Connect();
    }


    public function getBy(array $filter = [], string $filterString = "")
    {
        $fields = '';
        $bind = [];
        $counter = 1;
        $lengthFilter = count($filter);

        if ($filterString) {
            $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE $filterString;");

            $stmt->execute();
        } else {
            foreach ($filter as $key => $value) {
                $fields .= "$key = :$key";

                if ($counter < $lengthFilter) {
                    $fields .= " AND ";
                }

                $counter++;
                $bind[":$key"] = $value;
            }

            $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE $fields;");

            $stmt->execute($bind);
        }

        return $stmt->fetchAll();
    }

    public function create(array $data)
    {
        $keys = array_keys($data);
        $values = ':' . implode(',:', $keys);
        $fields = implode(",", $keys);

        $stmt = $this->connection->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$values})");
        $stmt->execute($data);
    }
}
