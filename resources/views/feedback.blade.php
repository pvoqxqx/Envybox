@extends ('layouts.app')

@section('content')
    <div id="app">
        <feedback-form :user='@json(Auth::user() ? ['name' => Auth::user()->name, 'phone' => Auth::user()->phone] : NULL)'></feedback-form>
    </div>
@endsection
