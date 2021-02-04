<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
	public function index(){

		return view('emails.index');
	}

    public function Contacto(Request $request){
		$correo = new ContactoMail($request->all());
		Mail::to('wilmerparra2118@gmail.com')->send($correo);

		return "Correo Enviado!";
    }
}
