<?php

namespace LaracastClone\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }


    public function uploadSeriesImage(){

        //upload the file
        $uploadedImage = $this->image;
        $this->fileName = str_slug($this->title).'.'.$uploadedImage->getClientOriginalExtension();

        $uploadedImage->storePubliclyAs('public/series', $this->fileName);

        return $this;
    }
}
