<?php
namespace App\Components;

class CategoryRecusive
{
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function categoryRecusive($parentId, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value->parent_id == $id) {
                $selected = !empty($parentId) && $parentId == $value->id ? 'selected' : '';
                $this->htmlSelect .= "<option value='" . $value->id . "' $selected>" . $text . $value->name . '</option>';
                $this->categoryRecusive($parentId, $value->id, $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}
