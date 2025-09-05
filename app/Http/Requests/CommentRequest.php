<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest {
    public function authorize(){ return auth()->check(); }
    public function rules(){ return ['body' => 'required|string|max:2000']; }
}
