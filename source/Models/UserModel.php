<?php

namespace Source\Models;

use PDO;

class UserModel extends Model
{
    /** @var array|string[] */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /** @var string */
    protected static string $entity = 'users';

    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null): ?UserModel
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;
        return $this;
    }

    public function load(int $id, string $columns = "*"): ?UserModel
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        if ($this->fail()) {
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }
        return $load->fetchObject(__CLASS__);

    }


    public function find(string $email, string $columns = '*')
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if ($this->fail()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    public function all(int $limit = 30, int $offset = 0, string $columns = '*'): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset ", "limit={$limit}&offset={$offset}");
        if ($this->fail()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }
        return $all->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function save()
    {
        $this->safe();
    }

    public function destroy()
    {
    }

    private function required()
    {
    }


}