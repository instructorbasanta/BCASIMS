<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BlogRequest;
use App\Http\Requests\Backend\ContactRequest;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\DeviceType;

class ContactController extends BackendBaseController
{
    protected $panel = 'Contact Us Message';
    protected $base_route = 'backend.contact.';
    protected $base_view = 'backend.contact.';
    protected $model;
    protected $folder = 'contact';


    function __construct(){
        $this->model = new Contact();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['records'] = $this->model->all();
        return view($this->__loadDataToView($this->base_view . 'index'),compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        return view($this->__loadDataToView($this->base_view . 'show'),compact('data'));
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
    public function update(ContactRequest $request, string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        $request->request->add(['updated_by' => auth()->user()->id]);
        try {
            if($data['record']->update($request->all())){
                request()->session()->flash('success', $this->panel . ' Updated Successfully');
            } else {
                request()->session()->flash('error','Opps ... error occured while deleting record');
            }
        } catch (\Exception $exception) {
            $request->session()->flash('error','Oops....Error occur:  ' . $exception->getMessage() );
        }
        return redirect()->route($this->base_route . 'index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->delete()){
            request()->session()->flash('success', $this->panel . 'Deleted Successfully');
        } else {
            request()->session()->flash('error','Opps ... error occured while deleting record');
        }
        return redirect()->route($this->base_route . 'index');
    }

    function trash(){
        $data['records'] = $this->model->onlyTrashed()->get();
        return view($this->__loadDataToView($this->base_view . 'trash'),compact('data'));
    }

    public function forceDelete (string $id)
    {
        $data['record'] = $this->model->where('id',$id)->onlyTrashed()->first();
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        $image = $data['record']->image;
        if($data['record']->forceDelete()){
            if ($image && file_exists(public_path('images/' . $this->folder . '/' . $image))){
                unlink(public_path('images/' .  $this->folder . '/' .$image));
            }
            request()->session()->flash('success', $this->panel . 'Deleted Successfully');
        } else {
            request()->session()->flash('error','Opps ... error occured while deleting record');
        }
        return redirect()->route($this->base_route . 'index');
    }

    function restore($id){
        $data['record'] = $this->model->where('id',$id)->onlyTrashed()->first();
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($data['record']->restore()){
            request()->session()->flash('success', $this->panel . ' Recovered Successfully');
        } else {
            request()->session()->flash('error','Opps ... error occured while recovering record');
        }
        return redirect()->route($this->base_route . 'index');
    }
}
