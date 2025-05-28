<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function customers(): View
    {
        $customers  = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function suppliers(): View
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function products(): View
    {
        $products = Product::with(['category','supplier','stock'])->get();
        return view('products.index', compact('products'));
    }

    

   public function productsBySupplier(Request $request): View
{
    $suppliers = Supplier::all();
    $products = null;

    if ($request->filled('supplier_id')) {
        $products = Product::with(['stock', 'category'])
            ->where('supplier_id', $request->supplier_id)
            ->get();
    }
 dd($products);
    return view('products.by-supplier', compact('suppliers', 'products'));
}

    

    public function productsByStore(Request $request): View
{
    $stores = Store::all();
    $products = collect();

    if ($request->filled('store_id')) {
        $store = Store::find($request->store_id);
        if ($store) {
            $products = $store->products()->with(['category', 'stock'])->get();
        }
    }

    return view('products.by-store', compact('stores', 'products'));
}

   

    public function getProductsByStore(Store $store)
    {
        $stores = Store::all();
        $products = $stores->products;
        return view('products.by-store', compact('stores', 'products'));
    }
    public function orders()
    {
        return view("orders.index");
    }
}
