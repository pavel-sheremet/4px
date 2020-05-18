@extends('layouts.app')
@section('title', __('user.index.title'))

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ $user->name ?? __('section.create.title') }}</h5>
            </div>
            <div class="card-body">
                <form method="post"
                      enctype="multipart/form-data"
                      action="{{ $user->exists ? route('user.update', ['user' => $user]) : route('user.store') }}"
                >
                    @csrf
                    <div class="form-group">
                        <label class="w-100">
                            {{ __('user.edit.name.label') }}
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="{{ __('user.edit.name.placeholder') }}"
                                   value="{{ old('name') ?? $user->name }}"
                            >
                        </label>
                        @if($errors->has('name'))
                            @foreach($errors->get('name') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="w-100">
                            {{ __('user.edit.email.label') }}
                            <input type="text"
                                   name="email"
                                   class="form-control"
                                   placeholder="{{ __('user.edit.email.placeholder') }}"
                                   value="{{ old('email') ?? $user->email }}"
                            >
                        </label>
                        @if($errors->has('email'))
                            @foreach($errors->get('email') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="w-100">
                            {{ __('user.edit.password.label') }}
                            <input type="text"
                                   name="password"
                                   class="form-control"
                                   placeholder="{{ __('user.edit.password.placeholder') }}"
                                   value="{{ old('password') }}"
                            >
                        </label>
                        @if($errors->has('password'))
                            @foreach($errors->get('password') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('app.button.save.title') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
