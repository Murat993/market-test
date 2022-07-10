<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Api\BaseController;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends BaseController
{
    /**
     * Category list
     */
    public function list()
    {
        try {
            $categories = Category::defaultOrder()->withDepth()->get()->toTree();

            return $this->handleResponse($categories);
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
