<?php 

namespace App\Mytraits;

trait RandomTableIdTrait {

	/**
	 * Génère une clé aléatoire pour la DataTable
	 *
	 * @return string
	 */

	private function RandomTableId($length) {
    	$keys = array_merge(range(0,9), range('a', 'z'), range('A', 'Z'));

    	$key ="";
    	for($i=0; $i < $length; $i++) {
        	$key .= $keys[array_rand($keys)];
    	}
    return $key;
	}	

}
