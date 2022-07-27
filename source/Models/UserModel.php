<?php

namespace Source\Models;

use Source\Database\Entity\UserEntity;

class UserModel extends Model
{
    /** @var array|string[] */
    protected static array $safe = ['id', 'created_at', 'updated_at'];

    /** @var string */
    protected static string $entity = 'users';

    public function bootstrap()
    {
    }

    public function load($id)
    {
    }

    public function find($email)
    {
    }

    public function all(int $limit = 30, int $offset = 0)
    {
    }

    public function save()
    {

    }

    public function destroy()
    {

    }

    private function required()
    {
    }


}