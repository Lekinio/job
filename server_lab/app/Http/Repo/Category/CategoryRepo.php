<?php
/**
 * Created by PhpStorm.
 * User: Tornike
 * Date: 2/11/2017
 * Time: 2:30 PM
 */

namespace App\Repo\Category;


interface CategoryRepo
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id,array $attributes);

    public function delete($id);
}