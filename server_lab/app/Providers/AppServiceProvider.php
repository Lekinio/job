<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repo\User\UserRepo;
use App\Repo\User\UserEloquent;
use App\Repo\Company\CompanyRepo;
use App\Repo\Company\CompanyEloquent;
use App\Repo\AdverType\AdverTypeEloquent;
use App\Repo\AdverType\AdverTypeRepo;
use App\Repo\Category\CategoryRepo;
use App\Repo\Category\CategoryEloquent;
use App\Repo\Job\JobRepo;
use App\Repo\Job\JobEloquent;
use App\Repo\Location\LocationRepo;
use App\Repo\Location\LocationEloquent;


class AppServiceProvider extends ServiceProvider
{



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->singleton(UserRepo::class,UserEloquent::class);
            $this->app->singleton(CompanyRepo::class,CompanyEloquent::class);
            $this->app->singleton(AdverTypeRepo::class,AdverTypeEloquent::class);
            $this->app->singleton(CategoryRepo::class,CategoryEloquent::class);
            $this->app->singleton(JobRepo::class,JobEloquent::class);
            $this->app->singleton(LocationRepo::class,LocationEloquent::class);

    }
}
