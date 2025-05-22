<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function index(){
    return view('customers.index', [
        'customers' => Customer::paginate(10)
    ]);
   }

   public function create(){
    return view('customers.create');
   }
}
