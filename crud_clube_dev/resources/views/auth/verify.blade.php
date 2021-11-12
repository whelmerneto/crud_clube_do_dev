@extends('layouts.app')
@section('title', 'Verificar e-mail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado para seu e-mail') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir, procure pelo link de verificação em sua caixa de entrada.') }}
                    {{ __('Se você não recebeu o e-mail') }}, <a href="{{ route('verification.resend') }}">{{ __('clique aqui para enviar novamente') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
