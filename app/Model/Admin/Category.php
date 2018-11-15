<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'article_cate';

    public $timestamps = false;
    
    public function getTop(Array $data = [])
    {
        $topCate = $this->where([['pId', 0], ['isDel', 0]])->select('id', 'name')->get();
        if(isset($data['kv']) && $data['kv']){
            $kv = [];
            foreach ($topCate as $item) {
                $kv[$item['id']] = $item['name'];
            }
            return $kv;
        }
        return $topCate;
    }
    
    public function getSub(Array $data = [])
    {
        if(isset($data['pId']) && $data['pId'] > 0){
            $categoryModel = $this->where('pId', $data['pId']);
        }else{
            $categoryModel = $this->where('pId','!=', 0);
        }
        $subCate = $categoryModel->where('isDel', 0)->select('id', 'name')->get();
        if(isset($data['kv']) && $data['kv']){
            $kv = [];
            foreach ($subCate as $item) {
                $kv[$item['id']] = $item['name'];
            }
            return $kv;
        }
        return $subCate;
    }
    
    public function getAll(Array $data = [])
    {
        $cate = $this->where('isDel', 0)->select('id', 'name')->get();
        if(isset($data['kv']) && $data['kv']){
            $kv = [];
            foreach ($cate as $item) {
                $kv[$item['id']] = $item['name'];
            }
            return $kv;
        }
        return $cate;
    }
    
    public function create($insertItem)
    {
        return $this->insertGetId($insertItem);
    }
}
