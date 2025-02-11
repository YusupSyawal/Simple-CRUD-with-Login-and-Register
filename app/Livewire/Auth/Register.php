<?php

namespace App\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public String $name;

    public String $email;

    public String $password;

    public String $password_confirmation;
        
    public function render()
    {
        return view('livewire.auth.register');
    }
    public function register() {
        $this->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required'
        ],[
            'name.required'=> 'Nama wajib di isi',
            'email.required'=> 'Email wajib di isi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib di isi',
            'password.confirmed' => 'Konfirmasi password tidak sama',
            'password_confirmation.required' => 'Konfirmasi password wajib di isi',
        ]);

        $user = User:: create ([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
        Auth::login($user);
        return redirect()->to('dashboard');
    }
}
