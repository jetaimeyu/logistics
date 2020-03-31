@if(count($errors)>0)
    <div class="alert alert-danger" role="alert" id="common-err">
        <button type="button" class="close" aria-label="Close" onclick="$('#common-err').hide()" ;>
            <span aria-hidden="true">×</span></button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
