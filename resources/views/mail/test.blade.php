@extends('mail.base-customer')

@section('subject')
    {{ $subject }}
@endsection

@section('content')
    {!! $email_body !!}
@endsection

@section('footer')
    {{-- footer --}}
@endsection
