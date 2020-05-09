@if(session()->has('error-message'))
    <div style="background-color: #FFD2D2; color: #D8000C; padding: 2px 10px;">
        <p>Whoops, looks like something went wrong:</p>
        <p>{{ session()->get('error-message') }}</p>
    </div>
@endif

@if(session()->has('success-message'))
    <div style="background-color: #DFF2BF; color: #4F8A10; padding: 2px 10px;">
        <p>{{ session()->get('success-message') }}</p>
    </div>
@endif
