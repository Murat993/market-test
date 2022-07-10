<?php

namespace App\Services;


use App\Http\Requests\Api\Catalog\SearchRequest;
use App\Models\Catalog;
use Illuminate\Pagination\LengthAwarePaginator;

class CatalogService
{
    public function search(SearchRequest $request): LengthAwarePaginator
    {
        $query = Catalog::with(['category', 'attributes']);

        if (!empty($value = $request->get('category_d'))) {
            $query->where('category_d', $value);
        }

        if (!empty($value = $request->get('price'))) {
            $query->where('price', $value);
        }

        if (!empty($value = $request->get('attribute_id'))) {
            $query->whereHas('attributes', function ($query) use($value) {
                $query->where('id', $value);
            });
        }

        return $query->paginate(30);
    }

    public function getCatalog(string $slug): object
    {
        $catalog = Catalog::with(['category', 'attributes'])->where('slug', $slug)->first();

        if (empty($catalog)) throw new \DomainException('Catalog not found.');

        return $catalog;
    }
}
