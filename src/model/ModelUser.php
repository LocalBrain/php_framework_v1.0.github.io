<?php

class ModelUser
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    { /* ... */
    }
    public function read($id)
    { /* ... */
    }
    public function update($id, $data)
    { /* ... */
    }
    public function delete($id)
    { /* ... */
    }
}
