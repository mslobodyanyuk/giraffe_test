<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'authorName',
        'text',
        'created_at',
    ];

    public function getPage()
    {
        return $this->latest()->paginate(5);
    }

    public function getById($id)
    {
        return $this->where(['id'=>$id])->firstOrFail();
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
