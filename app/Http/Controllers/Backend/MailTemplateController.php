<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\MailTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// MailTemplate $mailTemplate

class MailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $mail_templates = MailTemplate::orderBy('created_at', 'desc')->get();
      return view('backend.mail_template.list',compact('mail_templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mail_template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $values = $request->validate([
            "name" => 'required|string|max:100|unique:mail_templates,name',
            "subject"=>'required|string|max:500',
            "content"=>'required|string|max:20000',
        ]);
        
        $mailTemplate = new MailTemplate();
        $mailTemplate->fill($values);
        $mailTemplate->slug = Str::slug($values['name']);
        $mailTemplate->save();


        $notify[] = ['success', $mailTemplate->name . __('admin_messages.created')];
        return redirect()->route('admin.mail-template.index')->withNotify($notify);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MailTemplate $mailTemplate)
    {
        $data['mailTemplate'] = $mailTemplate;
        return view('backend.mail_template.edit', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailTemplate $mailTemplate)
    {
        $changed = false;
        $values = $request->validate([
            "name" => 'required|string|max:100|unique:mail_templates,name,'. $mailTemplate->id,
            "subject"=>'required|string|max:500',
            "content"=>'required|string|max:15000',
        ]);

        //Check for Name Changes to update Slug
        if ($mailTemplate->name !== $values['name']) {
            $mailTemplate->slug = Str::slug($values['name']);
            $mailTemplate->save();
            $changed = true;
        }

        $mailTemplate->fill($values);

        if ($mailTemplate->isDirty()) {
            $mailTemplate->save();
            $changed = true;
        }

        if (!$changed) {
            $notify[] = ['warning', __('admin_messages.nochange')];
            return redirect()->route('admin.mail-template.index')->withNotify($notify);
        }

        $notify[] = ['success', $mailTemplate->name . __('admin_messages.updated')];
        return redirect()->route('admin.mail-template.index')->withNotify($notify);
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailTemplate $mailTemplate)
    {
        if ($mailTemplate->status == 'active') {
            $mailTemplate->status = 'inactive';
        } else {
            $mailTemplate->status = 'active';
        }

        $mailTemplate->save();
        

        $notify[] = ['success', $mailTemplate->name . ' ' . (($mailTemplate->status == 'inactive') ? __('admin_messages.disabled') : __('admin_messages.enabled'))];
        return redirect()->route('admin.mail-template.index')->withNotify($notify);
    }
}
