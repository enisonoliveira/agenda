<?php 

namespace ContactApp\SDK\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneModel  extends Model 
{
    use SoftDeletes;
    protected $table = 'phone';
    protected $fillable = ['idphone','number','contact_id'];
    protected $dates = ['deleted_at'];
    public $primaryKey = 'idphone';
}