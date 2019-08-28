@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $category->translate['title'] }}</div>

                <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <select id="product_id">
                            <option>Виберете продукт</option>
                            @foreach ($products as $product)
                            <option value="{{ route('product', $product->id) }}">{{ $product->translate['title'] }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-sm" id="attr_1">
                        </div>
                        <div class="col-sm" id="attr_2">
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
