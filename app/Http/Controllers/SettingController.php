<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SettingsInterface;
use App\Http\Requests\AddSettingRequest;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $settingInterface;

    public function __construct(SettingsInterface $settingInterface)
    {
        $this->settingInterface = $settingInterface;

    }


    public function create()
    {
        return $this->settingInterface->create();
    }

    public function store(AddSettingRequest $request)
    {
        return $this->settingInterface->store($request);
    }
}
