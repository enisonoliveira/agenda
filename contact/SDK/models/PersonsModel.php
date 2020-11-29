<?php 

namespace ContactApp\SDK\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonsModel  extends Model 
{
    use SoftDeletes;
    protected $table = 'persons';
    protected $fillable = ['idpersons','name','address_id'];
    protected $dates = ['deleted_at'];
    public $primaryKey = 'idpersons';
}