@extends('layouts.app')

@section('content')
    <div class="finderfirstBackgrounda">
        <div style="width:100%; display: table; vertical-align: bottom">
            <p style="font-size: 26px; width: 50%; color: black; float: left; font-weight: bold;">{{$programtype}} Program</p>
        </div>
        <div class="row">
            <div class="cols-sm-6 col-md-6 col-lg-6" style="padding-left:10px; padding-top: 10px; padding-bottom: 10px; padding-right: 20px">
                <div class="workoutPanel" style="padding: 30px; height: 440px;">
                    <div style="margin-top: 10px; padding-left: 10px; padding-right: 7px">
                        <div style="display: table; width: 100%">
                            <p style="font-size: 30px; color: black; font-weight: bold; float: left">{{$program->program_name}}</p>
                            <p style="font-size: 22px; margin-top: 10px; color: black; font-weight: bold; float: right">
                                @if ($program->program_isfree == 1)
                                    FREE
                                @else
                                    $ {{$program->program_price}}
                                @endif
                            </p>
                        </div>
                        <div>
                            <img class="img-circle" style="width: 70px;" src="{{asset('images/dashboard/profile2.png')}}" alt="" />
                            <label style="vertical-align: bottom; font-weight: bold; margin-left: 10px; font-size: 20px; margin-top: 5px; padding-top: 5px">by Empire Fitness</label>
                            <button type="button" style="float: right; margin-top: 16px; margin-bottom: 18px; width: 55px; height: 30px" class="purchase-finish">Added</button>
                        </div>
                        <div>
                            <label style="vertical-align: bottom; height: 230px; overflow: auto; margin-left: 10px; margin-right:10px; font-size: 15px; margin-top: 15px; padding-top: 5px">{{$program->program_description}}</label>
                        </div>
                    </div>
                </div>
            </div>



            <div class="cols-sm-6 col-md-6 col-lg-6" style="padding-left:10px; padding-top: 10px; padding-bottom: 10px; padding-right: 20px">
                <div class="workoutPanel" style="padding: 30px; height: 440px;">
                    <div style="margin-top: 10px; padding-left: 10px; padding-right: 7px">
                        <div style="width: 100%; text-align: center">
                            <p style="font-size: 30px; color: black; font-weight: bold; margin-top: 15px">You're all set!</p>
                            <p style="font-size: 20px; color: black; font-weight: bold; margin-top: -10px">Paid:
                                @if ($program->program_isfree == 1)
                                    FREE
                                @else
                                    $ {{$program->program_price}}
                                @endif
                            </p>
                            <img  style="width: 200px;" src="{{asset('images/home/phone.png')}}" alt="" />
                            <p style="font-size: 20px; color: black; font-weight: bold; margin-top: 20px">Accelerated Cuts is added to<br>your account. Login to the Fithabit<br>App to get started!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
