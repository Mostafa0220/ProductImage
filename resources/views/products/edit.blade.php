@extends('layouts.master')

@section('content')
    <h1>Edit Product<a href="{{ url('/product') }}" class="btn btn-primary pull-right btn-sm">Back</a></h1>
    <hr/>

    
    <form method="post" action="{{action('ProductController@update', $id)}}" class= 'form-horizontal' role='form'  enctype="multipart/form-data" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
        <!-- Title Field -->
        
        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            
            <label for="title" class="col-sm-3 control-label">Title</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Title" name="title" value="{{$product->title}}">
                
                <span class="help-block text-danger">
                    {{ $errors -> first('title') }}
                </span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            
            <label for="price" class="col-sm-3 control-label">Price</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Price" name="price" value="{{$product->price}}">
                
                <span class="help-block text-danger">
                    {{ $errors -> first('price') }}
                </span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-6">
                
                <textarea id="description" rows="4" cols="50" class="form-control" placeholder="Description" name="description">{{$product->description}}</textarea>
                
                <span class="help-block text-danger">
                    {{ $errors -> first('description') }}
                </span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('product_image') ? ' has-error' : '' }}">
            
            <label for="product_image" class="col-sm-3 control-label"> Upload File</label>
            <div class="col-sm-6">
            
            <input type="file" name="product_image" id="product_image" class="form-control">
            <span class="help-block">@if($product->product_image)
                        <img src='{{asset("/images/$product->product_image")}}' id="preview" class="img-responsive center-block">
                        @else
                        <img src='{{asset("/images/no-img.png")}}'  id="preview" class="img-responsive center-block">
                        @endif</span>
                <span class="help-block text-danger">
                    {{ $errors -> first('product_image') }}
                </span>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
               
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
    <script>
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $('#product_image').change(function() {
        readURL(this);
        });
    
    </script>
@endsection
