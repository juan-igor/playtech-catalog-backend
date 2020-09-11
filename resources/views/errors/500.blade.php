@extends('errors.illustrated-layout')

@section('title', __('500 - Erro no Servidor'))
@section('code', '500')
@section('message', __('Erro no Servidor'))
@section('exception_info')
<b>Exception Message</b>
<br/>
{{ $error_array['message'] }}
<br/>
<br/>
<b>Exception Trace</b>
<br/>
{{ $error_array['trace'] }}
@endsection
