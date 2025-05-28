<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     */
    public function index(): View
    {
        return view('customers.index', [
            'customers' => Customer::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create(): View
    {
        return view('customers.create');
    }

    
    public function store(CustomerRequest $request): RedirectResponse
    {
        
        Customer::create($request->validated());

        return redirect()->route('customers.index')
            ->with('success', 'Customer created successfully.');
    }

    
    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

  
    public function update(CustomerRequest $request, Customer $customer): RedirectResponse
    {
        
        $customer->update($request->validated());

        return redirect()->route('customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    
    public function delete(Customer $customer): View
    {
        return view('customers.delete', compact('customer'));
    }

   
    public function destroy(Customer $customer): RedirectResponse
    {
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer deleted successfully.');
    }

   
    public function searchTerm(Request $request, $term)
    {

        $customers = Customer::where('first_name', 'like', "%{$term}%")
            ->orWhere('last_name', 'like', "%{$term}%")
            ->orWhere('email', 'like', "%{$term}%")
            ->orWhere('phone', 'like', "%{$term}%")
            ->orWhere('address', 'like', "%{$term}%")
            ->get();

        return response()->json($customers);
    }
  
    public function search(Request $request)
    {
$term = $request->input('term');
        $customers = Customer::where('first_name', 'like', "%{$term}%")
            ->orWhere('last_name', 'like', "%{$term}%")
            ->orWhere('email', 'like', "%{$term}%")
            ->orWhere('phone', 'like', "%{$term}%")
            ->orWhere('address', 'like', "%{$term}%")
            ->paginate(10);

        return response()->json([
            'customers' => $customers->items(),
            'pagination' => [
                'total' => $customers->total(),
                'per_page' => $customers->perPage(),
                'current_page' => $customers->currentPage(),
                'last_page' => $customers->lastPage(),
                'from' => $customers->firstItem(),
                'to' => $customers->lastItem(),
                'links' => $customers->linkCollection()->toArray()
            ]
        ]);
    }
}
