<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rulecontroller extends Controller
{
  public function rule()
  {
    return view('about.rule',[
      
    ]);
  }
}
