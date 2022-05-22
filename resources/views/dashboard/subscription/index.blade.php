@extends("layouts.app")

@section("content")

    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- title -->
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h2 class="card-title ">Subscription Info</h2>

                        </div>

                    </div>
                    <!-- title -->

                    {{--                    =========== end limit ================= --}}


                </div>
                <div class="table-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">

                            <th class="border-top-0">End Limit</th>
                            <th class="border-top-0">Remaining</th>
                            <th class="border-top-0">Renewal Info</th>
                            <th class="border-top-0">Owners Name</th>
                            <th class="border-top-0">Owners phone</th>
                            <th class="border-top-0">Owners email</th>


                        </tr>
                        </thead>
                     <tbody>
                     <tr>
                         <td>{{auth()->user()->seller->end_limit}}</td>
                         <td>{{auth()->user()->remainingSubscription()}}</td>
                         <td>Contact Owner For Renewal</td>
                         <td>M Ahmed Mushtaq,Zain Mushtaq,Mahyar,Anas</td>
                         <td>owner@martsnp.com</td>
                         <td>owner@martsnp.com</td>
                     </tr>
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
