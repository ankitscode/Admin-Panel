@extends('layouts.admin.layout')
@section('title')
    {{ __('main.edit_product') }}
@endsection
@section('css')
    <link rel="stylesheet" href={{ asset('assets/css/dropify.css') }}>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            {{ __('main.edit') }}
        @endslot
        @slot('title')
            {{ __('main.product') }}
        @endslot
        @slot('link')
            {{ route('admin.productList') }}
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <form method="POST" id="Updateproduct"
                    action="{{ route('admin.updateProduct', ['id' => $productDetails->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background: none">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('main.product_details') }}</h6>
                        <div class="form-check form-switch">
                            <input type="checkbox" id="is_active" name="is_active" class="form-check-input mx-1"
                                @if ($productDetails->is_active) checked @endif>
                            <label class="form-check-label mx-1" for="is_active">{{ __('main.is_active') }}</label>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label for="product_name" class="form-label">{{ __('main.product_name') }}</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    id="product_name" name="product_name"
                                    value="{{ old('product_name', $productDetails->productname) }}"
                                    placeholder="{{ __('main.Enter Product Name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">{{ __('main.price') }}</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ old('price', $productDetails->price) }}"
                                    placeholder="{{ __('main.Enter Product Price') }}" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label for="description" class="form-label">{{ __('main.description') }}</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                    cols="30" rows="10">{{ old('description', $productDetails->description) }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">{{ __('main.category') }}</label>
                                <select class="form-select mb-3 @error('category') is-invalid @enderror" name="category_id"
                                    id="category" data-choices data-choices-search-false required>

                                    @php
                                        $selectedCategoryId = $productDetails->category->id ?? null;
                                    @endphp

                                    @if ($selectedCategoryId)
                                        <option value="{{ $selectedCategoryId }}" selected>
                                            {{ $productDetails->category->name }}
                                        </option>
                                        @foreach (\App\Models\Category::all() as $category)
                                            @if ($category->id != $selectedCategoryId)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="" selected disabled>{{ __('Select a category') }}</option>
                                        @foreach (\App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">{{ __('main.save_changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('main.product_picture') }}</h6>
                </div>
                <div class="card-body">
                    <div class="card-body text-center">
                        <img class="rounded-circle mb-2 avater-ext"
                            src="{{ !empty($productDetails->media->name) ? asset('storage/images/product/' . $productDetails->media->name) : asset('assets/images/users/user-dummy-img.jpg') }}"
                            style="height: 10rem; width: 10rem;">
                        <div class="large text-muted mb-4">
                            <span
                                class="badge rounded-pill badge-outline-{{ $productDetails->is_active ? 'success' : 'danger' }}">
                                {{ $productDetails->is_active ? __('main.active') : __('main.in_active') }}
                            </span>
                        </div>
                        <button class="btn btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#EditProductModal">{{ __('main.update_product_image') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for updating product image -->
    <div class="modal fade" id="EditProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('main.update_product_image') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.uploadProductImage', ['id' => $productDetails->id]) }}" class="dropzone"
                        id="myDropzone" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="fallback">
                            <input name="images[]" type="file" multiple />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="myDropzone">{{ __('main.update') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.myDropzone = {
            paramName: "images[]", // The name that will be used to transfer the files
            maxFilesize: 5, // MB
            uploadMultiple: true,
            addRemoveLinks: true,
            maxFiles: 5,
            acceptedFiles: 'image/jpeg, image/jpg, image/png, image/svg+xml',
            success: function(file, response) {
                console.log(file);
                console.log(response);  
                console.log("File uploaded successfully.");
            },
            error: function(file, response) {
                console.log(file);
                console.log(response);        
                console.log("Error uploading file.");
            }
        };
    </script>
@endsection
