<style>
    .select {
        /* justify-content: center; */
    }
</style>

@extends('layouts.app')

{{-- CONTENT --}}
@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send money') }}</div>

                <div class="card-body">
                    <form method="POST" action='/dashboard/transactions'>
                        @csrf

                        <div class="form-group row select">
                            <select id="type" name="type" class="col-md-4 col-form-label text-md-right">
                                <option value="email">Email adress</option>
                                <option value="account">Account number</option>
                              </select>

                            <div class="col-md-6">
                                <input type="text" id="text" class="form-control" name="text" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" class="form-control" name="amount" value="{{ old('Amount') }}" required autofocus min="1">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send money') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection