@extends('layouts.admin') {{-- Load toàn bộ file layout.admin --}}

@section('title')
    <title>Chỉnh sửa Menu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content-header', ['name' => 'Chỉnh sửa', 'key' => 'Menu'])
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id' => $menuFollowIdEdit->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $menuFollowIdEdit->name) }}" placeholder="Nhập tên menu">
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="parent_id">
                                    <option value="0">Vui lòng chọn</option>
                                    {!! $optionSelect !!} {{-- Dùng {!! !!} để nhận string HTML từ menuRecusiveAdd() --}}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            {{-- <a href="{{ route('menus.index') }}" class="btn btn-secondary">Hủy</a> --}}
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
