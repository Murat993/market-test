<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CatalogEditRequest;
use App\Http\Requests\Admin\CatalogStoreRequest;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Order;
use Doctrine\DBAL\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $models = Order::orderBy('id', 'desc')->paginate(30);

        return view('order.index', compact('models'));
    }

    public function show($id)
    {
        $model = Order::with('catalogs')->findOrFail($id);

        return view('order.show', compact('model'));
    }

    public function destroy($id)
    {
        $model = Order::findOrFail($id);
        $model->delete();
        return redirect(route('admin.orders.index'));
    }
}
