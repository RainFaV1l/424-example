@if(session()->has('error') || session()->has('message') || session()->has('success'))
    <div class="message @if(session()->has('error')) message_error @elseif(session()->has('message')) message_show @elseif(session()->has('success')) message_success @endif">
        @if(session()->has('error')) {{ session('error') }} @elseif(session()->has('message')) {{ session('message') }} @elseif(session()->has('success')) {{ session('success') }} @endif
    </div>
@endif
