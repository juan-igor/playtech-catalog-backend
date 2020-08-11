<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Storage;

class ProductController extends Controller
{
    const PER_PAGE = 15;

    /**
     * Return a list of products paginated
     * 
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Product::with('storages:storages.storage_id')->paginate(self::PER_PAGE));
    }

    /**
     * Return a list of products without pagination
     * 
     * @return JsonResponse
     */
    public function list()
    {
        return response()->json(Product::with('storages:storages.storage_id')->get());
    }

    /**
     * Return a product information from product ID
     * 
     * @param int $id Product ID
     * 
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json(Product::with('storages:storages.storage_id')->find($id));
    }

    /**
     * Store new product
     * 
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $infos = $request->all();

            $infos['available_size'] = $this->getStringFromArray($infos['available_size']);

            $product = Product::create($infos);
            $product->storages()->attach($infos['images']);

            if ($product) {
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Produto armazenado.',
                ]);
            }

            throw new \Exception(__('O produto não pôde ser armazenado.'));
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $this->exceptionMessage($ex),
                'trace' => $this->exceptionTrace($ex)
            ]);
        }
    }

    /**
     * Update an existing product from product ID
     * 
     * @param Request $request
     * @param int $id Product ID
     * 
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $infos = $request->all();

            if(!empty($infos['available_size'])) $infos['available_size'] = $this->getStringFromArray($infos['available_size']);

            $product = Product::find($id)->update($infos);

            if(!empty($infos['images'])) $product->storages()->sync($infos['images']);

            if ($product) {
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Produto atualizado.',
                ]);
            }

            throw new \Exception(__('O produto não pôde ser atualizado.'));
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $this->exceptionMessage($ex),
                'trace' => $this->exceptionTrace($ex)
            ]);
        }
    }

    /**
     * Delete product from product ID
     * 
     * @param int $id Product ID
     * 
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $product = Product::find($id);

            if($product !== null){
                $storages = $product->storages()->get();

                foreach($storages as $storage){
                    $storage->delete();
                }

                $product = $product->delete();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Produto de ID '.$id.' não existe.'
                ]);
            }

            if ($product) {
                DB::commit();

                return response()->json([
                    'success' => true,
                    'message' => 'Produto deletado.',
                ]);
            }

            throw new \Exception(__('O produto não pôde ser deletado.'));
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $this->exceptionMessage($ex),
                'trace' => $this->exceptionTrace($ex)
            ]);
        }
    }
}
