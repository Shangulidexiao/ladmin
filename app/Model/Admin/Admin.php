<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $table = 'admin';

    public $timestamps = false;
    
    public function exist($userName)
    {
        return $this->where([['userName', $userName],['isDel',0]])->first();
    }
    
    public function create(array $data)
    {
        $data['createTime'] = time();
        $data['password'] = Hash::make($data['password']);
        return $this->insertGetId($data);
    }
    
    public function adminByIds($list, $colName='adder')
    {
        $ids = [];
        foreach ($list as $admin) {
            $ids[] = $admin['adder'];
        }
        $admins = $this->whereIn('id',$ids)->get();
        $idNames = [];
        foreach ( $admins as $admin){
            $idNames[$admin['id']] = $admin['userName'];
        }
        return $idNames;
    }
}
