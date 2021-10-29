<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;


class Work extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function summary()
    {
        return $this->hasOne(Summary::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
