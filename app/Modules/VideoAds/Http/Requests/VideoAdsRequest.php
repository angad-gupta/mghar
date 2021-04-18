<?php

namespace App\Modules\VideoAds\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoAdsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video_ads_upload' => 'required|mimes:mpeg,3gp,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,jpeg,jpg,png|nullable|max:100040'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'video_ads_upload.required' => 'Video Ads is required',
        ];
    }
}
