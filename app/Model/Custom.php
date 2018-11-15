<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Custom extends Model
{
    use SoftDeletes;

    protected $table = 'custom';

    protected $dates = ['delete_at'];

    public function create(Array $data)
    {
        
        $preCustom = $this->orderBy('id', 'desc')->first();
        $preCustomId = isset($preCustom->customId) ? $preCustom->customId : 0;
        $this->userName = $data['userName'];
        $this->customId = str_pad((int)$preCustomId+1, 6, '0', STR_PAD_LEFT);
        $this->trueName = $data['trueName'];
        $this->email    = $data['email'];
        $this->nickName = $data['nickName'];
        $this->adminId  = $data['adder'];
        $this->password = Hash::make($data['password']);
        $this->save();
    }

    public function exist($username)
    {
        return (bool)$this->where('userName', $username)->first();
    }
}
