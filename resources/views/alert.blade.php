@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success" role="alert">
<strong>{{\Illuminate\Support\Facades\Session::get('success')}}</strong>
    </div>
@elseif(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{\Illuminate\Support\Facades\Session::get('error')}}</strong>
    </div>
@endif
