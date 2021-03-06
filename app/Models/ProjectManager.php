<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ProjectManager extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email'];
}
