<?php
namespace App\Components;
use App\Models\Menu;

class MenuRecusive
{
    private $data;
    private $html = '';

    public function __construct()
    {
        $this->data = Menu::all(); // Lấy tất cả menu khi khởi tạo
        $this->html = '';
    }

    public function menuRecusiveAdd($parentId = 0, $subMark = '')
    {
        foreach ($this->data as $dataItem) {
            if ($dataItem->parent_id == $parentId) {
                $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
                $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
            }
        }
        return $this->html;
    }

    public function menuRecusiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdMenuEdit == $dataItem->id) {
                $this->html .= '<option selected value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            } else {
                $this->html .= '<option value="' . $dataItem->id . '">' . $subMark . $dataItem->name . '</option>';
            }
            $this->menuRecusiveEdit($parentIdMenuEdit, $dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
