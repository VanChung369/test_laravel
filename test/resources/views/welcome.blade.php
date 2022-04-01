@extends('layouts.master')

@section('title')
<title>Trang chủ</title>
@endsection
@section('content')
    
        <body class="d-flex h-100 text-center text-white bg-dark">
    
            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
              <header class="mb-auto">
                <div>
                  <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Quan Ly San Pham</a>
                    <a class="nav-link" href="{{route('category.index')}}">Quan Ly Danh Muc</a>
                  </nav>
                </div>
              </header>
              <main role="main">
            </main>
            </div>
@endsection