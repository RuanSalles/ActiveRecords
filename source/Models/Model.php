<?php

namespace Source\Models;

use PDOException;

abstract class Model
{
    /** @var object|null */
    protected ?object $data;

    /** @var PDOException */
    protected PDOException $fail;

    /** @var string|null */
    protected ?string $message;

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

    public function create()
    {
    }

    public function read()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function safe(): ?array
    {
    }

    public function filter()
    {
    }
}