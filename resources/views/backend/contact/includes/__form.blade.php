<div class="form-group">
    {!! Form::label('name', 'Title'); !!}
    {!! Form::text('name', null,['class' => 'form-control','placeholder' => 'Enter name']); !!}
    @include('backend.includes.filed_validation',['input' => 'name'])
</div>
<div class="form-group">
    {!! Form::label('email', 'Email'); !!}
    {!! Form::text('email', null,['class' => 'form-control','placeholder' => 'Enter email']); !!}
    @include('backend.includes.filed_validation',['input' => 'email'])
</div>
<div class="form-group">
    {!! Form::label('phone', 'Phone'); !!}
    {!! Form::text('phone', null,['class' => 'form-control','placeholder' => 'Enter phone']); !!}
    @include('backend.includes.filed_validation',['input' => 'phone'])
</div>
<div class="form-group">
    {!! Form::label('address', 'Address'); !!}
    {!! Form::text('address', null,['class' => 'form-control','placeholder' => 'Enter address']); !!}
    @include('backend.includes.filed_validation',['input' => 'address'])
</div>
<div class="form-group">
    {!! Form::label('message', 'Message'); !!}
    {!! Form::textarea('message', null,['class' => 'form-control','placeholder' => 'Enter message','rows'=> 3]); !!}
</div>
<div class="form-group">
    {!! Form::label('response', 'Response'); !!}
    {!! Form::textarea('response', null,['class' => 'form-control','placeholder' => 'Enter response','rows'=> 3]); !!}
</div>
