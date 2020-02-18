@extends('layouts.master')

@section('content')
    <h1>Products List <a href="{{ url('/product/create') }}" class="btn btn-primary pull-right btn-sm">Add New Product</a></h1>
    <hr/>

    @include('partials.flash_notification')
    
    @if(count($products))
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td class="col-md-3">
                        @if($product->product_image)
                        <img src='{{asset("/images/$product->product_image")}}' class="img-responsive center-block">
                        @else
                        <img src='{{asset("/images/no-img.png")}}' class="img-responsive center-block">
                        @endif
                        
                        
                        </td>
                        <td>
                                <a href="{{action('ProductController@edit', $product->id)}}" class="btn btn-warning btn-xs">Edit</a>


                                

                            

                            <form action="{{action('ProductController@destroy', $product->id)}}" method="post" class='form-inline'>
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                
                            </form>
                            

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center">
            {!! $products->render() !!}
        </div>
    @else
        <div class="text-center">
            <h3>No products available yet</h3>
            <p><a href="{{ url('/product/create') }}">Create new product</a></p>
        </div>
    @endif
    @endsection