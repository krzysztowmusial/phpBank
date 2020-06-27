<style>
    .contacts {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1em;
    }

    .contacts__avatar {
        width: 50px;
        height: 50px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 1em;
        cursor: pointer;
    }
</style>

@extends('layouts.app')

{{-- CONTENT --}}
@section('content')

<style>
    .content {
        padding: 56px 0;
    }
</style>

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add contact') }}</div>

                <div class="card-body">
                    <form method="POST" action='/dashboard/contacts/add'>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add contact') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Your contacts</div>
                <div class="card-body">
                    @foreach ($contacts as $contact)

                        <div class="contacts">
                            <div class="contacts__avatar" style="background: url({{ $contact[0]->photo }}); background-position: center center; background-size: contain;"></div>
                            <div>{{ $contact[0]->name }} {{ $contact[0]->surname }}</div>
                            <div>{{ $contact[0]->email }}</div>
                            <form method="POST" action='/dashboard/contacts/delete'>
                                @csrf
    
                            <input type="hidden" name="contact_id" value="{{ $contact[0]->id }}">
    
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Delete Contact') }}
                                </button>
                            </form>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
