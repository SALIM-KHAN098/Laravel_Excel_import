<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin', compact('users'));
    }

    public function import(Request $request){
       $request->validate([
        'file' => ['required', 'max:2024'],
       ]);

       Excel::import(new UsersImport, $request->file('file'));
       return back()->with('success', 'The data has been imported');
    }


    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
