<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public String $email;

    public String $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login() {
        $this->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=> 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);
        
        if(Auth::attempt([
            'email' => $this->email, 
            'password' => $this->password
            ])){
                return redirect()->to('dashboard');
        }else{
        return session()->flash('error', 'Email atau password salah');
        }
    }
}