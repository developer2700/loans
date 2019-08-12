<?php

namespace App\Models;

use App\Util\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use  Filterable;

    protected $tablename = "users";


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'personalCode',
        'firstName',
        'lastName',
        'phone',
        'active',
        'isDead',
        'lang',
        'created_at',
        'updated_at',
    ];

    /**
     * Get all the loans that belong to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function loans()
    {
        return $this->hasMany(Loan::class)->latest();
    }


    /**
     * Get user BirthDate alias as formatted string
     *
     * @return date BirthDate
     */
    public function getBirthDateFormattedAttribute()
    {
        return $this->birthDate ? $this->birthDate->format('Y-m-d') : null;
    }

    /**
     * Get user BirthDate alias
     *
     * @return date BirthDate
     */
    public function getBirthDateAttribute()
    {

        if(strlen($this->personalCode) < 6) return null ;
        $centuryCode = substr($this->personalCode, 0, 1);
        if ($centuryCode < 3) {
            $century = 19;
        } elseif ($centuryCode < 5) {
            $century = 20;
        } else {
            $century = 21;
        }

        $birthDate = new \DateTime(($century - 1) . substr($this->personalCode, 1, 6));
        return $birthDate;
    }

    /**
     * Get user age alias
     *
     * @return integer age
     */
    public function getAgeAttribute()
    {

        $age =$this->birthDate ?  $this->birthDate->diff(new \DateTime())->y : null;
        return $age;
    }




}
