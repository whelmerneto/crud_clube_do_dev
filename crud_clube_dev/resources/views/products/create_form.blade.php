@extends('layouts.app')
@section('title', 'Crie seu Produto')
@section('content')

<div class="d-flex justify-content-center">
    <h1>Adicione um produto</h1>
</div>
    
    <div class="card col-8" style="margin:auto;">
        <div class="card-body">
            <form classs="card-body form-group" action="{{ route('products_create_store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group mt-2">
                    <label for="product_image">Insira uma Imagem</label>
                    <input type="file"  class="form-control-file" id="product_image" name="image" required>
                </div>
                <div class="form-group mt-2">
                    <label for="product_name">Nome do produto</label>
                    <input type="text" class="form-control" id="product_name" aria-describedby="product_help" name ="name" required>
                    <small id="product_help" class="form-text text-muted">Insira o nome do seu produto.</small>
                </div>
                <div class="form-group mt-2">
                    <label for="product_description">Descrição</label>
                    <textarea class="form-control" id="product_description" rows="3" required name="description"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="product_price">Preço do produto</label>
                    <input type="number" class="form-control" min="0.01" step="0.01" placeholder="00.00" aria-describedby="product_price" name="price"/>
                    <small id="product_price" class="form-text text-muted">Insira o preço do seu produto.</small>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
@endsection