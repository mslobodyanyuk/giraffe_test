<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'authorName',
        'text',
        'created_at',
        'user_id'
    ];

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPage()
    {
        return $this->latest()->paginate(5);
    }

    /**
     * @param int $id
     * @return Model|static
     */
    public function getById($id)
    {
        return $this->where(['id'=>$id])->firstOrFail();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

}
