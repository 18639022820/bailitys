<?php
namespace App\model;

use Illuminate\Database\Eloquent\Model;
//邀请码
class InviteCode extends Model{
	protected $table = 'invite_code';
	protected $primaryKey='id';
	public $timestamps=false;
	protected $guarded=[];
	
	
}