@if(isset($errors))
    @foreach($errors->messages() as $field => $fieldErrors)
        <select class="request-errors" data-field="{!! $field !!}">
            @foreach($fieldErrors as $key => $error)
                <option value="{!! $key !!}">{!! $error !!}</option>
            @endforeach
        </select>
    @endforeach
@endif