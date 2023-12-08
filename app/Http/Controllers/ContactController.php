<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
{
    $contacts = ContactUs::latest()->paginate(10);
    return view('contact.index-contact', compact('contacts'));
}

    public function show()
    {
        return view('contact.contact');
    }

    public function store(Request $request)
    {
        // Validasi formulir jika diperlukan
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
            'send_copy' => 'boolean',
        ]);

        // Simpan data ke dalam database
        $contact = new ContactUs();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->send_copy = $request->has('send_copy');
        $contact->save();

        // Kirim salinan pesan jika dipilih
        if ($request->has('send_copy')) {
            // Implementasikan logika pengiriman salinan pesan di sini
        }

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
