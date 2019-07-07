@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$job->title}}</div>
                <div class="card-body">
                    <p>
                        <h4>Description:</h4>
                        {{$job->description}}
                    </p>
                    <p>
                        <h4>Duties:</h4>
                        {{$job->roles}}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info.</div>
                <div class="card-body">

                    @if(Session::has('message'))
                        <div class="alert alert-success">{{Session::get('message')}}</div>
                    @endif
                    
                    <p>
                        <b>Company</b>:<a href="{{route('company.index', [$job->company->id,     $job->company->slug])}}">{{$job->company->cname}}</a>
                    </p>
                    <p><b>Address</b>:{{$job->address}}</p>
                    <p><b>Employment</b> Type:{{$job->type}}</p>
                    <p><b>Position</b>:{{$job->position}}</p>
                    <p><b>Posted</b>:{{$job->created_at->diffForHumans()}}</p>
                    <p><b>Last Date to Apply</b>:{{date('F d, Y', strtotime($job->last_date))}}</p>
                </div>
            </div>
            <br>
            @if(Auth::check() && Auth::user()->user_type == 'seeker')
            @if(!$job->checkApplication())
                <apply-component :job_id={{$job->id}}></apply-component>                
            @endif
                <br>
                <favourite-component :job_id={{$job->id}} :favourited={{$job->checkSaved() ? 'true':'false'}}></favourite-component>
            @endif
        </div>
    </div>
</div>
@endsection
