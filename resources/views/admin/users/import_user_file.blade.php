@extends('layouts.admin.layout')
@section('title')
    {{ __('main.import_user')}}
@endsection
@section('content')
  @component('components.breadcrumb')
  @slot('li_1') {{__('main.import')}} @endslot
  @slot('title') {{__('main.users')}} @endslot
  @slot('link') {{ route('admin.usersList')}} @endslot
  @endcomponent
  <form action="{{ route('admin.importUsers') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <div class="col-lg-8">
          <div class="card shadow mb-4">
              <div class="card-header py-3 d-flex align-items-center" style="background: none">
                  <h6 class="col-10 m-0 font-weight-bold text-primary flex-grow-1">Choose file</h6>
              </div>
              <div class="card-body">
                <input type="file" name="file" class="form-control custom-file-input" id="customFile" required>
                <div class="col-4 mt-2">
                  <button  class="btn btn-primary" id="submitButton">Import Users</button>
                </div>
              </div>
            </div>
        </div>
    </div>
  </form>
@endsection

