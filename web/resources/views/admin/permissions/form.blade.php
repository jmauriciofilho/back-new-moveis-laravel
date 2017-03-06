<br />

<div class="col-md-12">

    @if($permission->id)
        {!! Form::hidden('id', $permission->id) !!}
    @endif

    <div class="form-group">
        {!! Form::label('name', 'Nome') !!}
        {!! Form::text('name', $permission->name, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('display_name', 'Nome de Exibição') !!}
        {!! Form::text('display_name', $permission->display_name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Descrição') !!}
        {!! Form::textarea('description', $permission->description, ['class' => 'form-control']) !!}
    </div>
</div>

{{--@section('formScripts')--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--//--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}