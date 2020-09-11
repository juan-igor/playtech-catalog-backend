@extends('errors.illustrated-layout')

@section('title', __('403 - Acesso Negado'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Acesso Negado'))
