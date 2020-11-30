<?php 

namespace ContactApp\SDK\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressModel  extends Model 
{
    use SoftDeletes;
    protected $table = 'address';
    protected $fillable = ['idaddress','street','street','neighborhood','city','state','zip','number','country'];
    protected $dates = ['deleted_at'];
    public $primaryKey = 'idaddress';   

}