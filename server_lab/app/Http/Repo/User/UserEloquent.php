<?php
namespace App\Repo\User;

use App\User;

class UserEloquent implements UserRepo {

    private $user;

    public function __construct(User $user)
    {
        return $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function getById($id)
    {
        return $this->user->find($id);
    }

    public function create(array $attributes)
    {
       return $this->user->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $user = $this->user->findOrFail($id);

        $user->update($attributes);

        return $user;
    }

    public function delete($id)
    {
        $this->user->getById($id)->delete();
        return true;
    }

}