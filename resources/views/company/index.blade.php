@extends('layouts.app')

@section('content')
<div class="container>">
    <div class="col-md-12">
        <div class="company-profile">

            @if(empty($company->cover_photo))
                <img src="{{asset('cover_image/office.jpg')}}" style="width: 100%;">
            @else
                <img src="{{asset('uploads/coverphoto')}}/{{$company->cover_photo}}" width="100" style="width: 100%; margin-bottom: 20px; border-radius: 40px;">
            @endif

            <div class="company-desc" style="margin-top: 10px;">

                <img src="{{asset('uploads/avatar')}}/{{$company->logo}}" width="60">

                <p>{{$company->description}}</p>
                <h3>{{$company->cname}}</h3>
                <p><b>Slogan</b>-{{$company->slogan}}&nbsp;<b>Address</b>-{{$company->address}}&nbsp;<b>Phone</b>-{{$company->phone}}&nbsp;<b>Website</b>-{{$company->website}}</p>
            </div>
        </div>

        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
                    <tr>
                        <td><img src="{{asset('avatar/avatar_1.png')}}" width="60"></td>
                        <td>Position: {{$job->position}}
                            <br>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                        </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Address: {{$job->address}}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}</td>
                        <td><a href="{{route('jobs.show', [$job->id, $job->slug])}}"><button class="btn btn-success">Apply</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
