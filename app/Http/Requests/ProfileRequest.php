<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {
    public function authorize(){ return auth()->check(); }
    public function rules(){ return ['name'=>'required|string|max:255','bio'=>'nullable|string','avatar'=>'nullable|image|max:2048']; }
}
