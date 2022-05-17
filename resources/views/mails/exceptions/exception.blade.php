{{ config('app.name') }}
<br><br>
{!! $exception !!}
@if(!empty($secondException))
<br><br><br><br>
<b>Excepção secundária:</b>
<br><br>
{!! $secondException !!}
@endif
