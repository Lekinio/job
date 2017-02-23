<?php
/**
 * Created by PhpStorm.
 * category: Tornike
 * Date: 2/11/2017
 * Time: 2:30 PM
 */

namespace App\Repo\AdverType;

use App\AdverType;

class AdverTypeEloquent implements AdverTypeRepo
{
    private $advertype;

    public function __construct(AdverType $advertype)
    {
        return $this->advertype = $advertype;
    }

    public function getAll()
    {
        return $this->advertype->all();
    }

    public function getById($id)
    {
        return $this->advertype->find($id);
    }

    public function create(array $attributes)
    {
        return $this->advertype->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $advertype = $this->advertype->findOrFail($id);

        $advertype->update($attributes);

        return $advertype;
    }

    public function delete($id)
    {
        $this->advertype->getById($id)->delete();
        return true;
    }
}