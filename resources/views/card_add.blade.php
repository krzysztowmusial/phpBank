<style>

</style>

@extends('layouts.app')

{{-- CONTENT --}}
@section('content')

<div class="content">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add card') }}</div>

                <div class="card-body">
                    <form method="POST" action='/dashboard/card/add'>
                        @csrf

                        <div class="form-group row select">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">{{ __('Brand') }}</label>

                            <select id="brand" name="brand" class="col-md-6">
                                <option value="mastercard">Mastercard</option>
                                <option value="visa">Visa</option>
                              </select>
                        </div>

                        <div class="form-group row select">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>

                            <select id="color" name="color" class="col-md-6">
                                <option value="first">Creme</option>
                                <option value="second">Purple</option>
                              </select>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add card') }}
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
