<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    protected function createOption($data, $selected=0)
    {
        $optionStr = '';
        if(is_array($data) && $data){
            foreach ($data as $key => $value) {
                $selStr = $key == $selected ? 'selected' : '';
                $optionStr .= '<option value="' . $key . '" ' . $selStr . '>' . $value . '</option>';
            }
        }
        return $optionStr;
    }
}
