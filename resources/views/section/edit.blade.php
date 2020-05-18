@extends('layouts.app')
@section('title', __('section.index.title'))

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ $section->name ?? __('section.create.title') }}</h5>
            </div>
            <div class="card-body">
                <form method="post"
                      enctype="multipart/form-data"
                      action="{{ $section->exists ? route('section.update', ['section' => $section]) : route('section.store') }}"
                >
                    @csrf
                    <div class="form-group">
                        <label class="w-100">
                            {{ __('section.edit.name.label') }}
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="{{ __('section.edit.name.placeholder') }}"
                                   value="{{ old('name') ?? $section->name }}"
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
                            {{ __('section.edit.description.label') }}
                            <textarea class="form-control" name="description" rows="3">{{ old('description') ?? $section->description }}</textarea>
                        </label>
                    </div>

                    @if($section->logo)
                        <div class="form-group">
                            <div class="text-center">
                                <img src="{{ $section->logoUrl }}" class="rounded">
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        {{ __('section.edit.file.label') }}
                        <div class="custom-file">
                            <label class="custom-file-label">
                                {{ __('section.edit.file.placeholder') }}
                            </label>
                            <input type="file"
                                   name="logo"
                                   class="form-control custom-file-input @if($errors->has('logo')) is-invalid @endif"
                            >
                        </div>

                        @if($errors->has('logo'))
                            @foreach($errors->get('logo') as $error)
                                <div class="text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        @foreach($users as $user)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="user_id[]"
                                           value="{{ $user->id }}"
                                           @if($section->users->contains('id', $user->id) || collect(old('user_id'))->contains($user->id)) checked @endif
                                    >
                                    {{ $user->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('app.button.save.title') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
