<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Http\Resources\PhoneResource;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function store(PhoneRequest $request)
    {
        $query = Phone::create($request->validated());

        return new PhoneResource($query);
    }

    public function getData()
    {
        $query = Phone::get();

        return new PhoneResource($query);
    }
}
