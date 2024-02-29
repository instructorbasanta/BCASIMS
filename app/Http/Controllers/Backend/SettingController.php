<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\SettingRequest;
use App\Http\Requests\Backend\SettingUpdateRequest;
use App\Models\Setting;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends BackendBaseController
{
    protected $panel = 'Settings';
    protected $base_route = 'backend.setting.';
    protected $base_view = 'backend.setting.';
    protected $model;
    protected $folder = 'setting';

    function __construct(){
        $this->model = new Setting();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['record'] = Setting::first();
        if ($data['record']){
            return view($this->__loadDataToView($this->base_view . 'edit'),compact('data'));
        } else {
            return view($this->__loadDataToView($this->base_view . 'create'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SettingRequest $request)
    {
        try{
            if($request->hasfile('logo_header_image'))
            {
                $logo_header_image = time().'.'.$request->file('logo_header_image')->getClientOriginalExtension();;
                $request->file('logo_header_image')->move('setting/images/', $logo_header_image);
                $request->request->add(['logo_header' => $logo_header_image]);

            }
            if($request->hasfile('logo_footer_image'))
            {
                $logo_footer_image = time().'.'.$request->file('logo_footer_image')->getClientOriginalExtension();;
                $request->file('logo_footer_image')->move('setting/images/', $logo_footer_image);
                $request->request->add(['logo_footer' => $logo_footer_image]);
            }
            if($request->hasfile('favicon_image_file'))
            {
                $favicon_image_file = time().'.'.$request->file('favicon_image_file')->getClientOriginalExtension();;
                $request->file('favicon_image_file')->move('setting/images/', $favicon_image_file);
                $request->request->add(['favicon_image' => $favicon_image_file]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);

            if ($this->model->create($request->request->all())){
                request()->session()->flash('success',$this->panel . ' created successfully.');
            } else  {
                request()->session()->flash('error',$this->panel . ' creation failed.');
            }
        }catch (\Exception $exception){
            request()->session()->flash('error','Oops....Error occur:  ' . $exception->getMessage() );
        }
        return redirect()->route($this->base_route . 'create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__loadDataToView($this->base_view . 'edit'),compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingUpdateRequest $request, string $id)
    {
        try{
            $data['record'] = $this->model->find($id);
            if (!$data['record']){
                request()->session()->flash('error','Opps ... record not found');
                return redirect()->route($this->base_route . 'index');
            }

            if($request->hasfile('logo_header_image'))
            {
                $logo_header = time().'.'.$request->file('logo_header_image')->getClientOriginalExtension();;
                $request->file('logo_header_image')->move('setting/images/', $logo_header);
                $request->request->add(['logo_header' => $logo_header]);
                if ($data['record']->logo_header && file_exists(public_path('setting/images/'.$data['record']->logo_header))){
                    unlink(public_path('setting/images/'.$data['record']->logo_header));
                }
            }
            if($request->hasfile('logo_footer_image'))
            {
                $logo_footer = time().'.'.$request->file('logo_footer_image')->getClientOriginalExtension();;
                $request->file('logo_footer_image')->move('setting/images/', $logo_footer);
                $request->request->add(['logo_footer' => $logo_footer]);
                if ($data['record']->logo_footer && file_exists(public_path('setting/images/'.$data['record']->logo_footer))){
                    unlink(public_path('setting/images/'.$data['record']->logo_footer));
                }
            }

            if($request->hasfile('favicon_image_file'))
            {
                $favicon = time().'.'.$request->file('favicon_image_file')->getClientOriginalExtension();;
                $request->file('favicon_image_file')->move('setting/images/', $favicon);
                $request->request->add(['favicon_image' =>$favicon]);
                if ($data['record']->favicon_image && file_exists(public_path('setting/images/'.$data['record']->favicon_image))){
                    unlink(public_path('setting/images/'.$data['record']->favicon_image));
                }
            }
            $request->request->add(['updated_by' => auth()->user()->id]);
            Alert::info($this->panel . ' updated successfully',$this->panel . ' updated');
            if ($data['record']->update($request->request->all())){
                request()->session()->flash('success',$this->panel . ' updated successfully.');
            } else  {
                request()->session()->flash('error',$this->panel . ' update failed.');
            }
        }catch (\Exception $exception){
            request()->session()->flash('error','Oops....Error occur:  ' . $exception->getMessage());
        }
        return redirect()->route($this->base_route . 'create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
