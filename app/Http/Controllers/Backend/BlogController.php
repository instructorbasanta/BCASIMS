<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BlogRequest;
use App\Models\Blog;
use App\Models\DeviceType;

class BlogController extends BackendBaseController
{
    protected $panel = 'Blog';
    protected $base_route = 'backend.blog.';
    protected $base_view = 'backend.blog.';
    protected $model;
    protected $folder = 'blog';


    function __construct(){
        $this->model = new Blog();
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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];
        return view($this->__loadDataToView($this->base_view . 'create'),compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        try{
            if($request->hasfile('image_file')) {
                $filename = time().'.'.$request->file('image_file')->getClientOriginalExtension();;
                $request->file('image_file')->move('images/' . $this->folder . '/', $filename);
                $request->request->add(['image' => $filename]);
            }
            $request->request->add(['created_by' => auth()->user()->id]);
            $record = $this->model->create($request->all());
            if ($record){
                $request->session()->flash('success',$this->panel . ' created successfully.');
            } else  {
                $request->session()->flash('error',$this->panel . ' creation failed.');
            }
        }catch (\Exception $exception){
            $request->session()->flash('error','Oops....Error occur:  ' . $exception->getMessage() );
        }
        return redirect()->route($this->base_route . 'index');
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
    public function update(BlogRequest $request, string $id)
    {
        $data['record'] = $this->model->find($id);
        if (!$data['record']){
            request()->session()->flash('error','Opps ... record not found');
            return redirect()->route($this->base_route . 'index');
        }
        if($request->hasfile('image_file')) {
            $filename = time().'.'.$request->file('image_file')->getClientOriginalExtension();;
            $request->file('image_file')->move('images/' . $this->folder . '/', $filename);
            $request->request->add(['image' => $filename]);
            if ($data['record']->image && file_exists(public_path('images/' . $this->folder . '/' . $data['record']->image))){
                unlink(public_path('images/' .  $this->folder . '/' .$data['record']->image));
            }
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
