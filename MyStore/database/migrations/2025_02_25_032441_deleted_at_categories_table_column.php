<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes(); // Đánh dấu bản ghi đã bị xóa mềm thay vì xóa hẳn khỏi database
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes('deleted_at'); //Xóa cột deleted_at khỏi bảng, không thể sử dụng tính năng soft delete trên bảng
        });
    }
};
