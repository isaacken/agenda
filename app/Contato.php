<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    public $fillable = ['saudacao','nome','telefone','email','data_nascimento','avatar','nota','created_at'];

    //ACESSOR
    public function getAvatarImageAttribute($value) {
      return ($this->avatar == null)?asset('images/null.png'):asset($this->avatar);
    }

    public function getAvatarFileNameAttribute($value) {
      return substr($this->avatar,30,strlen($this->avatar));
    }

    public function getDataNascimentoAttribute($value) {
      return $this->dateFormatDatabaseScreen($value,'screen');
    }

    //MUTATOR
    public function setDataNascimentoAttribute($value) {
      $this->attributes['data_nascimento'] = $this->dateFormatDatabaseScreen($value);
    }

    public function setAvatarAttribute($value) {
      $filename = substr(md5(rand(100000,999999)),0,5).'_'.$value->getClientOriginalName();
      $filepath = 'public/uploads/'.date('Y').'/'.date('m').'/';

      if ($value->isValid()) {
        $path = $value->storeAs($filepath,$filename);
      }
      $this->attributes['avatar'] = str_replace('public','storage',$filepath).$filename;
    }

    public function dateFormatDatabaseScreen($data,$formato='database') {
  		if ($formato == "screen") {
        $aux = substr($data,8,2);
        $aux .= '/';
        $aux .= substr($data,5,2);
        $aux .= '/';
        $aux .= substr($data,0,4);

        $data = $aux;
  		}
  		else if ($formato == "database") {
        $aux = substr($data,6,4);
        $aux .= '-';
        $aux .= substr($data,3,2);
        $aux .= '-';
        $aux .= substr($data,0,2);

        $data = $aux;
  		}

      return $data;
  	}
}
