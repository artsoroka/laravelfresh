<?php 

class Company extends Eloquent {

    protected $table = 'companies'; 

    public function belongs_to(User $user){
    	if($this->user_id == $user->id){
    		return true;  
    	} else {
    		return false;  
    	}
    }

}