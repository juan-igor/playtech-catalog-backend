<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Storage as Entity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StorageController extends Controller
{
    /**
     * Get file from storage_id.
     *
     * @param string $id
     *
     * @return File
     */
    public function view($id)
    {
        $path = $this->getPath($id);

        if ($this->isExist($path)) {
            return response()->file($path);
        }

        return response()->json([
            'success' => false,
            'message' => 'Arquivo/Imagem não encontrado.'
        ], 404);
    }

    /**
     * Download file or image from storage_id.
     *
     * @param string $id
     *
     * @return Response
     */
    public function download($id)
    {
        $path = $this->getPath($id);
        $entity = Entity::where('storage_id', $id)->first();

        if ($this->isExist($path)) {
            return response()->download($path, $entity['filename']);
        }

        return response()->json([
            'success' => false,
            'message' => 'Arquivo/Imagem não encontrado.'
        ], 404);
    }

    /**
     * Upload a file to server.
     *
     * @param  Request  $request
     * @return Response
     */
    public function upload(Request $request)
    {
        try {
            DB::beginTransaction();

            $file = $request->file('file');

            if (empty($file)) {
                throw new \Exception('Não foi possível realizar o upload desse arquivo/imagem. Arquivo inexistente!');
            }

            $path = $this->uploadLocal($file);

            if ($path) {
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Arquivo/Imagem armazenado com êxito. Hash gerado.',
                    'storage_id' => $path,
                ]);
            }

            throw new \Exception('Não foi possível realizar o upload desse arquivo/imagem. Erro desconhecido!');
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'error_type' => 'exception',
                'message' => $this->exceptionMessage($exception),
                'trace' => $this->exceptionTrace($exception)
            ]);
        }
    }

    /**
     * Update a file from storage_id.
     *
     * @param Request $request
     * @param string $hash
     *
     * @return Response
     */
    public function update(Request $request, $hash)
    {
        try {
            DB::beginTransaction();

            $file = $request->file('file');

            if (empty($file)) {
                throw new \Exception('Não foi possível realizar o upload desse arquivo/imagem. Arquivo inexistente!');
            }

            $path = $this->updateLocal($file, $hash);

            if($path){
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Arquivo/Imagem atualizado com êxito. O hash gerado anteriormente não foi modificado.',
                    'storage_id' => $path,
                ]);
            }
            
            throw new \Exception('Não foi possível realizar o upload desse arquivo/imagem. Erro desconhecido!');
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'error_type' => 'exception',
                'message' => $this->exceptionMessage($exception),
                'trace' => $this->exceptionTrace($exception)
            ]);
        }
    }

    public function delete($hash)
    {
        try{
            DB::beginTransaction();

            $deleted = $this->deleteLocal($hash);

            if($deleted['deleted']){
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Arquivo/Imagem deletado com sucesso.'
                ]);
            } else {
                if($deleted['message'] != 'Erro desconhecido'){
                    return response()->json([
                        'success' => false,
                        'message' => $deleted['message']
                    ]);
                }
            }

            throw new \Exception('Não foi possível deletar o arquivo/imagem solicitado. Erro desconhecido.');
        } catch(\Exception $exception) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'error_type' => 'exception',
                'message' => $this->exceptionMessage($exception),
                'trace' => $this->exceptionTrace($exception)
            ]);
        }
    }

    /**
     * Upload a file to local storage
     * 
     * @param UploadedFile $file
     * @param string $folder
     * 
     * @return string
     * 
     * @throws ValidatorException
     */
    public function uploadLocal(UploadedFile $file, string $folder = '')
    {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $hashName = $file->hashName();
        $folder = empty($folder) ? 'files' : $folder;

        $path = Storage::disk('local')->putFile($folder, $file);

        $exploded = explode('.', $hashName);
        $storageId = array_shift($exploded);

        $created = Entity::create([
            'filename' => $filename,
            'extension' => $extension,
            'path' => $path,
            'storage_id' => $storageId,
            'file_type' => $folder
        ]);

        return $created ? $storageId : false;
    }

    /**
     * Update a file in local storage
     * 
     * @param UploadedFile $file
     * @param string $folder
     * @param string $storage_id
     * 
     * @return string
     * 
     * @throws ValidatorException
     */
    public function updateLocal(UploadedFile $file, string $storage_id, string $folder = '')
    {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $folder = empty($folder) ? 'files' : $folder;

        $class = Entity::where('storage_id', $storage_id)->first();
        if (!empty($class)) {
            Storage::disk('local')->delete($class['path']);
        }

        $path = Storage::disk('local')->putFileAs($folder, $file, $storage_id . '.' . $extension);

        $updated = Entity::updateOrCreate(
            ['storage_id' => $storage_id],
            [
                'filename' => $filename,
                'extension' => $extension,
                'path' => $path,
                'storage_id' => $storage_id,
                'file_type' => $folder
            ]
        );

        return $updated ? $storage_id : false;
    }

    /**
     * Delete a file in local storage
     * 
     * @param string $storage_id
     * 
     * @return array
     * 
     * @throws Exception
     */
    public function deleteLocal(string $storage_id, string $folder = '')
    {
        $folder = empty($folder) ? 'files' : $folder;
        $class = Entity::where('storage_id', $storage_id)->first();

        if (empty($class)) return [
            'deleted' => false,
            'message' => 'StorageID Hash não encontrado'
        ];

        if ($class['file_type'] !== $folder) {
            return [
                'deleted' => false,
                'message' => "O arquivo existe, porém, não na pasta: {$folder}"
            ];
        }

        Storage::disk('local')->delete($folder . '/' . $storage_id . '.' . $class['extension']);

        $deleted = $class->delete();

        if ($deleted) return [
            'deleted' => true
        ];
        else return [
            'deleted' => false,
            'message' => 'Erro desconhecido'
        ];
    }

    /**
     * Get Path from storage_id (hash)
     * 
     * @param string $id
     * 
     * @return string
     */
    public function getPath(string $id): string
    {
        $storage = Entity::where('storage_id', $id)->first();

        if (empty($storage)) {
            return false;
        }

        return storage_path('app/'.$storage->path) ?? '';
    }

    /**
     * Check if file exists
     * 
     * @param string $path
     * 
     * @return bool
     */
    public function isExist(string $path): bool
    {
        if (empty($path)) {
            return false;
        }

        return file_exists($path);
    }
}
