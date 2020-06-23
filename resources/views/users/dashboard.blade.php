@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="mr-5 p-2 mb-lg-0 mx-auto">
                <form method="get" class="form-inline">
                    <div class="form-group mb-2">
                        <label for="" class="mb-2">Filter By Date: &nbsp;&nbsp;</label>
                        <input class="datepicker form-control" data-date-format="yyyy-mm-dd" name="filter_date" value="{{ $filterDate }}" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary mb-2 mr-2">Submit</button>
                    <button type="button" id="reset-date" class="btn btn-secondary mb-2 mr-2">Reset</button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 mr-5 p-2 mb-lg-0 mx-auto">
                <a href="#" class="after-loop-item card border-0 card-templates shadow-lg">
                    <div class="card-body d-flex align-items-end flex-column text-right">
                        <h4>Total number of requests served</h4>
                        <p class="w-75"><b style="color: red">{{ $apiHits }}</b></p>
                    </div>
                </a>
            </div>

            @if(!empty($users))
                @foreach($users as $user)
                    <div class="col-lg-4 col-md-4 mr-5 p-2 mb-lg-0 mx-auto">
                        <a href="#" class="after-loop-item card border-0 card-templates shadow-lg">
                            <div class="card-body d-flex align-items-end flex-column text-right">
                                <h4>Total number of requests served by {{$user->name}}</h4>
                                <p class="w-75"><b style="color: red">{{ $user->apiHits($filterDate)->count() }}</b></p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>

    </div>

@endsection

@section('pageJS')
    <script>
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            startDate: '-3d'
        });

        $("#reset-date").click(function(){
            $('.datepicker').val("").datepicker("update");
        })

    </script>

@endsection
