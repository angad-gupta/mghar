<?php

namespace App\Modules\Celebrity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Celebrity\Repositories\CelebrityInterface;
use App\Modules\Genre\Repositories\GenreInterface;

class CelebrityController extends Controller
{

    protected $celebrity;
    protected $genre;
    
    public function __construct(CelebrityInterface $celebrity, GenreInterface $genre)
    {
        $this->celebrity = $celebrity;
        $this->genre = $genre;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['celebrity'] = $this->celebrity->findAll($limit= 50, $search); 
        $data['search_value']=$search;
        return view('celebrity::celebrity.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['genre']=$this->genre->getList();
        return view('celebrity::celebrity.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all();

         try{ 

             $celebrityData = array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'], 
                'dob' => $data['dob'],
                'place_of_birth' => $data['place_of_birth'],
                'age' => $data['age'],
                'nationality' => $data['nationality'],
                'religion' => $data['religion'],
                'occupation' => $data['occupation'],
                'genre_id' => $data['genre_id'],
                'weight' => $data['weight'],
                'height' => $data['height'],
                'gender' => $data['gender']
            );

            if ($request->hasFile('celeb_pic')) {
                 $celebrityData['celeb_pic'] = $this->celebrity->upload($data['celeb_pic']); 
            }

            $celebrityData = $this->celebrity->save($celebrityData);
            $celebrity_id = $celebrityData->id;

            $title = $data['title'];
            $countname = sizeof($title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['title'][$i]){
                         $celebrityAwarddata['celebrity_id'] = $celebrity_id;
                         $celebrityAwarddata['title'] = $data['title'][$i];
                         $celebrityAwarddata['description'] = $data['description'][$i];

                        if ($request->hasFile('image')) {
                            $celebrityAwarddata['image'] = $this->celebrity->uploadAward($data['image'][$i]);
                        }

                         $this->celebrity->saveCelebrityAward($celebrityAwarddata);
                    }
                }
           
            alertify()->success('Celebrity Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('celebrity.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['celebrity'] = $this->celebrity->find($id);    
        $data['genre']=$this->genre->getList();
        return view('celebrity::celebrity.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();  

         try{ 

            $celebrityData = array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'], 
                'dob' => $data['dob'],
                'place_of_birth' => $data['place_of_birth'],
                'age' => $data['age'],
                'nationality' => $data['nationality'],
                'religion' => $data['religion'],
                'occupation' => $data['occupation'],
                'genre_id' => $data['genre_id'],
                'weight' => $data['weight'],
                'height' => $data['height'],
                'gender' => $data['gender']
            );

            if ($request->hasFile('celeb_pic')) {
                 $celebrityData['celeb_pic'] = $this->celebrity->upload($data['celeb_pic']);
            }

            $celebrityData = $this->celebrity->update($id, $celebrityData);
            $celebrity_id = $id;
            
            $this->celebrity->deleteCelebrityAward($celebrity_id);

            $title = $data['title'];
            $countname = sizeof($title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['title'][$i]){
                         $celebrityAwarddata['celebrity_id'] = $celebrity_id;
                         $celebrityAwarddata['title'] = $data['title'][$i];
                         $celebrityAwarddata['description'] = $data['description'][$i];

                        if ($request->hasFile('image')) {
                            $celebrityAwarddata['image'] = $this->celebrity->uploadAward($data['image'][$i]);
                        }else{
                            $celebrityAwarddata['image'] =$data['previouse_image'][$i];
                        }

                         $this->celebrity->saveCelebrityAward($celebrityAwarddata);
                    }
                }

            alertify()->success('Celebrity Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('celebrity.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       try{
            $this->celebrity->deleteCelebrityAward($id);
            $this->celebrity->delete($id);
            alertify()->success('Celebrity Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('celebrity.index'));  
    }


    public function appendAward(Request $request){
         
         $data = view('celebrity::celebrity.partial.add-more-award')->render();
         return response()->json(['options'=>$data]);
        
    } 

}
