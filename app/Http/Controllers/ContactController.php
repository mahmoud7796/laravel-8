<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Contact_form;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contact = Contact::latest()-> get();
        return view('admin.contact.index', compact('contact'));
    }

    public function create(){
        return view('admin.contact.create');
    }

    public function store(ContactRequest $request){
        //  return $request;
        Contact::create([
            'address' => $request -> address,
            'email' => $request -> email,
            'phone' => $request -> phone,
        ]);
        return redirect()-> route('contact.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }
    public function update(ContactRequest $request, $id){
        $contact = Contact::find($id);
        $contact->update([
            'address' => $request -> address,
            'email' => $request -> email,
            'phone' => $request -> phone,
        ]);

        return redirect()-> route('contact.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function delete($id){
        $contact = Contact::find($id);
        $contact -> delete();
        return redirect()-> route('contact.index')-> with(['success'=> 'تم الحذف بنجاح']);
    }
    public function contactForm(ContactFormRequest $request){
        //  return $request;
        Contact_form::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'subject' => $request -> subject,
            'message' => $request -> message
        ]);
        return redirect()-> route('contact-us')-> with(['success'=> 'تم الإرسال بنجاح']);
    }
}
