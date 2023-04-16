<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function main()
    {
        return view('adminpanel.main');
    }
    public function category_b(){
        $code = random_int(1,3);

        $test = Test::where('id',$code)->with('answer')->first();
//       dd($test);

        return view('adminpanel.category_b',['test'=> $test]);
    }

    public function check(Request $request){
        $test = Test::where('id',$request->id)->with('answer')->first();
        if($request->status == true){
            return view('adminpanel.category_b',['test'=> $test])->with('sms','Дұрыс жауап');
        }else{
            return view('adminpanel.category_b',['test'=> $test])->withErrors('Қате жауап');
        }

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        //
    }


    public function show(Question $question)
    {
        //
    }


    public function edit(Question $question)
    {
        //
    }


    public function update(Request $request, Question $question)
    {
        //
    }


    public function destroy(Question $question)
    {
        //
    }
}
