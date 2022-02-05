@extends('dashboard.user.layouts.includes')
@section('content')
<!-- Page wrapper  -->
<div class="page-wrapper">

    <!-- Container fluid  -->

    <div class="container-fluid">

        <!-- Bread crumb and right sidebar toggle -->

        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor"><a href="{{route('user.dashboard')}}">Dashboard</a></h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Client Area</li>
                </ol>
            </div>
        </div>

        <!-- End Bread crumb and right sidebar toggle -->
        <!-- Start Page Content -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12 col-xlg-9 col-md-7">
                <div class="card">
                    <?php
                        $profit = ($purchasedPlan->plan->price*$purchasedPlan->plan->commission)/100; //ok
                        $totalDays = $purchasedPlan->plan->withdraw * 6; //ok
                        $dailyProfit = ($profit + $purchasedPlan->plan->price) / $totalDays; //ok
                        $availabeAmountForWithdrawal = $dailyProfit * $purchasedPlan->plan->withdraw;
                        $totalAmount = ($purchasedPlan->plan->price + $profit);

                        $date = Carbon\Carbon::parse( $purchasedPlan->updated_at)->addDays($purchasedPlan->plan->withdraw)
                    ?>
                    {{-- {{dd($dailyProfit)}} --}}
{{-- {                 --}}
                    {{-- <input type="text" value="{{$date}}" id="updatedDate"> --}}
                    <div class="card-body">
                        <h3 class="card-title bg-success p-3 text-white" style="text-align: center">Client Area</h3>

                        <div class="table-responsive">
                            <table class="table m-b-0  m-t-30 no-border">
                                <tbody>
                                    {{-- {{dd($purchasedPlan->updated_at->timestamp)}} --}}
                                      <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">{{$purchasedPlan->user->first_name}} {{$purchasedPlan->user->last_name}}</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                {{$purchasedPlan->plan->title}}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Deposit Amount</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                ${{$purchasedPlan == null ? '': $purchasedPlan->plan->price}}</h4>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td style="width:400px;text-align: center" >
                                            <h4 class="card-title  bg-light p-3">Earning or Profit</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                               ${{$profit}} </h4>
                                            <p></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:500px;text-align: center" colspan="2">
                                            <h4 class="card-title bg-light p-3">Count Down <span id="the-final-countdown"></span></h4>
                                           </td>

                                    </tr>
                                        <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Available amount for withdrawal </h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                $0
                                            </h4>
{{--                                            <h4 class="card-title bg-light p-3">--}}
                                            {{--                                                ${{round($availabeAmountForWithdrawal)}}--}}
                                            {{--                                            </h4>  need to fix this balance show after count down finish--}}
                                        </td>
                                    </tr>
                                      <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Total Amount</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                ${{$totalAmount}}</h4>
                                        </td>
                                    </tr>

                                       <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Withdrawal Amount</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                ${{$withdraAmount}}</h4>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title  bg-light p-3">Balance Amount</h4>
                                        </td>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                ${{$totalAmount-$withdraAmount}}
</h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">Referral commission {{$purchasedPlan == null ? '': $purchasedPlan->plan->referral_commission}}% </h4>
                                        <td style="width:400px;text-align: center">
                                            <h4 class="card-title bg-light p-3">
                                                ${{count($plans)*round($refferalAmount)}}

                                            </h4>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body m-b-20 m-t-10">
                        <div class="row">
                            <div class="col-12 align-self-center text-center">
                                <a type="button" href="{{route('user.client.withdrawal')}}"  style="font-size: 16px" class="btn btn-lg btn-light">Withdrawal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
        <!-- End PAge Content -->
    </div>
    <!-- footer -->

                    <?php
                        $setting = App\Models\Setting::where('id','=',1)->first();
                    ?>
            <footer class="footer">
                © 2022 {{$setting->company_name}}
            </footer>

    <!-- End footer -->

</div>
<!-- End Page wrapper  -->
@endsection

@push('clientarea-page-script')
<script>
// Set the date we're counting down to
// var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
   var someDate = new Date();
//    alert(someDate);
        var numberOfDaysToAdd = {{$purchasedPlan->plan->withdraw}};
        // var someDate =  $('#updatedDate').val();
        if(localStorage.getItem('remaining_time'))
        {
            var countDownDate = localStorage.getItem('remaining_time');

        }else{
            var countDownDate = someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
        }


// Update the count down every 1 second
function countDownTimer(){
     var remaining_time = countDownDate-1;
     localStorage.setItem('remaining_time',remaining_time);
  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="the-final-countdown"
  document.getElementById("the-final-countdown").innerHTML = days + "Day: " + hours + "HourS: "
  + minutes + "Mints: " + seconds + "Sec";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("the-final-countdown").innerHTML = "EXPIRED";
  }
};
setInterval("countDownTimer()",1000);
</script>
@endpush
