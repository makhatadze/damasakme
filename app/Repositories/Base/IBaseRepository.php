<?php
/**
 *  app/Repositories/Base/IBaseRepository.php
 *
 * Date-Time: 02.05.22
 * Time: 08:16
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;

interface IBaseRepository
{

    /**
     * @return mixed
     */
    public function getModel();

    /**
     * @param $model
     * @return mixed
     */
    public function setModel($model);

    /**
     * @param $filter
     * @return mixed
     */
    public function adminFilter($filter);

    /**
     * @param $user
     * @return mixed
     */
    public function setUser($user);

}