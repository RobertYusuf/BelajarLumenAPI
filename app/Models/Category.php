<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = "categories";

    protected $fillable = [
        'code',
        'name'
    ];
    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }
}
