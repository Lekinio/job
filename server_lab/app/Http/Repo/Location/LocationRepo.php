<?php
/**
 * Created by PhpStorm.
 * User: Tornike
 * Date: 2/10/2017
 * Time: 10:28 PM
 */

namespace App\Repo\Location;


interface LocationRepo
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id,array $attributes);

    public function delete($id);
}