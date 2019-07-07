@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">

            @if(empty(Auth::user()->profile->avatar))
                <img src="{{asset('avatar/avatar_1.png')}}" width="100" style="width: 100%; margin-bottom: 20px;">
            @else
                <img src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" style="width: 100%; margin-bottom: 20px; border-radius: 40px;">
            @endif
            <form method="POST" action="{{route('avatar')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update Profile Picture
                    </div>
                    <div class="card-body">
                        <input type="file" name="avatar" class="form-control"><br>
                        <button class="btn btn-success float-right" type="submit">Update</button>

                        @if($errors->has('avatar'))
                            <div class="error" style="color: red;">{{$errors->first('avatar')}}</div>
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
                <form method="POST" action="{{route('profile.create')}}">
                    @csrf
                    <div class="card-header">
                        Update your Profile:
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Address:</label>
                            <input type="text" class="form-control" name="address" value="{{Auth::user()->profile->address}}">

                            @if($errors->has('address'))
                                <div class="error" style="color: red;">{{$errors->first('address')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Phone Number:</label>
                            <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->phone_number}}" value="{{Auth::user()->profile->phone_number}}">

                            @if($errors->has('phone_number'))
                                <div class="error" style="color: red;">{{$errors->first('phone_number')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Experience:</label>
                            <textarea name="experience" class="form-control">
                                {{Auth::user()->profile->experience}}
                            </textarea>

                            @if($errors->has('experience'))
                                <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Bio:</label>
                            <textarea name="bio" class="form-control">
                                {{Auth::user()->profile->bio}}
                            </textarea>

                            @if($errors->has('bio'))
                                <div class="error" style="color: red;">{{$errors->first('bio')}}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit" style="margin-bottom: 10px;">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Your Information
                </div>
                <div class="card-body">
                    <p>Name:&nbsp;{{Auth::user()->name}}</p>
                    <p>Email:&nbsp;{{Auth::user()->email}}</p>
                    <p>Address:&nbsp;{{Auth::user()->profile->address}}</p>
                    <p>Phone:&nbsp;{{Auth::user()->profile->phone_number}}</p>
                    <p>Gender:&nbsp;{{Auth::user()->profile->gender}}</p>
                    <p>Experience:&nbsp;{{Auth::user()->profile->experience}}</p>
                    <p>Bio:&nbsp;{{Auth::user()->profile->bio}}</p>
                    <p>Member On:&nbsp;{{date('F d Y', strtotime(Auth::user()->profile->created_at))}}</p>

                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a></p>
                    @else
                        <p>Please Upload Your Cover Letter!</p>
                    @endif

                    @if(!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{Storage::url(Auth::user()->profile->resume)}}">Resume</a></p>
                    @else
                        <p>Please Upload Your Resume!</p>
                    @endif

                </div>
            </div><br>

            <form method="POST" action="{{route('cover.letter')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update Cover Letter
                    </div>
                    <div class="card-body">
                        <input type="file" name="cover_letter" class="form-control"><br>
                        <button class="btn btn-success float-right" type="submit">Update</button>

                        @if($errors->has('cover_letter'))
                            <div class="error" style="color: red;">{{$errors->first('cover_letter')}}</div>
                        @endif
                    </div>
                </div><br>
            </form>

            <form method="POST" action="{{route('resume')}}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Update Resume
                    </div>
                    <div class="card-body">
                        <input type="file" name="resume" class="form-control"><br>
                        <button class="btn btn-success float-right" type="submit">Update</button>

                        @if($errors->has('resume'))
                            <div class="error" style="color: red;">{{$errors->first('resume')}}</div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
