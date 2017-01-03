<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class menus
 * @package App\Models
 * @version January 3, 2017, 4:04 am UTC
 */
class menus extends Model
{
    use SoftDeletes;

    public $table = 'menuses';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'abc'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'abc' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'abc' => 'required|max:10'
    ];

    
}
