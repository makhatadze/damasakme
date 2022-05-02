<?php
/**
 *  app/Providers/RepositoryServiceProvider.php
 *
 * Date-Time: 02.05.22
 * Time: 08:15
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Providers;

use App\Repositories\Contracts\IFileRepository;
use App\Repositories\Eloquent\FileRepository;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IFileRepository::class,FileRepository::class);
    }
}
