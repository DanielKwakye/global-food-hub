<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Registration;

class Registration extends Model
{
    protected $fillable=['left_rid','right_rid','parent_rid'];
    public function rank(){
    	return $this->belongsTo('App\Rank');
    }

    public static function checkSixNodes(Registration $regis){
    	$rank = $regis->rank_id; // your current rank // downliners must have samerank 
    	$left = $regis->left_rid; // registration on your left
    	$right = $regis->right_rid; // registration on your right
      $arr=[];


		//   check if no one registered at your left ---

        $output = [];

    	if(!$regis->checkLeftRightRef($regis,$output)){
    		return $output;
    	}

        array_merge($arr,$output);
    	// .... get left child ---
    	$left_child = (new Registration)->where('registration_number',$left)->first();

    	if(!$regis->checkLeftRightRef($left_child)){
    		return $arr;
    	}

		//...... get right child ----

		$right_child = (new Registration)->where('registration_number',$right)->first();

    	if(!$regis->checkLeftRightRef($right_child)){
    		return $arr;
    	}

    	// .... check left child rank ---


    	if (!$regis->checkRank($left_child,$rank)) {
    		return $arr;
    	}

    	// .... check right child rank ----

    	if (!$regis->checkRank($right_child,$rank)) {
    		return $arr;
    	}

		//     get left - left child instance --

    	$left_left_child = (new Registration)->where('registration_number',$left_child->left_rid)->first();

    	if (!$regis->checkRank($left_left_child,$rank)) {
    		return $arr;
    	}

    	$left_right_child = (new Registration)->where('registration_number',$left_child->right_rid)->first();

    	if (!$regis->checkRank($left_right_child,$rank)) {
    		return $arr;
    	}

		//     get right - left child instance --

		$right_left_child = (new Registration)->where('registration_number',$right_child->left_rid)->first();

    	if (!$regis->checkRank($right_left_child,$rank)) {
    		return $arr;
    	}

    	$right_right_child = (new Registration)->where('registration_number',$right_child->right_rid)->first();

    	if (!$regis->checkRank($right_right_child,$rank)) {
    		return $arr;
    	}


    	return $arr=[$left_left_child->registration_number,$left_right_child->registration_number,$right_left_child->registration_number,$right_right_child->registration_number];


    }

     public static function checkNextFourteenNodes(Registration $regis){
        $result = [];

        $arr=$regis->checkSixNodes($regis);

        if(empty($arr)){
          return $arr;
        }

            // next 14 nodes checking here ----

        foreach ($arr as $rid) {
           $person = (new Registration)->where('registration_number',$rid)->first();

           if (!$regis->checkLeftRightRef($person)) {
              return [];
           }

           if (!$regis->checkRank($person,$regis->rank_id)) {
               return [];
           }

            array_push($result, $person->left_rid);
            array_push($result, $person->right_rid);
        }

        return $result;



     }

    public static function removeNode($regNum){
      $personToDelete = (new Registration)->where('registration_number',$regNum)->first();
       if($personToDelete->parent_rid!=='#0'){
        // get parent 
          $parent = (new Registration)->where('registration_number',$personToDelete->parent_rid)->first();

          if($parent->left_rid==$personToDelete->registration_number){
            $parent->update(['left_rid' => null]);
          }else{
          $parent->update(['right_rid' => null]);
          }
      }
      $left_child = (new Registration)->where('registration_number',$personToDelete->left_rid)->first();
      $left_child->update(['parent_rid'=>'#0']);
      $right_child = (new Registration)->where('registration_number',$personToDelete->right_rid)->first();
      $right_child->update(['parent_rid'=>'#0']);

      $personToDelete->delete();
      
    }


    // public static function fetch

    // --------------- helper methods --

    private function checkLeftRightRef(Registration $reg, &$output = []){

    	if ($reg->left_rid == null) {
    		return false;
    	}

        $output['l_c'] = $reg->left_rid;
 

    	if ($reg->right_rid == null) {
    		# code...
    		return false;
    	}

        $output['r_c'] = $reg->right_rid;


    	return true;
    }

    private function checkRank(Registration $reg, $rank){
    	if ($reg->rank_id < $rank) {
    		return false;
    	}

    	return true;

    }

    public static function liners(Array $regArray, &$output = [], $cnt = 10000000000){

      // accumulated nodes ---------- $output

      $arr = []; // last set of nodes -----

      // status to check if method should call itself again --
      $recurse = false;
      
        $i=0;
          foreach ($regArray as $key =>  $value) {

            // break of the loop if $output exceed the expected number
            if (count($output) >= $cnt) {
               break;
            }

        // check left of registration ----

          if ($value != null) {

              if ($value->left_rid != null) {

                $firstChar = substr($key, 0,$i+1);
                if ($firstChar == 'c') {
                  
                  $l_index = 'l'.$key;

                }else{
                  
                  $l_index = $firstChar.'l'.substr($key, 1);
                }
                

                $l_c_obj=(new Registration)->where('registration_number',$value->left_rid)->first();

                $arr[$l_index] = $l_c_obj;

                $output[$l_index] = $l_c_obj; // push this obj into accumulating output array

                $recurse = true;

              }
               // break of the loop if $output exceed the expected number
            if (count($output) >= $cnt) {
               break;
            }

              // check right of registration ----

              if ($value->right_rid != null) {

                // $r_index = 'r'.$key;

                $firstChar = substr($key, 0,$i+1);
                if ($firstChar == 'c') {
                  
                  $r_index = 'r'.$key;

                }else{
                  
                  $r_index = $firstChar.'r'.substr($key,  1);
                }
                 
                 $r_c_obj=(new Registration)->where('registration_number',$value->right_rid)->first();

                 $arr[$r_index] = $r_c_obj;
             
                 $output[$r_index] = $r_c_obj; // push this obj into accumulating output array

                 $recurse = true;
                 
              }

               // break of the loop if $output exceed the expected number
              if (count($output) >= $cnt) {
                 break;
              }

            }
            
            $i++;

        }
        

      if ($recurse) {
        Registration::liners($arr,$output,$cnt);
      }
       

    }


    public static function downliners(Registration $reg){
      $arr=[];

      if ($reg->left_rid != null) {
         $arr['l_c'] = $reg->left_rid;
         $l_c_obj=(new Registration)->where('registration_number',$reg->left_rid)->first();

         if($l_c_obj->left_rid !=null){
          $arr['l_l_c'] = $l_c_obj->left_rid;
          $l_l_c_obj=(new Registration)->where('registration_number',$l_c_obj->left_rid)->first();

          if($l_l_c_obj->left_rid !=null){
            $arr['l_l_l_c'] = $l_l_c_obj->left_rid;
          }
          if($l_l_c_obj->right_rid !=null){
            $arr['l_l_r_c'] = $l_l_c_obj->right_rid;
          }

         }
         if($l_c_obj->right_rid !=null){
          $arr['l_r_c'] = $l_c_obj->right_rid;
          $l_r_c_obj=(new Registration)->where('registration_number',$l_c_obj->right_rid)->first();
          if($l_r_c_obj->left_rid !=null){
            $arr['l_r_l_c'] = $l_r_c_obj->left_rid;
          }

          if($l_r_c_obj->right_rid !=null){
            $arr['l_r_r_c'] = $l_r_c_obj->right_rid;
          }

         }

      }

      if ($reg->right_rid != null) {
        # code...
         $arr['r_c'] = $reg->right_rid;
         $r_c_obj=(new Registration)->where('registration_number',$reg->right_rid)->first();

         if($r_c_obj->left_rid !=null){
          $arr['r_l_c'] = $r_c_obj->left_rid;
          $r_l_c_obj=(new Registration)->where('registration_number',$r_c_obj->left_rid)->first();

          if($r_l_c_obj ->left_rid !=null){
          $arr['r_l_l_c'] = $r_l_c_obj->left_rid;
          }
          if($r_l_c_obj->right_rid !=null){
          $arr['r_l_r_c'] = $r_l_c_obj->right_rid;
          }
         }
         if($r_c_obj->right_rid !=null){
          $arr['r_r_c'] = $r_c_obj->right_rid;
          $r_r_c_obj=(new Registration)->where('registration_number',$r_c_obj->right_rid)->first();
          if($r_r_c_obj->left_rid !=null){
          $arr['r_r_l'] = $r_r_c_obj->left_rid;
          } 
          if($r_r_c_obj->right_rid !=null){
          $arr['r_r_r'] = $r_r_c_obj->right_rid;
          }

         }
      }
      return $arr;

    }


}
