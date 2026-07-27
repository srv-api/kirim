<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeOff extends Model
{

protected $fillable = [
'employee_id',
'type',
'start_date',
'end_date',
'reason',
'status'
];

public function employee()
{
return $this->belongsTo(Employee::class);
}

}