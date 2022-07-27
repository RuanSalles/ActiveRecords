<?php

namespace Source\Models;

use PDOException;
use PDOStatement;
use PDO;
use stdClass;
use Source\Database\Connection;

abstract class Model
{
    /** @var object|null */
    protected $data;

    /** @var PDOException */
    protected $fail;

    /** @var string|null */
    protected $message;

    public function __set($name, $value): void
    {
        if(empty($this->data)) {
            $this->data = new stdClass();
        }
        $this->data->$name = $value;
    }

    public function __get(string $name)
    {
        return ($this->data->$name ?? null);
    }

    public function __isset(string $name): bool
    {
        return ($this->data->$name);
    }

    /**
     * @return object|null
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @return PDOException|null
     */
    public function fail(): ?PDOException
    {
        return $this->fail;
    }

    /**
     * @return string|null
     */
    public function message(): ?string
    {
        return $this->message;
    }

    public function create(string $entity, array $data)
    {
    }

    public function read(string $select, $params = null): ?PDOStatement
    {
        try {
            $stmt = Connection::getInstance()->prepare($select);
            if ($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {
                    $type = (is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                    $stmt->bindValue(":{$key}", $value, $type);
                }
                $stmt->execute();
                return $stmt;
            }
        } catch (PDOException $exception) {
            $this->fail = $exception;
            return null;
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function safe()
    {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
            var_dump($unset);
        }
        var_dump($safe);
    }

    public function filter()
    {
    }
}