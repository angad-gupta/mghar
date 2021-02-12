<?php

namespace App\Modules\DynamicBlock\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Modules\DynamicBlock\Repositories\BlockSectionInterface;

class DynamicBlockController extends Controller
{
    protected $blocksection;
    
    public function __construct(BlockSectionInterface $blocksection)
    {
        $this->blocksection = $blocksection;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        
        $data['blocksection'] = $this->blocksection->findAll(); 
        if ($data['blocksection']->total() > 0) {
            return view('dynamicblock::dynamicblock.edit-block',$data);
        } else {
            return view('dynamicblock::dynamicblock.index');
        }
    }

    public function appendBlock(Request $request){
         
         $data = view('dynamicblock::dynamicblock.partial.add-more-block')->render();
         return response()->json(['options'=>$data]);
        
    } 
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('dynamicblock::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
       $data  = $request->all(); 

    try{ 

            $block_section = $data['block_section'];
            $countname = sizeof($block_section);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['block_section'][$i]){

                        if ($data['is_scripted_ads'][$i] == 'no') {
                            $blockSectiondata['ads_image'] = $this->blocksection->upload($data['ads_image'][$i]);
                        }else{
                           $blockSectiondata['ads_image'] =NULL; 
                        }

                         $blockSectiondata['block_section'] = $data['block_section'][$i];
                         $blockSectiondata['sort_order'] = $data['sort_order'][$i];
                         $blockSectiondata['is_scripted_ads'] = $data['is_scripted_ads'][$i];
                         $blockSectiondata['scripted_ads'] = $data['scripted_ads'][$i];
                         $blockSectiondata['ads_title'] = $data['ads_title'][$i];
                         $blockSectiondata['ads_url'] = $data['ads_url'][$i];

                         $this->blocksection->save($blockSectiondata);
                    }
                }
      
        alertify()->success('Dynamic Block Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('dynamicblock.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('dynamicblock::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('dynamicblock::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $data  = $request->all();

    try{ 

           DB::table('block_sections')->truncate();

            $block_section = $data['block_section'];
            $countname = sizeof($block_section);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['block_section'][$i]){

                         if(array_key_exists('edit_ads_image',$data)){
                                if ((array_key_exists('ads_image',$data)) AND array_key_exists($i,$data['ads_image'])){ 
                                    $blockSectiondata['ads_image'] = $this->blocksection->upload($data['ads_image'][$i]);
                                }else{
                                   
                                    $blockSectiondata['ads_image'] = ($data['edit_ads_image'][$i]) ? $data['edit_ads_image'][$i] : NULL;
                                }
                            }else{ 
                                 if ((array_key_exists('ads_image',$data)) AND array_key_exists($i,$data['ads_image'])){ 
                                    $blockSectiondata['ads_image'] = $this->blocksection->upload($data['ads_image'][$i]);
                                }else{
                                   
                                    $blockSectiondata['ads_image'] = ($data['edit_ads_image'][$i]) ? $data['edit_ads_image'][$i] : NULL;
                                }
                            }

                         $blockSectiondata['block_section'] = $data['block_section'][$i];
                         $blockSectiondata['sort_order'] = $data['sort_order'][$i];
                         $blockSectiondata['is_scripted_ads'] = $data['is_scripted_ads'][$i];
                         $blockSectiondata['scripted_ads'] = $data['scripted_ads'][$i];
                         $blockSectiondata['ads_title'] = $data['ads_title'][$i];
                         $blockSectiondata['ads_url'] = $data['ads_url'][$i];

                         $this->blocksection->save($blockSectiondata);
                    }
                }
   
        alertify()->success('Dynamic Block Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('dynamicblock.index'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
