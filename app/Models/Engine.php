<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 12:41
 */

namespace AutoProff\App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Engine
 * @package AutoProff\App\Models
 */
class Engine extends Eloquent
{
    protected $table = 'engines';

    protected $casts = [
        'automatic' => 'boolean'
    ];
}