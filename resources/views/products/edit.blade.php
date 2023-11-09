@extends('layoutsForFiltering.app')

@section('main')

    <div class="container">
        <h1>Edit products</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                    <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
                       
                    @csrf

                        @method('PUT')

                        <div class="form-group">

                            <label>Name:</label>

                            <input type="text" name="name" class="form-control" value="{{ old('name',$product->product_name) }}">
                           
                            @if($errors->has('name'))
                            <span class="text-danger">
                                {{$errors->first('name')}}
                            </span>
                            @endif

                        </div>
                        <div class="form-group">

                            <label>Description:</label>

                            <textarea name="description" class="form-control" rows="4">{{ old('description',$product->description) }}</textarea>
                           
                            @if($errors->has('description'))
                            <span class="text-danger">
                                {{$errors->first('description')}}
                            </span>
                            @endif
                        </div>

                        <div class = "form-group">

                        @if(!empty($product->image))


                        @endif
                            
                        </div>

                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" name="images" class="form-control" value="{{ old('images', $product->image) }}">
                           
                            @if($errors->has('images'))
                            <span class="text-danger">
                                {{$errors->first('images')}}
                            </span>
                            @endif

                        </div>
                      <div class="text-center mb-2">  <button type="submit" style="background-color: gray; color: white;">Click To Submit</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
