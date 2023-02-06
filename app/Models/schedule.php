<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schedules';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['group_id', 'student_id', 'note', 'time_start_at', 'time_end_at'];

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
    
}
