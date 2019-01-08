<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contato;

class ContatoController extends Controller
{
    //
    public function sendContactMail(Request $request){

    	$validatedData = $request->validate([
            'Nome' => 'required',
            'Email' => 'required|email',
            'Assunto' => 'required',
            'Mensagem' => 'required|min:3'
        ]);


    	Mail::send('mail.index', ['nome' => $request->Nome, 'email' => $request->Email, 'assunto' => $request->Assunto, 'mensagem' => $request->Mensagem], function($message){

    			$enderecos =[
    				'sticktech89@gmail.com'
    			];
    			$message->to($enderecos);
    			$message->subject('Contato de um cliente em potencial.');

    	});

    	return 'true';
    }
}
