<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact_form;
use Illuminate\Http\Request;

class ContactForm extends Controller
{
    public function indexForm(){
        $messages = Contact_form::latest()-> get();
        return view('admin.contact-messages.index', compact('messages'));
    }

    public function createForm(){
        return view('admin.contact-messages.create');
    }

    public function storeForm(ContactFormRequest $request){
        //  return $request;
        Contact_form::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'subject' => $request -> subject,
            'message' => $request -> message
        ]);
        return redirect()-> route('contactForm.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function editForm($id){
        $messages = Contact_form::find($id);
        return view('admin.contact-messages.edit',compact('messages'));
    }
    public function updateForm(ContactFormRequest $request, $id){
        $messages = Contact_form::find($id);
        $messages->update([
            'name' => $request -> name,
            'email' => $request -> email,
            'subject' => $request -> subject,
            'message' => $request -> message
        ]);

        return redirect()-> route('contactForm.index')-> with(['success'=> 'تم الحفظ بنجاح']);
    }

    public function deleteForm($id){
        $messages = Contact_form::find($id);
        $messages -> delete();
        return redirect()-> route('contactForm.index')-> with(['success'=> 'تم الحذف بنجاح']);
    }
}
