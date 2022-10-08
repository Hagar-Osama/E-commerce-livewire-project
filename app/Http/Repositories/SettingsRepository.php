<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SettingsInterface;
use App\Models\Setting;
use Exception;

class SettingsRepository implements SettingsInterface
{

    private $settingModel;

    public function __construct(Setting $settings)
    {
        $this->settingModel = $settings;
    }


    public function create()
    {
        $settings = $this->settingModel::first();
        return view('admin.settings.create', compact('settings'));
    }

    public function store($request)
    {
        $settings = $this->settingModel::first();
        try {
            if($settings) {
                $settings->update([
                    'website_name' => $request->website_name,
                    'website_url' => $request->website_url,
                    'page_title' => $request->page_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'address' => $request->address,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2,
                    'email1' => $request->email1,
                    'email2' => $request->email2,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ]);
                session()->flash('success', 'Settings Updated Successfully');


            }else {
                $this->settingModel::create([
                    'website_name' => $request->website_name,
                    'website_url' => $request->website_url,
                    'page_title' => $request->page_title,
                    'meta_keyword' => $request->meta_keyword,
                    'meta_description' => $request->meta_description,
                    'address' => $request->address,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2,
                    'email1' => $request->email1,
                    'email2' => $request->email2,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube
                ]);
                session()->flash('success', 'Settings Added Successfully');
            }

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



 }
