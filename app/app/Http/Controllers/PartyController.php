<?php

namespace App\Http\Controllers;

use App\Party;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Expr\Cast\Object_;

class PartyController extends Controller
{
    protected function  index(){

        $party = Party::all();

        return $party;

    }

    protected function search($search){

        $split = explode(',', $search);

        /* Uses case insensitive wildcards searches for partial match */
        if(count($split) > 1){
            $parties = Party::where( 'first_name', 'ilike' , '%'.$split[0].'%' )->orWhere('last_name', 'ilike', '%'.$split[1].'%' )->get();
        }
        else{
            $parties = Party::where( 'first_name', 'ilike' , '%'.$split[0].'%' )->orWhere('last_name', 'ilike', '%'.$split[0].'%' )->get();
        }

        return $parties;
    }
}