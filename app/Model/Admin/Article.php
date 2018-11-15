<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    public $timestamps = false;

	public function create($data)
	{
		$data['createTime'] = time();
		return $this->insertGetId($data);	
	}
}
