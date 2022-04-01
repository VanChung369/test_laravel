@extends('layouts.master')

@section('title')
<title>San Pham</title>
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

  <main class="px-3" style="background-color: white; width:100%; height:800px">
    <div class="content-wrapper">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12"><a href="{{route('product.create')}}" class="btn btn-success m-4 float-left">Thêm</a>
            </div>
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên san pham</th>
                    <th scope="col">trang thai</th>
                    <th scope="col">hanh dong</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $item)
                  <tr>
                    <th scope="row">{{$item ->id}}</th>
                    <td>{{$item ->name}}</td>
                    @if ($item->status)
                    <td style="color: #6adf9f">Active</td>
                    @else
                    <td>Inactive</td>
                    @endif
                    <td>
                      <a href="{{route('product.edit',['id'=>$item->id])}}" class="btn btn-default">Sửa</a>
                      <a href="{{route('product.delete',['id'=>$item->id])}}" class="btn btn-danger">Xóa</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="rol">
            <div class="col-sm-3"> {{ $products->onEachSide(5)->links('pagination::bootstrap-4') }} {{--hien thi phan
              con lai cua trang (phan lai trang)--}}</div>

          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection