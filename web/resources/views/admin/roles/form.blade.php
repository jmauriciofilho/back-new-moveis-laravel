<br />

<div class="col-md-12">

    @if($role->id)
        {!! Form::hidden('id', $role->id) !!}
    @endif

    <div class="form-group">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', $role->name, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('display_name', 'Nome de Exibição') !!}
        {!! Form::text('display_name', $role->display_name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::textarea('description', $role->description, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="permissions">Permissões</label>
        <select name="permissions[]" id="permissions" class="widthFull" multiple>
            @foreach($permissions as $permissionId => $permissionName)
                <option value="{!! $permissionId !!}" {!! $role->hasPermission($permissionName) ? 'selected' : '' !!}>{!! $permissionName !!}</option>
            @endforeach
        </select>
    </div>
</div>

@section('formScripts')
    <script>
        $('#permissions').select2();
    </script>
@endsection