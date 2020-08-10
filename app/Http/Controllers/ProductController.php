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
        return response()->json(Product::with('storages')->paginate(self::PER_PAGE));
    }

    /**
     * Return a list of products without pagination
     * 
     * @return JsonResponse
     */
    public function list()
    {
        return response()->json(Product::with('storages')->get());
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
        return response()->json(Product::find($id));
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

            $product = Product::create($request->all());

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

            $product = Product::find($id)->update($request->all());

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
    public function delete($id)
    {
        try {
            DB::beginTransaction();

            $product = Product::find($id)->delete();

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
