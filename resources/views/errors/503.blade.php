@extends('errors.illustrated-layout')

@section('title', __('503 - Serviço Indisponível'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Serviço Indisponível'))
