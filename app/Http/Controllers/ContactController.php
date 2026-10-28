<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contactInfo = [
            'phone' => '920783202',
            'phone_display' => '920 783 202',
            'phone_intl' => '+51 920 783 202',
            'email_ventas' => 'eutex@ventas.com',
            'email_alt' => 'e20huaccachi@gmail.com',
            'address' => 'Gamarra, La Victoria, Lima - Perú',
            'hours' => 'Lunes a Sábado: 8:00 AM - 7:00 PM',
        ];

        return view('contact', compact('contactInfo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'company' => 'nullable|string|max:150',
            'email' => 'required|email|max:150',
            'phone' => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:200',
            'message' => 'required|string|max:3000',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', '¡Gracias por comunicarse con EUTEX! Su mensaje ha sido recibido y nos comunicaremos con usted a la brevedad.');
    }
}
