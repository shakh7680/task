<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Surov;
use App\Models\Resend;
use App\Models\Rejectform2;
use App\Models\Tugallangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        return view('subjects.dashboard');
    }

    public function sendpage(){
        return view('subjects.send');
    }

    public function store(Request $request){
        $request->validate([
            'num'=>'required|min:2',
            'comment'=>'required|max:255',
            'file1'=>'required|mimes:doc,docx,csv,jpg,png,mp4,mov,txt,xlx,xls,pdf|max:10240',
            'file2'=>'required|mimes:doc,docx,csv,jpg,png,mp4,mov,txt,xlx,xls,pdf|max:10240'
        ]);
        $file1 = $request->file('file1');
        $filename1 = time().'.'.$file1->extension();
        $file1->move(storage_path("app/public/files"), $filename1);

        $file2 = $request->file('file2');
        $filename2 = time().'.'.$file2->extension();
        $file2->move(storage_path("app/public/files"), $filename2);
            try{
                Surov::create([
                    'user_id'=>auth()->user()->id,
                    'num'=>$request->num,
                    'comment'=>$request->comment,
                    'file1'=>$filename1,
                    'file2'=>$filename2,
                ]);
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        
        return back()->with('status', "Surov is sent successfully!");
    }
    public function sended($id)
    {
        $datas=Surov::where('user_id',$id)->get();
        return view('subjects.sended', compact(['datas']));


    }
    public function sendedform2($id)
    {
        $datas=Tugallangan::where('user_id',$id)->get();
        return view('subjects.sendedform2', compact(['datas']));


    }
    public function show($id, $file_id){
        $data=Surov::find($id);
        $name = 'file'.$file_id;
        $file_name = $data->$name;
        return view('subjects.view-file', compact('file_name', 'data'));
    }
    public function  showform2($id, $file_id){
        $data=Tugallangan::find($id);
        $name = 'file'.$file_id;
        $file_name = $data->$name;
        return view('subjects.view-file', compact('file_name', 'data'));
    }
   
    public function resend($id)
    {
       $idsurov=Surov::find($id);
        
        $datas=Resend::where('surov_id',$idsurov->id)
                ->get();
        return view('subjects.resended', compact(['datas', 'idsurov']));


    }
    public function resendform2($id)
    {
        $idsurov=Tugallangan::find($id);
        
        $datas=Rejectform2::where('tugallangan_id',$idsurov->id)
                ->get();
        return view('subjects.resendform2', compact(['datas', 'idsurov']));

    }
    
    public function resendsave(Request $request,$id)
    {
       $idsurov=Surov::find($id);
       $request->validate([
        'num'=>'required|min:2',
        'comment'=>'required|max:255',
        'file1'=>'required|mimes:doc,docx,csv,jpg,png,mp4,mov,txt,xlx,xls,pdf|max:10240',
        'file2'=>'required|mimes:doc,docx,csv,jpg,png,mp4,mov,txt,xlx,xls,pdf|max:10240'
    ]); 
        $idsurov->num=$request->num;
        $idsurov->comment=$request->comment;
        
        $file1 = $request->file('file1');
        $filename1 = time().'.'.$file1->extension();
        $file1->move(storage_path("app/public/files"), $filename1);

        
        $file2 = $request->file('file2');
        $filename2 = time().'.'.$file2->extension();
        $file2->move(storage_path("app/public/files"), $filename2);
        
        $idsurov->file1=$filename1;
        $idsurov->file2=$filename2;
        $idsurov->rejected=false;
        $idsurov->save();
        return back()->with('status', "Surov is updated successfully!");

    }
    public function resendform2save(Request $request,$id)
    {
       $idsurov=Tugallangan::find($id);
       $request->validate([
        'file1'=>'required|mimes:pdf|max:5120',
            'file2'=>'required|mimes:pdf|max:5120',
            'file3'=>'required|mimes:pdf|max:5120',
            'optic'=>'required|numeric',
            'aloqa'=>'required',
            'obyekt'=>'required',
            'viloyat'=>'required'
    ]); 
    $file1 = $request->file('file1');
    $filename1 = time().'.'.$file1->extension();
    $file1->move(storage_path("app/public/files"), $filename1);

    $file2 = $request->file('file2');
    $filename2 = time().'.'.$file2->extension();
    $file2->move(storage_path("app/public/files"), $filename2);
    
    $file3 = $request->file('file3');
    $filename3 = time().'.'.$file3->extension();
    $file3->move(storage_path("app/public/files"), $filename3);
        
        $idsurov->file1=$filename1;
        $idsurov->file2=$filename2;
        $idsurov->file3=$filename3;
        $idsurov->optic=$request->optic;
        $idsurov->aloqa=$request->aloqa;
        $idsurov->obyekt=$request->obyekt;
        $idsurov->viloyat=$request->viloyat;
        $idsurov->rejected=false;
        $idsurov->save();
        return back()->with('status', "Surov is updated successfully!");

    }
    public function download($filename)
    {
        return response()->download('storage/files/'.$filename);
    }
    public function tugallangan()
    {
        return view('subjects.tugallangan');

    }
    public function storetugallangan(Request $request)
    {
        $request->validate([
            'file1'=>'required|mimes:pdf|max:5120',
            'file2'=>'required|mimes:pdf|max:5120',
            'file3'=>'required|mimes:pdf|max:5120',
            'optic'=>'required|numeric',
            'aloqa'=>'required',
            'obyekt'=>'required',
            'viloyat'=>'required'
        ]);
        $file1 = $request->file('file1');
        $filename1 = time().'.'.$file1->extension();
        $file1->move(storage_path("app/public/files"), $filename1);

        $file2 = $request->file('file2');
        $filename2 = time().'.'.$file2->extension();
        $file2->move(storage_path("app/public/files"), $filename2);
        
        $file3 = $request->file('file3');
        $filename3 = time().'.'.$file3->extension();
        $file3->move(storage_path("app/public/files"), $filename3);
        try{
                Tugallangan::create([
                    'user_id'=>auth()->user()->id,
                    'file1'=>$filename1,
                    'file2'=>$filename2,
                    'file3'=>$filename3,
                    'optic'=>$request->optic,
                    'aloqa'=>$request->aloqa,
                    'obyekt'=>$request->obyekt,
                    'viloyat'=>$request->viloyat,
                ]);
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        
        return back()->with('status', "Surov is sent successfully!");
    }
    public function malumot(){
        $data=Tugallangan::all();
        return view('subjects.malumot6oy', compact('data'));
    }

    public function malumot6oy($id){
        $datas=Tugallangan::find($id)->get();
        return view('subjects.malumot6oy', compact('datas')); 
    }

    public function deletesubjects($id){
        Surov::where('id',$id)->delete();
        Tugallangan::where('id',$id)->delete();
        return back()->with('status', "is deleted successfully");
    }
}
