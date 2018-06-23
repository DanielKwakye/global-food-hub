<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Registration;

use Illuminate\Http\Request;

class testController extends Controller
{	
	public function generateCode(){
		
		return Admin::generateRegistrationNumber();
	}

	public function promoteReg(){
		$regis= (new Registration)->find(1);
		var_dump($regis->checkSixNodes($regis)) ;
	}

	public function removeNode(){
		$regis= (new Registration)->find(6);
		Registration::removeNode($regis->registration_number);
		return 'okk';
	}

	public function promoteThree(){
		$regis= (new Registration)->find(1);
		return Registration::checkNextFourteenNodes($regis);
	}

	public function linears(){

		$regis= (new Registration)->find(1);

		$output = [];
		Registration::liners(['c' => $regis],$output,14); 
		// last parameter is optional .. if its not given, method brings all downliners
		
		return $output;

	}

	public function hello(){

		$string='llc';
		$firstChar = substr($string, 0,2);
		echo $firstChar;

	}


    
}
