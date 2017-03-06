<br />

<div class="col-md-4 col-sm-12">
    <div class="form-group text-center">
        <div id="avatar" style="width:210px;height:210px;margin:auto auto;"></div>
    </div>
</div>

<div class="col-md-8 col-sm-12">

    @if($user->id)
        {!! Form::hidden('id', $user->id) !!}
    @endif

    <div class="form-group">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'E-mail') !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label for="roles">Regras</label>
        <select name="roles[]" id="roles" class="widthFull" multiple>
            @foreach($roles as $roleId => $roleName)
                <option value="{!! $roleId !!}" {!! $user->hasRole($roleName) ? 'selected' : '' !!}>{!! $roleName !!}</option>
            @endforeach
        </select>
    </div>

    @if($user->id)
        <div class="form-group">
            <label for="activated">Usuário Ativo?</label>
            <div class="form-group">
                <input type="checkbox" id="activated" name="activated" class="checkboxBlue" {!! $user->activated ? 'checked' : '' !!} />
            </div>
        </div>
    @endif
</div>

@section('formScripts')
    <script>
        $('#roles').select2();
        var avatar = new CskUploadAvatar('avatar', '/assets/site/img/no-photo.gif');
        avatar.wrapper.className = 'img-circle';
        avatar.wrapper.style.width = '210px';
        avatar.wrapper.style.height = '210px';
        avatar.wrapper.style.display = 'block';
        avatar.wrapper.style.backgroundSize = '210px 210px';
        avatar.wrapper.style.backgroundPosition = '0';
        avatar.init();
    </script>
@endsection