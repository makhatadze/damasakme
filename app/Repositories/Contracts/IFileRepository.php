<?php
/**
 *  app/Repositories/Contracts/IFileRepository.php
 *
 * Date-Time: 02.05.22
 * Time: 08:15
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Repositories\Contracts;

use App\Repositories;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

interface IFileRepository extends Repositories\Base\IBaseRepository
{

    /**
     * @param Request $request
     * @return mixed
     */
    public function setRequest(Request $request);

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    public function setFile(UploadedFile $file);

    /**
     * @param string $disk
     * @return mixed
     */
    public function setFileSystemMode($disk = 'public');

    /**
     * @return mixed
     */
    public function getFile();

    /**
     * @return mixed
     */
    public function uploadFile();

}