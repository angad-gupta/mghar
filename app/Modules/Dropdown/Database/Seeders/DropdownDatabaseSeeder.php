<?php

namespace App\Modules\Dropdown\Database\Seeders;

use App\Modules\Dropdown\Entities\Dropdown;
use App\Modules\Dropdown\Entities\Field;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DropdownDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        

        $field = array('User Type','Department','Designation','Blood Group','Ethnic','Religion');

          $Dropvalue =array('admin','Technical','Project Manager','A+','Brahmin','Hindu');


        foreach($field as $key => $value){

           $slug = str_slug($value, '_');

            $field = Field::create([
                'title' => $value,
                'slug' => $slug
            ]);


            $field_data=Field::where('slug',$slug)->first(); 

            Dropdown::create([
                'fid' => $field_data['id'],
                'dropvalue'=> $Dropvalue[$key],

            ]);

        }



    }
}
