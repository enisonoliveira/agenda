<?php 

namespace ContactApp\SDK\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel  extends Model
 {
    use SoftDeletes;
    protected $table = 'user';
    protected $fillable = ['idusers','email','persons_id','password','ip','crfs_token'];
    protected $dates = ['deleted_at'];
    public $primaryKey = 'iduser';
}