@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student_handbook'
])

@section('content')
    <div class="content">
        <div class="row">
            Student HnadBook
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush