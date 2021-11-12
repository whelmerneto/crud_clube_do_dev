@extends('layouts.app')
@section('title', 'Listagem de Produtos')
@section('content')

<div class="col-8" style="margin:auto;">

    <div class="content d-flex justify-content-center">
        <h1 class="display-5">Produtos cadastrados</h1>
    </div>

    <div class="text-right">
        <a href="{{ route('products_create') }}"> 
            <button type="button" class="btn btn-dark">  
                <i class="fas fa-plus"></i>
            </button>
        </a>
    </div>

    <table class="table mt-3">
        <thead class="thead-dark">
            <tr>
                <th scope="col"> Foto</th>
                <th scope="col"> Nome </th>
                <th scope="col"> Preço </th>
                <th scope="col"> Ações </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td> <image height="50px" src="{{ asset('/storage/images/products/'. $product->image ) }}"></td>
                <td> {{ $product->name }} </td>
                <td> R${{ $product->price }} </td>
                <td>
                    <a href="{{ route('product_edit', $product->id) }}"><i class="fas fa-edit"> </i></a>
                    <a href="{{ route('product_delete', $product->id) }}"><i class="fas fa-trash-alt" style="color:red;"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>

@endsection