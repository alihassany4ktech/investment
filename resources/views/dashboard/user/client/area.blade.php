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
                        // $profit = ($purchasedPlan->plan->price*$purchasedPlan->plan->commission)/100; //ok
                        // $totalDays = $purchasedPlan->plan->withdraw * 6; //ok
                        // $dailyProfit = ($profit + $purchasedPlan->plan->price) / $totalDays; //ok
                        // $availabeAmountForWithdrawal = $dailyProfit * $purchasedPlan->plan->withdraw;
                    if($purchasedPlan->plan->id == 4){
                        $totalAmount = ($purchasedPlan->price + $profit);
                    }
                    else{
                        $totalAmount = ($purchasedPlan->plan->price + $profit);
                    }



                        $date = $purchasedPlan->countdown;
                    ?>
                    {{-- {{dd($purchasedPlan->limit)}} --}}
{{-- {                 --}}

                    <input type="hidden" value="{{$date}}" id="updatedDate">
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
                                                ${{$purchasedPlan == null ? '': $purchasedPlan->price}}</h4>
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
                                            {{-- <h4 class="card-title bg-light p-3">
                                                $0
                                            </h4> --}}
                                            {{-- $availabeBalanceForWithdrawal --}}


                                               @if($purchasedPlan->limit < 7)
                                                <h4 class="card-title bg-light p-3 balance">
                                                        $0
                                                        </h4>
                                                        @else
                                                              <h4 class="card-title bg-light p-3">
                                                        ${{$balance}}
                                                        </h4>
                                                        @endif


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
    {{-- {{dd($availabeAmountForWithdrawal)}} --}}

                    <?php
                        $setting = App\Models\Setting::where('id','=',1)->first();
                    ?>
            <footer class="footer">
                ?? 2022 {{$setting->company_name}}
            </footer>

    <!-- End footer -->

</div>
<!-- End Page wrapper  -->
{{-- {{dd($availabeAmountForWithdrawal)}} --}}
@endsection

@push('clientarea-page-script')
<script>
    var limit = {{$purchasedPlan->limit}}
    var availabeAmountForWithdrawal = {{$availabeAmountForWithdrawal}}
    var availabeBalanceForWithdrawal= {{$availabeBalanceForWithdrawal}}

 var someDate =  $('#updatedDate').val();
var countDownDate = new Date(someDate).getTime(); // orignal
// var countDownDate = new Date("February 16 2022 8:36:00 pm").getTime();  // duumy



// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("the-final-countdown").innerHTML = days + "Day " + hours + "Hours "
  + minutes + "Mints " + seconds + "Sec ";

  // If the count down is over, write some text
  if (distance < 0) {
clearInterval(x);
        if(limit < 7)
        {
        var planId = {{$purchasedPlan->id}}
        var withdrawal = {{$purchasedPlan->plan->withdraw}}
        var balance = {{$balance}}
             $.ajax({
                url: "{{ route('user.restart.countdown') }}",
                method: "POST",
                dataType: "json",
                data: {
                    _token: "{{ csrf_token() }}",
                    withdrawal: withdrawal,
                    planId: planId,
                    availabeBalanceForWithdrawal:availabeBalanceForWithdrawal,
                    availabeAmountForWithdrawal:availabeAmountForWithdrawal,
                    balance:balance,
                },
                success: function (data) {
                    console.log(data.balance);
                    $('.balance').html('$'+data.balance);

                }
            });
        }else{
                clearInterval(x);
                document.getElementById("the-final-countdown").innerHTML = "EXPIRED";

        }
  }
}, 1000);
</script>

@endpush
