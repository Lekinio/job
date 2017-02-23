<?php
/**
 * Created by PhpStorm.
 * User: Tornike
 * Date: 2/10/2017
 * Time: 9:40 PM
 */

namespace App\Repo\Company;

use App\Company;

class CompanyEloquent implements CompanyRepo
{
    private $company;

    public function __construct(Company $company)
    {
            return $this->company = $company;
    }

    public function getAll()
    {
        return $this->company->all();
    }

    public function getById($id)
    {
        return $this->company->find($id);
    }

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}