<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {
    public function authorize(){ return auth()->check(); }
    public function rules(){
        return ['content' => 'required|string|max:5000', 'image' => 'nullable|image|max:5120', 'privacy' => 'required|in:public,friends,private'];
    }
}
