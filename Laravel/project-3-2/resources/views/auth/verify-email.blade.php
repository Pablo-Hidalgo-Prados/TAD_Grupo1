
@extends('auth.template')

@section('content')
<html lang="{{ app()->getLocale() }}">
<div class="container">
    <div class="row justify-content-center">
        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('messages.verify_email_info_1')</div>

                <div class="card-body">
                    <p>@lang('messages.verify_email_info_2')</p>
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="Resend">
                                @lang('messages.verify_email_info_3')
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