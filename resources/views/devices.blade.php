@include('header')
<div class="container">
    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <br>
        <h5>Device details</h5> <br>
        <div class="row">
            <div class="col-6">
                        <a href="{{ route('device_management') }}" class="text-dark">
                            <i class="feather icon-chevrons-left text-c-blue m-r-5"></i>Back
                        </a>
                    </div>
        </div>

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

                {{-- @foreach ($device as $device) --}}
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
                            <h6 class="m-0 ">{{ $device->location }}</h6>
                        @else
                            <h6 class="m-0 text-c-green">NA</h6>
                        @endif
                    </td>
                    @if($user_type==1)
                    <td>
                        <form action="{{ url('devices/' . $device->device_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-light p-0 m-0" style="border: none !important; color:red;"
                                onclick="return confirm('Are you sure you want to delete this device ?')"><i
                                    class="feather icon-trash-2">Delete</i></button>
                        </form>
                    </td>
                    @endif
                    <td>
                        <a href="{{ url('/devices') }}" class="text-black">more options <i
                                class="feather icon-chevrons-right"></i></a>
                        </form>
                    </td>

                </tr>

                {{-- @endforeach --}}

            </tbody>
        </table>

    </div>



    @if ($records->lastPage() > 1)
        <div class="tab-pane fade active show " id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br>
            <h6>Records by this device</h6>
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>Device Id</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Last refresh</th>
                        <th>Tank level</th>
                        <th>Battery level</th>
                        <th>Signal stregth</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($records as $record)
                        <tr>
                            <td>
                                @if ($record->device_id)
                                    <h6 class="m-0 ">{{ $record->device_id }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif

                            <td>
                                @if ($record->name)
                                    <h6 class="m-0 ">{{ $record->name }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td>
                                @if ($record->status)
                                    <h6 class="m-0 ">{{ $record->status }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td>
                                @if ($record->last_refresh)
                                    <h6 class="m-0 ">{{ $record->last_refresh }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td>
                                @if ($record->tank_level)
                                    <h6 class="m-0 ">{{ $record->tank_level }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td>
                                @if ($record->battery_level)
                                    <h6 class="m-0 ">{{ $record->battery_level }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td>
                                @if ($record->signal_stregth)
                                    <h6 class="m-0 ">{{ $record->signal_stregth }}</h6>
                                @else
                                    <h6 class="m-0 text-c-green">NA</h6>
                                @endif
                            </td>

                            <td class="text-right"><a href="#"><i class="feather icon-trash-2"></i>del</a>
                                <a href="#" class="m-r-8"><i class="feather icon-edit"></i>edit</a>
                            </td>


                        </tr>
                    @endforeach

                </tbody>

            </table>
        @else
            <h6>Sorry there are no readings for this device recorded yet</h6>
    @endif



    @if ($records->lastPage() > 1)
        <div class="pagination">
            @if ($records->currentPage() > 1)
                <a href="{{ $records->previousPageUrl() }}" class="prev p-3">Previous</a>
            @endif

            @php
                $visiblePages = 11; // Number of visible page numbers
                $halfTotalPages = floor($visiblePages / 2);
                $startPage = max($records->currentPage() - $halfTotalPages, 1);
                $endPage = min($startPage + $visiblePages - 1, $records->lastPage());
            @endphp

            @for ($i = $startPage; $i <= $endPage; $i++)
                <a href="{{ $records->url($i) }}"
                    class="{{ $records->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
            @endfor

            @if ($records->currentPage() < $records->lastPage())
                <a href="{{ $records->nextPageUrl() }}" class="next p-3">Next</a>
            @endif

            <p class="p-3">Page {{ $records->currentPage() }} of {{ $records->lastPage() }} -
                {{ $records->total() }} records</p>
        </div>
    @endif
</div>




@include('footer')
