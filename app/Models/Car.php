<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 11:14
 */

namespace AutoProff\App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Car extends Eloquent
{
    protected $table = 'cars';

    protected $fillable = [
        'model_id',
        'description',
        'mileage',
        'year',
        'engine_id'
    ];

    protected $with = [
        'engine',
        'model',
        'model.brand'
    ];

    public function engine() : HasOne
    {
        return $this->hasOne(Engine::class, 'id', 'engine_id');
    }

    public function model() : HasOne
    {
        return $this->hasOne(Model::class, 'id', 'model_id');
    }
}

