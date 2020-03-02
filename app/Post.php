<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = "posts";
    protected $primaryKey = "id";

    public $timestamps = true;

//    public const CREATED_AT = "creation_date";
//    public const UPDATED_AT = "last_update";

    //Lista branca de todos os campos que podem para o banco de dados através de um array
    protected $fillable = ['title', 'subtitle', 'description'];

    //Seria uma lista negra do que não pode ir ao banco de dados
    protected $guarded = [];
}
