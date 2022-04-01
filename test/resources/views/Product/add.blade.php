@extends('layouts.master')

@section('title')
<title>Add product</title>
@endsection
@section('css')
<style>
  main form input {
    width: 500px;
  }
</style>
@endsection
@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <header class="mb-auto">
    <div>
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Quan Ly San Pham</a>
        <a class="nav-link" href="{{route('category.index')}}">Quan Ly Danh Muc </a>
      </nav>
    </div>
  </header>

  <main class="px-3" style="background-color: white; width:100%; height:800px; color:black">
    <div class="cover-container d-flex w-50 h-28 p-3 mx-auto flex-column " style="border:1px solid;margin-top:156px">
      <form class="" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-4">
          <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
          </div>
        </div>
        <br />
        <div class="col-md-4">
          <div class="form-group">
            <label>Danh Muc</label>
            <select class="form-control select2_ini " name="category_id">
              <option value="">Chọn danh mục</option>
              {!! $htmlOption !!}
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Giá sản phẩm</label>
            <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Số lượng sản phẩm</label>
            <input type="text" class="form-control" name="quantity" placeholder="Nhập Số lượng sản phẩm">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Anh san pham</label>
            <input type="file" class="form-control-file" name="feature_image_path">
          </div>
        </div>
        <div class="col-12" style="margin-left: -222px">
          <div class="form-check">
            <input class="form-check-input -mb-2" name="Activi" style="margin-left: 198px;" type="checkbox" value="1"
              id="invalidCheck">
            <label class="form-check-label" style=" margin-right: 358px" for="invalidCheck">
              Activi
            </label>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </main>
</div>
@endsection