@extends('layouts.master')

@section('title')
<title>add category</title>
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
      <form class="row g-3 flex justify-center items-center" action="{{route('category.store')}}" method="post">
        @csrf
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Ten Danh Muc</label>
          <input type="text" style="width:324px;" class="form-control" name="name" placeholder="Nhập tên">
        </div>
        <div class="col-12" style="margin-left: 37px">
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