@extends('layouts.app')
@section('title', __('section.index.title'))

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ __('section.index.title') }}</h5>
                <a type="button" href="{{ route('section.create') }}" class="btn btn-primary">{{ __('app.button.add.title') }}</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush mb-3">
                    @foreach($sections as $section)
                        <li class="list-group-item d-flex">
                            <div class="col-2 col-lg-1">
                                @if($section->logo)
                                    <img src="{{ $section->logoUrl }}" class="img-fluid img-thumbnail">
                                @endif
                            </div>
                            <div class="col-5">
                                <div class="font-weight-bold">{{ $section->name }}</div>
                                <div class="font-weight-light">{{ $section->description }}</div>
                            </div>
                            <div class="col-3">
                                @if($section->users->isNotEmpty())
                                    <div class="font-weight-bold">Users</div>
                                    <div class="font-weight-light">
                                        <ol>
                                            @foreach($section->users as $user)
                                                <li>{{ $user->name }}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif
                            </div>
                            <div class="col-2">
                                <a type="button"
                                   href="{{ route('section.edit', ['section' => $section]) }}"
                                   class="btn btn-secondary">
                                    {{ __('app.button.edit.title') }}
                                </a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#removeModal">
                                    {{ __('app.button.delete.title') }}
                                </button>

                                <div class="modal fade"
                                     id="removeModal"
                                     tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="removeModal"
                                     aria-hidden="true"
                                >
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ __('section.index.modal.title') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('section.index.modal.confirm', ['name' => $section->name]) }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    {{ __('app.button.cancel.title') }}
                                                </button>
                                                <form method="post"
                                                      action="{{ route('section.destroy', ['section' => $section]) }}"
                                                >
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __('app.button.delete.title') }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $sections->links() }}
            </div>
        </div>
    </div>
@endsection
