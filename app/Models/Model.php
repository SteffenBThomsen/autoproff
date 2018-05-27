<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 12:41
 */

namespace AutoProff\App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Model
 * @package AutoProff\App\Models
 */
class Model extends Eloquent
{
    protected $table = 'models';

    public function brand() : BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
}