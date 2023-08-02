@if (isset ($errors) && count($errors) > 0)
    <div class="" role="alert">
        <ul class="">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if(is_array($data))
        @foreach ($data as $msg)
            <div class="" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
        @else
            <div class="" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
@endif

