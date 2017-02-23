<?php
/**
 * Created by PhpStorm.
 * job: Tornike
 * Date: 2/11/2017
 * Time: 2:35 PM
 */

namespace App\Repo\Job;

use App\Job;

class JobEloquent implements JobRepo
{
    private $job;

    public function __construct(Job $job)
    {
        return $this->job = $job;
    }

    public function getAll()
    {
        return $this->job->all();
    }

    public function getById($id)
    {
        return $this->job->find($id);
    }

    public function create(array $attributes)
    {
        return $this->job->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $job = $this->job->findOrFail($id);

        $job->update($attributes);

        return $job;
    }

    public function delete($id)
    {
        $this->job->getById($id)->delete();
        return true;
    }

}