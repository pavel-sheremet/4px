@extends('layouts.app')
@section('title', __('user.index.title'))

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>{{ __('user.index.title') }}</h5>
                <a type="button" href="{{ route('user.create') }}" class="btn btn-primary">{{ __('app.button.add.title') }}</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush mb-3">
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between">
                            <div class="col-3 col-lg-1">
                                {{ $user->name }}
                            </div>
                            <div class="col-4">
                                {{ $user->email }}
                            </div>
                            <div class="col-3">
                                {{ $user->created_at }}
                            </div>
                            <div class="col-2">
                                <a type="button"
                                   href="{{ route('user.edit', ['user' => $user]) }}"
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
                                                    {{ __('user.index.modal.title') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ __('user.index.modal.confirm', ['name' => $user->name]) }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    {{ __('app.button.cancel.title') }}
                                                </button>
                                                <form method="post"
                                                      action="{{ route('user.destroy', ['user' => $user]) }}"
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
