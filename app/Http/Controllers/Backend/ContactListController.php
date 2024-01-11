<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactListController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('backend.contact.list',compact('contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Record has been deleted succesfully!!');
    }

    public function showContactDetails(Contact $contact)
    {
        return view('backend.contact.contact-details', compact('contact'));
    }
}
