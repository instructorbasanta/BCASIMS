<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Enter name']); !!}
    @include('backend.includes.filed_validation',['input' => 'name'])
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug'); !!}
    {!! Form::text('slug', null,['class' => 'form-control','placeholder' => 'Enter slug']); !!}
    @include('backend.includes.filed_validation',['input' => 'slug'])
</div>
<div class="form-group">
    {!! Form::label('rank', 'Rank'); !!}
    {!! Form::text('rank', null,['class' => 'form-control','placeholder' => 'Enter rank']); !!}
    @include('backend.includes.filed_validation',['input' => 'rank'])
</div>
<div class="form-group">
    {!! Form::label('image_file', 'Image'); !!}
    {!! Form::file('image_file',['class' => 'form-control']); !!}
    @include('backend.includes.filed_validation',['input' => 'image_file'])
</div>
<div class="form-group">
    {!! Form::label('short_description', 'Short Description'); !!}
    {!! Form::textarea('short_description', null,['class' => 'form-control','placeholder' => 'Enter short description','rows'=> 3]); !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description'); !!}
    {!! Form::textarea('description', null,['class' => 'form-control','placeholder' => 'Enter description','rows'=> 3]); !!}
</div>
<div class="form-group">
    {!! Form::label('meta_title', 'Meta Title'); !!}
    {!! Form::textarea('meta_title', null,['class' => 'form-control','placeholder' => 'Enter meta title','rows'=> 3]); !!}
</div>
<div class="form-group">
    {!! Form::label('meta_keyword', 'Meta Keyword'); !!}
    {!! Form::textarea('meta_keyword', null,['class' => 'form-control','placeholder' => 'Enter meta keyword','rows'=> 3]); !!}
</div>
<div class="form-group">
    {!! Form::label('meta_description', 'Meta Description'); !!}
    {!! Form::textarea('meta_description', null,['class' => 'form-control','placeholder' => 'Enter meta description','rows'=> 3]); !!}
</div>
<div class="form-group">
    <label for="active">Status</label>
    {!! Form::radio('status',1) !!}Active
    {!! Form::radio('status',0,true) !!}De Active
</div>
