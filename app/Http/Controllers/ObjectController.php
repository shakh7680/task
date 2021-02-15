<?php

namespace App\Http\Controllers;

use App\Models\Rejectform2;
use App\Models\Resend;
use App\Models\Surov;
use App\Models\Tugallangan;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Symfony\Component\VarDumper\Cloner\Data;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        $datas=Surov::all();
        return view('objects.dashboard', compact(['datas']));
    }
    public function form1(){
        $datas=Surov::paginate(5);

        return view('objects.form1', compact('datas'));
    }
    public function form2(){
        $datas=Tugallangan::paginate(5);
        return view('objects.form2', compact(['datas']));
    }
    public function showform1($id, $file_id){
        $data=Surov::find($id);
        $name = 'file'.$file_id;
        $file_name = $data->$name;
        return view('objects.view-file', compact('file_name'));
    }

    public function show($id, $file_id){
        $data=Tugallangan::find($id);
        $name = 'file'.$file_id;
        $file_name = $data->$name;
        return view('objects.view-file', compact('file_name'));
    }
    
    
    public function download($filename)
    {
        return response()->download('storage/files/'.$filename);
    }
    public function reject($id){
        $data=Surov::find($id);
        return view('objects.reject', compact(['data']));
    }
    public function rejectform2($id){
        $data=Tugallangan::find($id);
        return view('objects.rejectform2', compact(['data']));
    }

    public function resendback(Request $request,$id){
        $request->validate([
            'comment'=>'required|min:2'
        ]);
        $data=Surov::findOrFail($id);

        $data->rejected=true;
        $data->save();

        Resend::create([
            'user_id'=>auth()->user()->id,
            'surov_id'=>$data->id,
            'to_whom'=>$data->user_id,
            'comment'=>$request->comment,
        ]);
        return back()->with('status', "Surov is rejected successfully!");
        
    }
    public function storeform2(Request $request,$id){
        $request->validate([
            'comment'=>'required|min:2'
        ]);
        $data=Tugallangan::findOrFail($id);

        $data->rejected=true;
        $data->save();

        Rejectform2::create([
            'user_id'=>auth()->user()->id,
            'to_whom'=>$data->id,
            'tugallangan_id'=>$data->id,
            'comment'=>$request->comment,
        ]);
        return back()->with('status', "Surov is rejected successfully!");
        
    }

    public function approve($id){
        $application = Surov::findOrFail($id);

        $application->status = true;
        $application->save();

        return redirect()->back()->with('status', 'Surov approved!');
    }
    public function approveform2($id){
        $application = Tugallangan::findOrFail($id);

        $application->status = true;
        $application->save();

        return redirect()->back()->with('status', 'Surov approved!');
    }


    public function deletesubject($id){
        Surov::where('id',$id)->delete();
        Tugallangan::where('id',$id)->delete();
        return back()->with('status', "is deleted successfully");
    }

    public function malumotyarim(){
        $data=Tugallangan::all();
        return view('subjects.malumot6oy', compact('data'));
    }
    public function malumotyarimyil($id){
        $datas=Tugallangan::find($id)->get();
        return view('subjects.malumot6oy', compact('datas')); 
    }

}
