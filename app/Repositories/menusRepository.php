<?php

namespace App\Repositories;

use App\Models\menus;
use InfyOm\Generator\Common\BaseRepository;

class menusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'abc'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return menus::class;
    }
}
