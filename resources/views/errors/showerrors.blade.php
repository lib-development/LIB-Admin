@if($errors->any())
    <ul class="alert alert-info" style="list-style: none;">
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
    </ul>

@endif
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}" >{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>