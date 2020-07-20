@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'violation_records'
])

@section('content')
    <div class="content">
        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-12">
                <h6 class="dir_link_active">{{ __('Violation Records') }}</h6>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow">
                    <div class="card-body p-0 border-0 notice_card">
                        <div class="notice_div float-left">
                            <p class="card_title">{{'Violation Records'}}</p>
                            <p class="card_sub_title text-muted">The table below shows the lists of recorded violations committed by the college students of St. Dominic College of Asia. <span class="font-weight-bold font-italic">Click on any row to view more details</span> and process corresponding sanction/s.</p>
                        </div>
                        <div class="illustration_div">
                            <img class="illustration_svg" src="{{ asset('paper/illustrations/illustration_violation_records.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card shadow">   
                    <div class="card-body p-0">
                        <div class="violation_records_table">
                            <table class="table table-hover m-0 border-0">
                                <thead class="text-primary thead-svms-blue position-sticky">
                                    <th class="text-left">{{ __('Date/Time') }}</th>
                                    <th class="text-left">{{ __('Student Number') }}</th>
                                    <th class="text-left">{{ __('Student Name') }}</th>
                                    <th class="text-left">{{ __('Sex') }}</th>
                                    <th class="text-left">{{ __('Course/Year/Section') }}</th>
                                    <th class="text-left">{{ __('School') }}</th>
                                    <th class="text-center">{{ __('Offense Count') }}</th>
                                </thead>
                                <tbody>
                                    @if(count($violations) > 0)
                                    @foreach($violations as $row)
                                    <tr class="vr_link" data-href="{{ route('student_records',['student_id'=>$row->student_id]) }}">
                                        <td>{{date('F j, Y h:i A | l', strtotime($row->created_at))}}</td>
                                        <td>{{$row->student_id}}</td>
                                        <td>{{$row->student_last_name}}, {{$row->student_first_name}}</td>
                                        <td>{{$row->student_sex}}</td>
                                        <td>{{$row->student_course}}-{{$row->student_section}}</td>
                                        <td>{{$row->student_school}}</td>
                                        <td class="text-center"><span class="font-weight-bold">{{$row->offense_count}}</span> offense/s found</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            <img class="vr_no_available_data mt-2 mb-3" src="{{ asset('paper/illustrations/violation_records_no_available_data.svg') }}" alt="">
                                            <p class="text-muted font-italic">No Availabale Records Found...</p>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(count($violations) > 0)
                    <div class="card-footer vr_card_footer pt-2">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-12 p-0">
                                <div class="form-group">
                                    <input type="text" name="vr_search_student" id="vr_search_student" class="form-control" placeholder="Search Student by Student ID or Names..." />
                                </div>
                            </div>
                            <div class="col-lg-auto col-md-auto col-sm-auto">
                                <div class="badge vr_total_records_div">Total Records: <span class="">{{$violations->total()}}</span></div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-auto p-0">
                                {{$violations->links()}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function($) {
            $(".vr_link").click(function() {
                window.document.location = $(this).data("href");
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}
@endpush