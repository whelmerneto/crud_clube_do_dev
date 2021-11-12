@extends('layouts.app')
@section('title' , 'Editando Produto')
@section('content')

<div class="d-flex justify-content-center">
    <h1>Editando seu produto</h1>
</div>
    
    <div class="card col-8" style="margin:auto;">
        <div class="card-body">
            <form classs="card-body form-group" action="{{ route('product_update', $products->id) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <img src="{{ asset('storage/images/products/'.$products->image) }}" height="100px">
                
                <div class="form-group mt-3">
                    <label for="product_image">Deseja alterar a imagem?</label>
                    <input type="file"  class="form-control" id="product_image" name="image" value="teste.php">
                </div>
                <div class="form-group">
                    <label for="product_name">Nome do produto</label>
                    <input type="text" class="form-control" id="product_name" aria-describedby="product_help" name ="name" value=" {{ $products->name }} " required>
                    <small id="product_help" class="form-text text-muted">Insira o nome do seu produto.</small>
                </div>
                <div class="form-group">
                    <label for="product_description">Descrição</label>
                    <textarea class="form-control" id="product_description" rows="3" required name="description">  {{ $products->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="product_price">Preço do produto</label>
                    <input type="text" class="form-control" min="0.01" step="0.01" aria-describedby="product_price" name="price" value=" {{ $products->price }} " />
                    <small id="product_price" class="form-text text-muted">Insira o preço do seu produto.</small>
                </div>
                <button class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
@endsection