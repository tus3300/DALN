@extends('layouts.admin') {{-- load toàn bộ file layout.admin --}}

@section('title')
    <title>
        Trang chủ
    </title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Thêm', 'key' => 'menu'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6  ">
                        <form action="{{route('menus.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Menu</label>
                                <input type="text" name ="name" class = "form-control" placeholder="Nhập tên menu">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="parent_id">
                                    <option value = "0">Vui lòng chọn</option>
                                    {!! $optionSelect !!} {{-- dùng {!! !!} để nhận string --}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
