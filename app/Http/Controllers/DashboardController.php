<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
       $user = User::find(1); // Récupérer l'utilisateur avec l'ID 1

         // Récupérer les catégories avec le nombre de leurs produits
        $categories = Category::withCount('products')->get();

         // Préparer les données pour le graphique des catégories
        $categoryLabels = $categories->pluck('name');
         $productCounts = $categories->pluck('products_count');

       // Récupérer les magasins avec le nombre de leurs produits
      $stores = Store::withCount('products')->get();

     // Préparer les données pour le graphique des magasins
     $storeLabels = $stores->pluck('name');
     $storeCounts = $stores->pluck('products_count');

        return view('dashboard', [
                          'pic' => $user->avatar,
                          'categoryLabels' => $categoryLabels,
                         'productCounts' => $productCounts,
                         'storeLabels' => $storeLabels,
                         'storeCounts' => $storeCounts
            ]);


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

   

   
    // sessions , cookies and image 
    public function  saveCookie(){
        $name = request()->input("txtCookie");
        Cookie::queue("UserName",$name,6000000);
        return redirect()->back();
    }
    public function saveSession(Request $request){
        $name = $request->input("txtSession");
        $request->session()->put("SessionName", $name);
        return redirect()->back();
    }

    public function saveAvatar(){
         request()->validate([
        'avatarFile'=>'required|image',
            ]);
    $ext = request()->avatarFile->getClientOriginalExtension();
    $name = Str::random(30).time().".".$ext;
    request()->avatarFile->move(public_path('storage/avatars'),$name);
    $user = User::find(1);
    $user->update(['avatar'=>$name]);
    return redirect()->back();
    }
}
