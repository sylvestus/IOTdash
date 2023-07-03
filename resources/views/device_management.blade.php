@include('header')



<div class="pcoded-main-container">


    <div class="col-xl-8 col-md-12 m-b-30">




        <div class="tab-content" id="myTabContent">

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



            <!-- [ statistics year chart ] start -->

            <div class="col-xl-8 col-md-12 m-b-30">
                <h5>Device Management</h5>
                @if($user_type==1)
                <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@fat"><i class="feather icon-plus-circle text-c-blue m-r-5"></i>Add Device</a>
                @endif
                <div class="tab-content" id="myTabContent">
                    <h6>Our Devices</h6>

                    <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                {{-- @php
                                dd($devices)
                                @endphp --}}

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

                                            @if ($device->location)
                                                <h6 class="m-0 ">{{ $device->location}}</h6>
                                            @else
                                                <h6 class="m-0 text-c-green">NA</h6>
                                            @endif
                                        </td>

                                        <td><a href="{{ url('devices/' . $device->device_id) }}"
                                                class="label theme-bg2 text-white f-12">Details</a>
                                        </td>
                                        @if($user_type==1)
                                        <td class="text-right">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal"
                                                data-device-id="{{ $device->device_id }}">
                                                <i class="feather icon-edit"></i>edit
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{-- paination here --}}
                        @if ($devices->lastPage() > 0)
                            <div class="pagination">
                                @if ($devices->currentPage() > 1)
                                    <a href="{{ $devices->previousPageUrl() }}" class="prev p-3">Previous</a>
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
    </div>

</div>
<!-- [ Main Content ] end -->

{{-- modal starts here --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="row">
                <div class="col-m-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h5>Basic Componant</h5> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">Device Registration Form</h5>
                            <hr>
                            <div class="row justify-content-center">




                                <div class="col-md-12">

                                    <form class="needs-validation" novalidate action="{{ url('/devices') }}"
                                        method="POST">
                                        @csrf
                                        <div class="form-group has-validation">
                                            <label>Unique Device Id</label>
                                            <input type="text" class="form-control" name="device_id"
                                                placeholder="Enter Device Id" required>
                                            <div class="invalid-feedback">
                                                Please input device id
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Model</label>
                                            <input type="text" class="form-control has-validation"
                                                name="device_model" placeholder="Device Model" required>
                                            <div class="invalid-feedback">
                                                Please input device model
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Site</label>
                                            <select class="form-control has-validation" id="exampleFormControlSelecttry2"
                                                name="site" required>
                                                <option></option>
                                                @if ($our_sites)
                                                    @foreach ($our_sites as $our_site)
                                                        <option value="{{$our_site->id}}">{{ $our_site->site_name }}</option>
                                                    @endforeach
                                                @else
                                                    <option>There is no site yet please register</option>

                                                @endif
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                            {{-- <input type="text" class="form-control has-validation" name="location" id="location2"
                                                placeholder="Location" required> --}}
                                                 <select class="form-control has-validation" id="location2" name="location"
                                                required>
                                                <option></option>

                                            </select>
                                            <div class="invalid-feedback">
                                                Please input device location
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control has-validation" id="exampleFormControlSelect1"
                                                name="type" required>
                                                <option></option>
                                                <option>PG Monitor</option>
                                                <option>Tank Level</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select type
                                            </div>
                                        </div>  <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control has-validation" id=""
                                                name="status" required>
                                                <option></option>
                                                <option>Online</option>
                                                <option>Offline</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select device status
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- modal ends here --}}



{{-- modal starts here --}}
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="row">
                <div class="col-m-12 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h5>Basic Componant</h5> --}}
                        </div>
                        <div class="card-body">
                            <h5 class="text-center">Device Update Form</h5>
                            <hr>
                            <div class="row justify-content-center">

                                <div class="col-md-12">

                                    <form id="updateForm" class="needs-validation" novalidate method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group has-validation">
                                            <label>Unique Device Id</label>
                                            <input type="text" class="form-control" name="device_id"
                                                id="deviceId" readonly placeholder="Enter Device Id" required>
                                            <div class="invalid-feedback">
                                                Please input device id
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Model</label>
                                            <input type="text" class="form-control has-validation"
                                                name="device_model" placeholder="Device Model" required>
                                            <div class="invalid-feedback">
                                                Please input device model
                                            </div>
                                        </div>
                                        {{-- our_sites --}}
                                        <div class="form-group">
                                            <label>Site</label>
                                            {{-- <input type="text" class="form-control has-validation" name="site"
                                                placeholder="Site The Device Is Installed" required> --}}

                                            <select class="form-control has-validation"
                                                id="exampleFormControlSelecttry1" name="site" required>
                                                <option></option>
                                                @if ($our_sites)
                                                    @foreach ($our_sites as $our_site)
                                                        <option value="{{ $our_site->id }}" @if ($our_site->id != '') selected @endif>
                                                            {{ $our_site->site_name }}</option>
                                                    @endforeach
                                                @else
                                                    <option>There is no site yet please register</option>

                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Please input site
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                            {{-- <input type="text" class="form-control has-validation" name="location" id="location"
                                                placeholder="Location" required> --}}
                                            <select class="form-control has-validation" id="location" name="location"
                                                required>
                                                <option @if ($our_site->id != '') selected @endif></option>
                                                {{-- @if ($our_sites)
                                                    @foreach ($our_sites as $our_site)
                                                        <option value="{{$our_site->id}}">{{ $our_site->site_name }}</option>
                                                    @endforeach
                                                @else
                                                    <option>There is no site yet please register</option>

                                                @endif --}}
                                            </select>
                                            <div class="invalid-feedback">
                                                Please input device location
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Type</label>
                                            <select class="form-control has-validation" id="exampleFormControlSelect1"
                                                name="type" required>
                                                <option></option>
                                                <option>PG Monitor</option>
                                                <option>Tank Level</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select type
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">User Assigned</label>
                                            <select class="form-control has-validation"
                                                id="exampleFormControlSelect12" name="user_assigned" required>
                                                <option></option>

                                                @if (isset($users))
                                                    @foreach ($users as $user)
                                                        <option class="" value="{{ $user->id }}"  @if ($user->id != '') selected @endif>
                                                            {{ $user->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option>There is no registered registered user</option>
                                                @endif
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select type
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- modal ends here --}}


</div>
</div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()


    $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#updateModal"]', function(event) {
        var button = $(event.currentTarget);
        var deviceId = button.data('device-id');
        var tdValues = $(event.currentTarget).closest('tr').find('td').map(function() {
            return $(this).text().trim();
        }).get();

        console.log(tdValues)
        var modal = $('#updateModal');
        modal.find('#deviceId').val(deviceId);
        modal.find('input[name="device_model"]').val(tdValues[1]);
        modal.find('input[name="site"]').val(tdValues[2]);
        modal.find('input[name="location"]').val(tdValues[3]);
        modal.find('select[name="type"]').val(tdValues[4]);

    });
    $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#updateModal"]', function(event) {
        var button = $(event.currentTarget);
        var deviceId = button.data('device-id');
        // var modal = $('#updateModal');
        // modal.find('#deviceId2').val(deviceId);

        // Update the form action
        var form = $('#updateForm');
        var url = '/devices/' + deviceId;
        form.attr('action', url);
    });

    $(document).ready(function() {
        // Hide the success or failure message after 5 seconds
        setTimeout(function() {
            $('.message').fadeOut('slow');
        }, 3000);
    });


    $(document).ready(function() {
        $('#exampleFormControlSelecttry1 ,#exampleFormControlSelecttry2').on('change', function() {
            var selectedValue = $(this).val();
            $.ajax({
                url: '/locations-on-site/' +selectedValue, // Replace with your server-side route URL
                method: 'GET',
                data: {
                    selectedValue: selectedValue
                },
                success: function(response) {
                    // Update the location select element with the received options
                    var optionsHtml = '';
                    $.each(response, function(key, value) {
                    optionsHtml += '<option value="' + value.id + '">' + value.location + '</option>';
                });

                    $('#location').html(optionsHtml);
                    $('#location2').html(optionsHtml);

                },
                error: function(xhr, status, error) {
                    console.log(error); // Handle the error if needed
                }
            });
        }).trigger('change');
    });
</script>


@include('footer')
