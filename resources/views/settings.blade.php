@extends ('layouts/app')

@section('content')
    <div id="app">
        <settings-form :types='@json(\App\Http\Services\FeedbackFormTypes::AVAILABLE_TYPES)'
                       :curtype='@json($type)'></settings-form>
    </div>
@endsection
