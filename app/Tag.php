<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function products()
	{
		return $this->belongsToMany('CodeCommerce\Product');
	}

    public function createTag($arrayTag)
    {
        $tag = $this->where('name','=', $arrayTag['name'])->first();

        if ($tag)
		{
            return $tag;
        }

        return $this->create($arrayTag);
    }
}
