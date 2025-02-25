@extends('layouts.admin') {{-- load toàn bộ file layout.admin --}}

@section('title')
    <title>
        Trang chủ
    </title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Sửa', 'key' => 'danh mục'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6  ">
                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" name ="name" value="{{ $category->name }}" class = "form-control" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="parent_id">
                                    <option value = "0">Chọn danh mục</option>
                                    {!! $htmlOption !!} {{-- dùng {!! !!} để nhận string --}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
