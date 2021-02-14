<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $table = "books";

    protected $fillable = [
        'categori_id',
        'name',
        'description',
        'year'

    ];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
