<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Test;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuestionController extends Controller
{

    public function main()
    {
        return view('adminpanel.main');
    }

    public function category_b(){
        $code = random_int(20,25);
        $test = Test::where('id',$code)->with('answer')->first();
        $pos = Test::orderBy('updated_at','desc')->paginate(1);
//       dd($test);

        return view('adminpanel.category_b',['test'=> $test,'posts'=>$pos]);
    }

    public function check(Request $request,Answer $answer){
        $test = Test::where('id',$request->id)->with('answer')->first();
        $pos = Test::orderBy('updated_at','desc')->paginate(1);
        if($answer->status == true){
            return view('adminpanel.category_b',['test'=> $test,'posts'=>$pos])->with('sms','Дұрыс жауап');
        }else{
            return view('adminpanel.category_b',['test'=> $test,'posts'=>$pos])->withErrors('Қате жауап');
        }

    }
    public function add_questions()
    {
        $this->authorize('create',Test::class);
        return view('adminpanel.add_questions' ,['categories'=>Category::all()]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $validated =  $request->validate([
            'header' => 'required',
            'video' => 'required|mimes:jpg,png,jpeg,gif,svg,mp4,mov,ogg',
            'description' => 'required',
            'category_id'=> 'required|numeric|exists:categories,id',
        ]);


        $fileName = time().$request->file('video')->getClientOriginalName();
        $image_path = $request->file('video')->storeAs('video', $fileName, 'public');
        $validated['video'] = '/storage/'.$image_path;
        Test::create($validated);

        return back()->with('message', (__('message.Successfully connected')));

    }

    public function answer_store(Request $request){
        $ss = ['answer1','answer2','answer3','answer4'];

        $validated = $request->validate([
            'test_id'=>'required',
            'answer1'=>'required',
            'answer2'=>'required',
            'answer3'=>'required',
            'answer4'=>'required',
        ]);
        foreach ($ss as $s){
            if ($s=='answer1') {
                Answer::create([
                    'test_id' => $request->test_id,
                    'answer' => $request->$s,
                    'status'=> True

                ]);
            }else{
                Answer::create([
                    'test_id' => $request->test_id,
                    'answer' => $request->$s,
                    'status'=> False

                ]);
            }
        }
        return redirect(route('main'));

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
    public function add_answers(){

        return view('adminpanel.add_answers',['all'=>Test::all()]);
    }


}
