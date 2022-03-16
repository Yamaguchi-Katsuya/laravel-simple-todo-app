<link rel="stylesheet" href="{{ asset('css/message.css') }}">
<script type="text/javascript" src="{{ asset('js/message.js') }}"></script>
@if (Session::has('success'))
    <div class="message -success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
@if (Session::has('error'))
    <div class="message -error">
        <p>{{ Session::get('error') }}</p>
    </div>
@endif
