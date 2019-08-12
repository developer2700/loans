<?php

namespace App\Models;

use App\Util\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    use  Filterable;

    protected $tablename = "loans";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'amount',
        'interest',
        'duration',
        'dateApplied',
        'dateLoanEnds',
        'campaign',
        'status',
        'created_at',
        'updated_at',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user'
    ];

    /**
     * Get the key name for route model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    /**
     * Get  user age alias
     *
     * @return string filename
     */
    public function getAgeAttribute()
    {
        if ($this->image) {
            return url('/uploads/' . $this->image);
        }
        return url('/uploads/default.png');
    }

    /**
     * Get image Thumb fullPathName
     *
     * @return string filename
     */
    public function getThumbAttribute()
    {
        if ($this->image) {
            return url('/uploads/thumb-' . $this->image);
        }
        return url('/uploads/default.png');
    }


    /**
     * Get all the tags that belong to the car.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
