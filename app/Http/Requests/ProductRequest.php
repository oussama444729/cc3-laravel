<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'picture' => ['nullable', 'image', 'max:2048']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
       return [
        'name.required' => 'Le nom du produit est obligatoire.',
        'description.required' => 'La description du produit est obligatoire.',
         'price.required' => 'Le prix du produit est obligatoire.',
        'price.numeric' => 'Le prix doit être un nombre valide.',
         'price.min' => 'Le prix ne peut pas être négatif.',
        'category_id.required' => 'Veuillez sélectionner une catégorie.',
        'category_id.exists' => 'La catégorie sélectionnée est invalide.',
        'supplier_id.required' => 'Veuillez sélectionner un fournisseur.',
        'supplier_id.exists' => 'Le fournisseur sélectionné est invalide.',
        'picture.image' => 'Le fichier doit être une image.',
        'picture.max' => "La taille de l'image ne peut pas dépasser 2 Mo."
             ];

    }
}