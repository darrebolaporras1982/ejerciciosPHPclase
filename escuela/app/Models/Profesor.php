<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $table='profesors';

    protected $fillable=[
        'nom_ape',
        'profesion',
        'grado_academico',
        'telefono'
    ];
    protected $hidden=[
        'id'
    ];
    }
