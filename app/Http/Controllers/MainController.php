<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\UserModel;
use App\ArsipModel;

class MainController extends Controller
{
    function loginPage(){
        return view('login');
    }

    function loginAttempt(Request $req){
        // Pertama cari apakah ada data usernya
        // Kedua check passwordnya
        $data['error'] = false;
        $data['errorMessage'] = '';
        $user = UserModel::where('email', $req->username)->get()->first();
        if(isset($user)){
            $password = md5($req['password']);
            if($password == $user['password']){
                Session::put('email', $user->email);
                Session::put('login', TRUE);

                if($user['role'] == 'admin'){
                    return redirect('/admin');
                }else{
                    return redirect('/homepage');
                }

            }else{
                $data['error'] = true;
                $data['errorMessage'] = 'Password yang anda masukkan salah';
            }
        }else{
            $data['error'] = true;
            $data['errorMessage'] = 'Email tidak di temukan';
        }

        return view('login', ['data' => $data]);
    }

    // Static function buat ambil user yang sedang masuk

    function getDataUser(){
        return UserModel::where('email', Session::get('email'))->get()->first();
    }

    function homepage(){
        $user = $this->getDataUser();
        return view('templateAdmin', ['user' => $user]);
    }

    function adminHome(){
        $user = $this->getDataUser();
        return view('templateAdmin', ['user' => $user]);
    }

    // Management arsip

    function adminArsip(){
        $user = $this->getDataUser();
        $data['arsip'] = ArsipModel::all();

        return view('adminArsip', ['user' => $user, 'data' => $data]);
    }

    function adminArsipForm(Request $req){
        $user = $this->getDataUser();
        $data;

        if($req->method() == "POST"){
            $arsip = null;
            $namaFile = null;
            if(ArsipModel::where('idArsip', $req->id)->get()->first() != null){
                $arsip = ArsipModel::where('idArsip', $req->id)->get()->first();
            }
            else{
                $arsip = new ArsipModel();
                $arsip->idArsip = Str::random(15);
            }

            // check apakah ada gambar
            if($req->hasFile('file')){
                if(isset($arsip->file)){
                    $file_path = public_path()."/file/arsip/".$arsip->file;  // Value is not URL but directory file path
                    if(File::exists($file_path)) {
                        File::delete($file_path);
                    }
                }
                $file = $req->file('file');
                $nama = Str::random(21).'.pdf';
                $path = public_path().'/file/arsip/';
                $file->move($path, $nama);
            } else{
                if(isset($arsip->file)){
                    $nama = $arsip->file;
                }
            }
            
            $arsip->tipeSurat = $req->tipeSurat;
            $arsip->nomor = $req->nomor;
            $arsip->kepada = $req->kepada;
            $arsip->tembusan = $req->tembusan;
            $arsip->lampiran = $req->lampiran;
            $arsip->perihal = $req->perihal;
            $arsip->tanggal = $req->tanggal;
            $arsip->file = $nama;
            $arsip->save();

            return redirect('admin/arsip');
        }

        if(isset($req->id)){ // Jika dia ingin update
            $data['title'] = "Update user";
            $data['arsip'] = ArsipModel::where('idArsip', $req->id)->get()->first();
        }else{ // Jika dia ingin buat user baru
            $data['title'] = "Buat user baru";
        }
        
        return view('adminArsipForm', ['user' => $user, 'data' => $data]);
    }

    public function arsipHapus(Request $req){
        $arsip = ArsipModel::where('idArsip', $req->id)->get()->first();
        if(isset($arsip->file)){
            $file_path = public_path()."/file/arsip/".$arsip->file;  // Value is not URL but directory file path
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
        }
        $arsip->delete();
        
        return redirect('/admin/arsip');
    }
    
    function arsipView(Request $req){
        $user = $this->getDataUser();
        $data['arsip'] = ArsipModel::where('idArsip', $req->id)->get()->first();

        return view('adminArsipView', ['user' => $user, 'data' => $data]);
    }

    // Management user sudah selesai
    
    function adminUser(){
        $user = $this->getDataUser();
        $data['user'] = UserModel::all();

        return view('adminUser', ['user' => $user, 'data' => $data]);
    }

    function adminUserForm(Request $req){
        //error, title, succes, user
        $user = $this->getDataUser();
        $data;
        
        if($req->method() == "POST"){
            $user;
            if(isset($req->id)){
                $user = UserModel::where('id',$req->id)->get()->first();
                if(md5($req->passwordLama) == $user->password){
                    $user->email = $req->email;
                    $user->password = md5($req->password);
                    $user->role = $req->role;
                    $user->save();
                    return redirect('admin/user');
                }
                $data['error'] = 'Password lama tidak sama';
            }else{
                $user = new UserModel();
                $user->id = Str::random(5);
                $user->email = $req->email;
                $user->password = md5($req->password);
                $user->role = $req->role;
                $user->save();
                return redirect('admin/user');
            }
        }

        if(isset($req->id)){ // Jika dia ingin update
            $data['title'] = "Update user";
            $data['user'] = UserModel::where('id', $req->id)->get()->first();
        }else{ // Jika dia ingin buat user baru
            $data['title'] = "Buat user baru";
        }
        
        return view('adminUserForm', ['user' => $user, 'data' => $data]);
    }

    function test(){
        $file_path = public_path()."/file/arsip/QKwn6j9ZTDT4PeVulLLfB.pdf";  // Value is not URL but directory file path
        
        return response()->file($file_path);
    }
}
