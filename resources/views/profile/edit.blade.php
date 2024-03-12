@extends('layouts.dashboardLayout')

@section('titulo')
Editar Perfil: {{Auth::user()->name}} Fortmix
@endsection

@section('active1')
active
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Perfil</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                    <p class="mb-0">Editar Perfil</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>
                    <form method="post" action="{{ route('profile.update') }}" class="mt-2 space-y-6">
                        @csrf
                        @method('patch')
                        <div>
                            <x-input-label class="form-control-label" for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                        </div>

                        <div class="mt-2">
                            <x-input-label class="form-control-label" for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full form-control" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error class="mt-2 form-control" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                            <div>
                                <p class="text-sm mt-2 text-gray-800">
                                    {{ __('Seu endereço de email não foi verificado.') }}

                                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('Clique aqui para reenviar o link de verificação.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('Um novo link de verificação foi enviado em seu email') }}
                                </p>
                                @endif
                            </div>
                            @endif
                        </div>
                        <hr/>
                        <div class="flex items-center gap-4">
                            <x-primary-button class="form-control btn-success">{{ __('Salvar') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                                >{{ __('Salvo.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
                <hr class="horizontal dark">
                <p class="text-uppercase text-sm">Alterar Senha</p>
                <div class="row">
                    <form method="post" action="{{ route('password.update') }}" class="mt-2 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="update_password_current_password" class="form-control-label" :value="__('Senha Atual')" />
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" />
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 form-control" />
                        </div>

                        <div class="mt-2">
                            <x-input-label class="form-control-label" for="update_password_password" :value="__('Nova Senha')" />
                            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 form-control" />
                        </div>

                        <div class="mt-2">
                            <x-input-label class="form-control-label" for="update_password_password_confirmation" :value="__('Confirme a nova senha')" />
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 form-control" />
                        </div>
                        <hr/>
                        <div class="flex items-center gap-4">
                            <x-primary-button class="form-control">{{ __('Salvar') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                            <p
                                x-data="{ show: true }"
                                x-show="show"
                                x-transition
                                x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600"
                                >{{ __('Salvo.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection