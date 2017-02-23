<?php
/**
 * Created by PhpStorm.
 * User: Tornike
 * Date: 2/11/2017
 * Time: 2:34 PM
 */

namespace App\Repo\Job;


interface JobRepo
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id,array $attributes);

    public function delete($id);
}