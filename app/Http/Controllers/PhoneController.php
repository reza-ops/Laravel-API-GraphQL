<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneRequest;
use App\Http\Resources\PhoneResource;
use App\Models\Phone;

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

        return PhoneResource::collection($query);
    }

    public function update(Phone $phone, PhoneRequest $request)
    {
        $phone->update($request->validated());

        return new PhoneResource($phone);
    }

    public function destroy(Phone $phone)
    {
        $phone->delete();

        return new PhoneResource($phone);
    }
}
