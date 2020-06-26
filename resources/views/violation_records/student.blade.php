@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'violation_records'
])

@section('content')
    <div class="content">
        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-12 d-flex d-inline">
                <a href="{{ url()->previous() }}" class="return_back_link"><h6>{{ __('Violation Records') }} </h6></a> <span class="dir_slash px-2"> / </span> <h6> {{$student->student_last_name}}, {{$student->student_first_name}}</h6>
            </div>
        </div>
        
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}
@endpush