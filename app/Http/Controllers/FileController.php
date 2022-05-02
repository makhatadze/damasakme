<?php
/**
 *  app/Http/Controllers/FileController.php
 *
 * Date-Time: 02.05.22
 * Time: 08:21
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */
namespace App\Http\Controllers;

use App\Repositories\Contracts\IFileRepository;
use Illuminate\Http\Request;

class FileController extends Controller
{

    /**
     * @var string
     */
    public $viewFolderName = 'file';

    /**
     * DashboardController constructor.
     * @param IFileRepository $fileRepository
     */
    public function __construct(
        IFileRepository $fileRepository
    )
    {
        $this->repository = $fileRepository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadForEditor(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $request->request->add(['type' => 'ck_editor']);
            $request->request->add(['file_type' => 'image']);

            // Upload file.
            $this->repository->setFile($request->file('file'))->setRequest($request)
                ->uploadFile();

            // Set file data.
            $file = $this->repository->getFile();

            // Set original image url.
            $originalUrl = $file->fullUrl;

            return response()->json(['urls' =>
                [
                    'default'   => $originalUrl
                ]]);
        } catch (\Exception $ex) {
            return response()->json(['error' =>
                [
                    'message'   => $ex->getMessage()
                ]]);
        }
    }

}