@if (session('success'))
    <div class="alert alert-success text-center mb-4">
        {{ session('success') }}
    </div>
@endif

@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center bg-light p-4 rounded shadow-sm">
        <h2 class="display-4 mb-4 text-primary">Bienvenue au Système de Gestion des Stocks</h2>
        <p class="lead mb-4 text-muted">Gérez efficacement votre inventaire et vos clients</p>
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <a href="/customers" class="btn btn-primary btn-lg m-2 shadow">Liste des Clients</a>
            <a href="/suppliers" class="btn btn-success btn-lg m-2 shadow">Liste des Fournisseurs</a>
            <a href="/products" class="btn btn-info btn-lg m-2 shadow">Liste des Produits</a>
            <a href="/products-by-category" class="btn btn-warning btn-lg m-2 shadow">Produits par Catégorie</a>
            <a href="/products-by-supplier" class="btn btn-secondary btn-lg m-2 shadow">Produits par Fournisseur</a>
            <a href="/products-by-store" class="btn btn-dark btn-lg m-2 shadow">Produits par Magasin</a>
            <a href="{{ route('orders.index') }}" class="btn btn-danger btn-lg m-2 shadow">Commandes par Client</a>
        </div>
    </div>
</div>
@endsection