<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Catalog\SearchRequest;
use App\Http\Resources\CatalogCollection;
use App\Http\Resources\CatalogResource;
use App\Services\CatalogService;
use Illuminate\Http\Response;

class CatalogController extends BaseController
{
    private $service;

    public function __construct(CatalogService $service)
    {
        $this->service = $service;
    }
    /**
     * Catalog list
     */
    public function index(SearchRequest $request)
    {
        try {
            $catalogs = $this->service->search($request);
            return new CatalogCollection($catalogs);

        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Catalog show
     */
    public function show(string $slug)
    {
        try {
            $catalog = $this->service->getCatalog($slug);

            return new CatalogResource($catalog);
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
