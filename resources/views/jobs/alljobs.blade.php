@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <form method="GET" action="{{route('alljobs')}}">
            @csrf
            <div class="form-inline">
                <div class="form-group">
                    <label>Keyword&nbsp;</label>
                    <input type="text" name="title" class="form control">&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Employment Type&nbsp;</label>
                    <select class="form-control" name="type">
                        <option value="">-select-</option>
                        <option value="fulltime">FullTime</option>
                        <option value="parttime">PartTime</option>
                        <option value="casual">Casual</option>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Category&nbsp;</label>
                    <select name="category_id" class="form-control">
                        <option value="">-select-</option>
                        @foreach(App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <label>Address&nbsp;</label>
                    <input type="text" name="address" class="form control">&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">Search</button>
                </div>
            </div>
        </form>


        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td><img src="{{asset('uploads/avatar')}}/{{$job->company->logo}}" width="60"></td>
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

        {{$jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links()}}
        
    </div>

</div>




@endsection

<style type="text/css">
    .fa{
        color: #4183D7;
    }


</style>