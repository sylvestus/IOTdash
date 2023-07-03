@include('header')




<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <h5>Subscription Packages</h5>
                    @if (session('success'))
                        <div class="alert alert-success message">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('failure'))
                        <div class="alert alert-danger message">
                            {{ session('failure') }}
                        </div>
                    @endif
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!--[ daily sales section ] start-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card daily-sales">

                                    <div class="card-block">
                                        <h6 class="mb-4">Premium Monthly Package</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">

                                                @foreach ($subscriptions as $subscription)
                                                    @if (strcasecmp($subscription->sub_name, 'premium monthly') === 0)
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                                                                class="feather  text-c-green f-30 m-r-10"> Ksh.
                                                                {{ $subscription->sub_amount }}</i></h3>
                                                    @endif
                                                @endforeach

                                            </div>

                                            <div class="col-3 text-right">
                                                <p class="m-b-0">67%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar"
                                                style="width: 50%;" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ daily sales section ] end-->
                            <!--[ Monthly  sales section ] starts-->
                            <div class="col-md-6 col-xl-4">
                                <div class="card Monthly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Premium Yearly Package</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                @foreach ($subscriptions as $subscription)
                                                    @if (strcasecmp($subscription->sub_name, 'premium yearly') == 0)
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                                                                class="feather  text-c-green f-30 m-r-10"> Ksh.
                                                                {{ $subscription->sub_amount }}</i></h3>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0">36%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme2" role="progressbar"
                                                style="width: 35%;" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ Monthly  sales section ] end-->
                            <!--[ year  sales section ] starts-->
                            <div class="col-md-12 col-xl-4">
                                <div class="card yearly-sales">
                                    <div class="card-block">
                                        <h6 class="mb-4">Standard Yearly</h6>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-9">
                                                @foreach ($subscriptions as $subscription)
                                                    @if (strcasecmp($subscription->sub_name, 'standard yearly') == 0)
                                                        <h3 class="f-w-300 d-flex align-items-center m-b-0"><i
                                                                class="feather  text-c-green f-30 m-r-10"> Ksh.
                                                                {{ $subscription->sub_amount }}</i></h3>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-3 text-right">
                                                <p class="m-b-0">80%</p>
                                            </div>
                                        </div>
                                        <div class="progress m-t-30" style="height: 7px;">
                                            <div class="progress-bar progress-c-theme" role="progressbar"
                                                style="width: 70%;" aria-valuenow="70" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ year  sales section ] end-->
                            <!--[ Recent Users ] start-->
                            <div class="col-xl-8 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Our System Users</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table table-hover">

                                                <tbody>
                                                    <tr>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Action</th>
                                                    </tr>

                                                    @foreach ($users as $user)
                                                        <tr>

                                                            <td><img class="rounded-circle" style="width:40px;"
                                                                    src="assets/images/user/avatar-1.jpg"
                                                                    alt="activity-user"></td>

                                                            <td>

                                                                @if ($user->name)
                                                                    <h6 class="m-0 ">{{ $user->name }}</h6>
                                                                @else
                                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if ($user->name)
                                                                    <h6 class="m-0 ">{{ $user->email }}</h6>
                                                                @else
                                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($user->phone_no)
                                                                    <h6 class="m-0 ">{{ $user->phone_no }}</h6>
                                                                @else
                                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                                @endif
                                                            </td>
                                                            <td><a href="{{ url('user_management') }}"
                                                                    class="label theme-bg2 text-white f-12"> Details<i
                                                                        class="feather icon-chevrons-right"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>

                                            {{-- paination here --}}
                                            @if ($users->lastPage() > 0)
                                                <div class="pagination">
                                                    @if ($users->currentPage() > 1)
                                                        <a href="{{ $users->previousPageUrl() }}"
                                                            class="prev p-3">Previous</a>
                                                    @endif

                                                    @php
                                                        $visiblePages = 11; // Number of visible page numbers
                                                        $halfTotalPages = floor($visiblePages / 2);
                                                        $startPage = max($users->currentPage() - $halfTotalPages, 1);
                                                        $endPage = min($startPage + $visiblePages - 1, $users->lastPage());
                                                    @endphp

                                                    @for ($i = $startPage; $i <= $endPage; $i++)
                                                        <a href="{{ $users->url($i) }}"
                                                            class="{{ $users->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
                                                    @endfor

                                                    @if ($users->currentPage() < $users->lastPage())
                                                        <a href="{{ $users->nextPageUrl() }}" class="next p-3">Next</a>
                                                    @endif

                                                    <p class="p-3">Page {{ $users->currentPage() }} of
                                                        {{ $users->lastPage() }} -
                                                        {{ $users->total() }} records</p>
                                                </div>
                                            @endif
                                            {{-- pagination ends here --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--[ Recent Users ] end-->

                            <!-- [ statistics year chart ] start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-event">
                                    <div class="card-block">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col">
                                                <h5 class="m-0">General Device statistics</h5>
                                                {{-- devices --}}
                                            </div>
                                            <div class="col-auto">
                                                <label
                                                    class="label theme-bg2 text-white f-14 f-w-400 float-right">34%</label>
                                            </div>
                                        </div>
                                        <h2 class="mt-3 f-w-300">{{ $devices->count() }}<sub
                                                class="text-muted f-14">Tanks</sub></h2>
                                        <h6 class="text-muted mt-4 mb-0">You can register for this amazing service
                                        </h6>
                                        <i class="fab fa-angellist text-c-purple f-50"></i>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-block border-bottom">
                                        <div class="row d-flex align-items-center">
                                            <div class="col-auto">
                                                <i class="feather icon-zap f-30 text-c-green"></i>
                                            </div>
                                            @if ($devices)
                                                @php
                                                    $onlineCount = 0;
                                                    foreach ($devices as $device) {
                                                        if ($device->status === 'Online') {
                                                            $onlineCount++;
                                                        }
                                                    }
                                                @endphp
                                                <div class="col">
                                                    <h3 class="f-w-300">{{ $onlineCount }}</h3>
                                                    <span class="d-block text-uppercase">TOTAL Devices Online</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row d-flex align-items-center">
                                            @if ($devices)
                                                @php
                                                    $offlineCount = 0;
                                                    foreach ($devices as $device) {
                                                        if ($device->status === 'Offline') {
                                                            $offlineCount++;
                                                        }
                                                    }
                                                @endphp
                                                <div class="col-auto">
                                                    <i class="feather icon-map-pin f-30 text-c-blue"></i>
                                                </div>
                                                <div class="col">
                                                    <h3 class="f-w-300">{{ $offlineCount }}</h3>
                                                    <span class="d-block text-uppercase">TOTAL Devices Offline</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-8 col-md-12 m-b-30">

                                <div class="tab-content" id="myTabContent">
                                    <h6>Our Devices</h6>

                                    <div class="tab-pane fade active show" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Device Id</th>
                                                    <th>Model</th>
                                                    <th>Site</th>
                                                    <th>Type</th>
                                                    <th>Location</th>
                                                    <th class="">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($devices as $device)
                                                    <tr>

                                                        <td>

                                                            @if ($device->device_id)
                                                                <h6 class="m-0 ">{{ $device->device_id }}</h6>
                                                            @else
                                                                <h6 class="m-0 text-c-green">NA</h6>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            @if ($device->model)
                                                                <h6 class="m-0 ">{{ $device->model }}</h6>
                                                            @else
                                                                <h6 class="m-0 text-c-green">NA</h6>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            @if ($device->site_name)
                                                                <h6 class="m-0 ">{{ $device->site_name }}</h6>
                                                            @else
                                                                <h6 class="m-0 text-c-green">NA</h6>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            @if ($device->type)
                                                                <h6 class="m-0 ">{{ $device->type }}</h6>
                                                            @else
                                                                <h6 class="m-0 text-c-green">NA</h6>
                                                            @endif
                                                        </td>

                                                        <td>

                                                            @if ($device->location_id)
                                                                <h6 class="m-0 ">{{ $device->location_id }}</h6>
                                                            @else
                                                                <h6 class="m-0 text-c-green">NA</h6>
                                                            @endif
                                                        </td>

                                                        <td><a href="{{ url('devices/' . $device->device_id) }}"
                                                                class="label theme-bg2 text-white f-12"> Details<i
                                                                    class="feather icon-chevrons-right"></i>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>

                                        {{-- paination here --}}
                                        @if ($devices->lastPage() > 0)
                                            <div class="pagination">
                                                @if ($devices->currentPage() > 1)
                                                    <a href="{{ $devices->previousPageUrl() }}"
                                                        class="prev p-3">Previous</a>
                                                @endif

                                                @php
                                                    $visiblePages = 11; // Number of visible page numbers
                                                    $halfTotalPages = floor($visiblePages / 2);
                                                    $startPage = max($devices->currentPage() - $halfTotalPages, 1);
                                                    $endPage = min($startPage + $visiblePages - 1, $devices->lastPage());
                                                @endphp

                                                @for ($i = $startPage; $i <= $endPage; $i++)
                                                    <a href="{{ $devices->url($i) }}"
                                                        class="{{ $devices->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
                                                @endfor

                                                @if ($devices->currentPage() < $devices->lastPage())
                                                    <a href="{{ $devices->nextPageUrl() }}" class="next p-3">Next</a>
                                                @endif

                                                <p class="p-3">Page {{ $devices->currentPage() }} of
                                                    {{ $devices->lastPage() }} -
                                                    {{ $devices->total() }} records</p>
                                            </div>
                                        @endif
                                        {{-- pagination ends here --}}
                                    </div>

                                </div>
                            </div>

                        </div>
                        <!-- [ Main Content ] end -->

                        <script>
                            $(document).ready(function() {
                                // Hide the success or failure message after 5 seconds
                                setTimeout(function() {
                                    $('.message').fadeOut('slow');
                                }, 3000);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->



@include('footer')
