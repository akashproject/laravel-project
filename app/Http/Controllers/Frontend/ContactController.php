<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Contact,Page,SiteSetting};

class ContactController extends Controller
{

    public function __construct(){
        $this->settings = SiteSetting::all()->pluck('option_value','option_name');
    }
    public function contactDataSave(Request $request)
    {
        $setting = $this->settings;

        $page = Page::where('slug','contact-us')->first();
        $page_content = json_decode($page->content);
        $mail_to = $page_content->contact_email;
        $values = $request->validate([
            'message'=>'required|string',
            'phone_number'=>'required',
            'email'=>'required|email',
            'last_name'=>'required',
            'first_name'=>'required',
        ]);
        $contact = new Contact;
        $contact->fill($request->all());
        $result = $contact->save();

        if ($result) {

            $contatInfo = [
                'name' => $contact->first_name.' '.$contact->last_name,
                'email' => $contact->email,
                'subject' => $contact->subject,
                'message' => $contact->message,
            ];

            try {
                $page = Page::where('slug','contact-us')->first();
                $page_content = json_decode($page);

                $admin_email = $setting['site_email'] ?? $page_content->contact_email;
                \Mail::to($admin_email)->queue(new \App\Mail\ContactUs($contatInfo));
            }
            catch (\Exception $e) {
                $notify[] = ['warning', $e->getMessage()];
                return redirect()->back()->withNotify($notify);
            }
        }
        return redirect()->back()->with('success','Thank you for contacting us. We will reach you shortly.');
    }
}
