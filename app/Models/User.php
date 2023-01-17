<?php

namespace App\Models;


use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject{
    use Notifiable;
    protected $fillable = ['role_id','username','password','status','deletable'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $username;
    protected $role_id;
    protected $status;
    protected $order = ['id' => 'desc'];
    protected $column_order;
    protected $orderValue;
    protected $dirValue;
    protected $startVlaue;
    protected $lengthVlaue;
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function setOrderValue($orderValue){
        $this->orderValue = $orderValue;
    }
    public function setDirValue($dirValue){
        $this->dirValue = $dirValue;
    }
    public function setStartValue($startVlaue){
        $this->startVlaue = $startVlaue;
    }
    public function setLengthValue($lengthVlaue){
        $this->lengthVlaue = $lengthVlaue;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setRoleID($role_id){
        $this->role_id = $role_id;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    private function get_datatable_query(){
        $this->column_order = ['id','role_id','username','password','status','deletable',null];
        $query = self::with('role:id,role_name')->where('id','!=',1);
        if (!empty($this->username)) {
            $query->where('username', 'like', '%' . $this->username . '%');
        }
        if (!empty($this->role_id)) {
            $query->where('role_id', $this->role_id );
        }
        if (!empty($this->status)) {
            $query->where('status', $this->status );
        }
        if (isset($this->orderValue) && isset($this->dirValue)) {
            $query->orderBy($this->column_order[$this->orderValue], $this->dirValue);
        } else if (isset($this->order)) {
            $query->orderBy(key($this->order), $this->order[key($this->order)]);
        }
        return $query;
    }
    public function getDatatableList(){
        $query = $this->get_datatable_query();
        if ($this->lengthVlaue != -1) {
            $query->offset($this->startVlaue)->limit($this->lengthVlaue);
        }
        return $query->get();
    }
    public function count_filtered(){
        $query = $this->get_datatable_query();
        return $query->get()->count();
    }
    public function count_all(){
        return self::toBase()->where('id','!=',1)->get()->count();
    }
}
