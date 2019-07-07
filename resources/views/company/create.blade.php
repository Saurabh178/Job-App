@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">

            @if(empty(Auth::user()->company->logo))
                <img src="{{asset('avatar/avatar_1.png')}}" width="100" style="width: 100%; margin-bottom: 20px;">
            @else
                <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" style="width: 100%; margin-bottom: 20px; border-radius: 40px;">
            @endif
            <form method="POST" action="{{route('company.logo')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update Company Logo
                    </div>
                    <div class="card-body">
                        <input type="file" name="logo" class="form-control"><br>
                        <button class="btn btn-dark float-right" type="submit">Update</button>

                        @if($errors->has('logo'))
                            <div class="error" style="color: red;">{{$errors->first('logo')}}</div>
                        @endif
                    </div>
                </div>
            </form>

        </div>

        <div class="col-md-5">

            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            <div class="card">
                <form method="POST" action="{{route('company.store')}}">
                    @csrf
                    <div class="card-header">
                        Update your Company Profile:
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->company->address}}">
                        </div>

                        <div class="form-group">
                            <label for="">Phone:</label>
                            <input type="text" class="form-control" name="phone" value="{{Auth::user()->company->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="">Website:</label>
                            <input type="text" class="form-control" name="website" value="{{Auth::user()->company->website}}">
                        </div>

                        <div class="form-group">
                            <label for="">Slogan:</label>
                            <input type="text" class="form-control" name="slogan" value="{{Auth::user()->company->slogan}}">
                        </div>

                        <div class="form-group">
                            <label for="">Description:</label>
                            <textarea class="form-control" name="description">
                                {{Auth::user()->company->description}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-dark float-right" type="submit" style="margin-bottom: 10px;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your Company Information
                </div>
                <div class="card-body">
                    <p>Company Name: {{Auth::user()->company->cname}}</p>
                    <p>Company Address: {{Auth::user()->company->address}}</p>
                    <p>Company Phone: {{Auth::user()->company->phone}}</p>
                    <p>Company Website: <a href="{{Auth::user()->company->website}}">{{Auth::user()->company->website}}</a></p>
                    <p>Company Slogan: {{Auth::user()->company->slogan}}</p>
                    <p>Company Page: <a href="company/{{Auth::user()->company->slug}}">View</a></p>

                </div>
            </div><br>

            <form method="POST" action="{{route('cover.photo')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update Cover Photo
                    </div>
                    <div class="card-body">
                        <input type="file" name="cover_photo" class="form-control"><br>
                        <button class="btn btn-dark float-right" type="submit">Update</button>

                        @if($errors->has('cover_photo'))
                            <div class="error" style="color: red;">{{$errors->first('cover_photo')}}</div>
                        @endif
                    </div>
                </div><br>
            </form>

        </div>
        
    </div>
</div>
@endsection
