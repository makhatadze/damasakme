<?php
/**
 *  app/Repositories/Base/Eloquent/BaseRepository.php
 *
 * Date-Time: 02.05.22
 * Time: 08:17
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Repositories\Base\Eloquent;

use App\Repositories\Base\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var
     */
    protected $user;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return $this->model->$method(...$parameters);
    }

    /**
     * Get the associated model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @param $model
     * @return $this
     */
    public function setModel($model): static
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function adminFilter($filter)
    {
        return $this->model->AdminFilters($filter);
    }

    /**
     * @param $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}