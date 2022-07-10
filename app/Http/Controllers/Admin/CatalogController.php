<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatalogAttrStoreRequest;
use App\Http\Requests\Admin\CatalogEditRequest;
use App\Http\Requests\Admin\CatalogStoreRequest;
use App\Models\Attribute;
use App\Models\AttributeUnit;
use App\Models\Catalog;
use App\Models\Category;
use Doctrine\DBAL\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $models = Catalog::with('category')->orderBy('id', 'desc')->paginate(30);

        return view('catalog.index', compact('models'));
    }

    public function create(Request $request)
    {
        $model = new Catalog();
        $categories = Category::categoryTree(Category::get()->toTree());

        return view('catalog.form', compact('model', 'categories'));
    }

    public function store(CatalogStoreRequest $request)
    {
        Catalog::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'price' => $request['price'],
            'slug' => Str::slug($request['name'])
        ]);

        return redirect(route('admin.catalogs.index'));
    }

    public function edit($id)
    {
        $model = Catalog::findOrFail($id);
        $categories = Category::categoryTree(Category::get()->toTree());

        return view('catalog.form', compact('model', 'categories'));
    }

    public function update(CatalogEditRequest $request, $id)
    {
        $model = Catalog::findOrFail($id);

        $model->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'price' => $request['price'],
            'slug' => Str::slug($request['name'])
        ]);

        return redirect(route('admin.catalogs.index'));
    }

    public function createAttr($id)
    {
        $model = Catalog::with('attributes')->findOrFail($id);
        $unitList = AttributeUnit::pluck('name', 'id');

        return view('catalog.create-attr', compact('model', 'unitList'));
    }

    public function storeAttr(CatalogAttrStoreRequest $request, $id)
    {
        Catalog::findOrFail($id)->attributes()->create([
            'type' => $request['type'],
            'attribute_units_id' => $request['attribute_units_id'],
            'value' => $request['value'],
        ]);

        return redirect(route('admin.catalogs.index'));
    }

    public function destroy($id)
    {
        $model = Catalog::findOrFail($id);
        $model->delete();
        return redirect(route('admin.catalogs.index'));
    }
}
