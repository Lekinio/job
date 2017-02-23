<?php
/**
 * Created by PhpStorm.
 * category: Tornike
 * Date: 2/11/2017
 * Time: 2:30 PM
 */

namespace App\Repo\Category;

use App\Category;

class CategoryEloquent implements  CategoryRepo
{
    private $category;

    public function __construct(Category $category)
    {
        return $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function getById($id)
    {
        return $this->category->find($id);
    }

    public function create(array $attributes)
    {
        return $this->category->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $category = $this->category->findOrFail($id);

        $category->update($attributes);

        return $category;
    }

    public function delete($id)
    {
        $this->category->getById($id)->delete();
        return true;
    }
}