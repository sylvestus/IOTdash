@include('header')

<div class="container">
    <!--[ Recent Users ] start-->
    <div class="col-xl-12 col-md-12">
        <div class="card Recent-Users">
            <div class="card-header">
                <h5>Our Service Subscription & Billing</h5>
                <br><br><br>
                <div class="row">
                    <div class="col-6">
                        @if ($user_type == 1)
                            <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-whatever="@fat">
                                <i class="feather icon-plus-circle text-c-blue m-r-5"></i>Create Subscription Package
                            </a>
                        @endif
                    </div>
                    <div class="col-6">
                        <a href="{{ route('mysubscriptions') }}" class="text-dark">
                            <i class="feather icon-plus-circle text-c-blue m-r-5"></i>My Subscriptions
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
            </div>
            <div class="card-block px-0 py-3">
                <div class="table-responsive">
                    <table class="table table-hover">

                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Duration</th>
                                <th>Device Subscribed</th>
                                <th>Fee</th>
                                <th>Actions</th>
                            </tr>

                            @foreach ($subscriptions as $sub)
                                <tr>

                                    <td>
                                        @if ($sub->sub_name)
                                            <h6 class="m-0 ">{{ $sub->sub_name }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($sub->sub_duration)
                                            <h6 class="m-0 ">{{ $sub->sub_duration }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($sub->sub_device_type)
                                            <h6 class="m-0 ">{{ $sub->sub_device_type }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($sub->sub_amount)
                                            <h6 class="m-0 ">{{ $sub->sub_amount }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>
                                    @if ($user_type == 1)
                                        <td class="">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal"
                                                data-sub-id="{{ $sub->id }}">
                                                <i class="feather icon-edit"></i>edit
                                            </a>
                                        </td>
                                    @endif

                                    @if ($user_type == 1)
                                        <td>
                                            <form action="{{ url('subscriptions/' . $sub->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-light p-0 m-0"
                                                    style="border: none !important; color:red;"
                                                    onclick="return confirm('Are you sure you want to delete this item ?')"><i
                                                        class="feather icon-trash-2">Delete</i></button>
                                            </form>

                                        </td>
                                    @endif
                                    <td>

                                        <a href="#" data-bs-toggle="modal" data-bs-target="#subModal"
                                            data-subsc-id="{{ $sub->id }}">
                                            <i class="feather icon-check-circle text-c-blue m-r-5"></i>
                                            Subscribe
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    @if ($subscriptions->lastPage() > 0)
                        <div class="pagination">
                            @if ($subscriptions->currentPage() > 1)
                                <a href="{{ $subscriptions->previousPageUrl() }}" class="prev p-3">Previous</a>
                            @endif

                            @php
                                $visiblePages = 11; // Number of visible page numbers
                                $halfTotalPages = floor($visiblePages / 2);
                                $startPage = max($subscriptions->currentPage() - $halfTotalPages, 1);
                                $endPage = min($startPage + $visiblePages - 1, $subscriptions->lastPage());
                            @endphp

                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <a href="{{ $subscriptions->url($i) }}"
                                    class="{{ $subscriptions->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
                            @endfor

                            @if ($subscriptions->currentPage() < $subscriptions->lastPage())
                                <a href="{{ $subscriptions->nextPageUrl() }}" class="next p-3">Next</a>
                            @endif

                            <p class="p-3">Page {{ $subscriptions->currentPage() }} of
                                {{ $subscriptions->lastPage() }} - {{ $subscriptions->total() }} records</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!--[ Recent Users ] end-->


    {{-- subscription confirmation modal starts here --}}
    <div class="modal fade" id="subModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="row">
                    <div class="col-m-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">device subscription confirmation</h5>
                                <hr>
                                <div class="row justify-content-center">


                                    <div class="col-md-12">

                                        {{-- <form action="{{ route('subscriptions.subscribe', ['id' => $sub->id]) }}"
                                            method="POST">
                                            @csrf

                                            <button type="submit"
                                                class="label theme-bg2 text-white  btn f-12">Add to subscriptions</button>
                                        </form> --}}

                                        <form id="subscForm" class="needs-validation" novalidate method="POST">

                                            @csrf

                                            <div class="form-group has-validation">
                                                <label hidden>Unique subscriptions Id</label>
                                                <input hidden type="text" class="form-control" name="subsc_id"
                                                    id="subscId" readonly placeholder="Enter subscription Id"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Please input subscription id
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Number of Devices</label>
                                                <input type="number" class="form-control has-validation" id="password"
                                                    name="subsc_devices" placeholder="Devices Subscribed" required>
                                                <div class="invalid-feedback">
                                                    Please input number of these devices you are subscribing for
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Add to subscriptions</button>
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


    {{-- Update modal starts here --}}
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
                                <h5 class="text-center">Subscription Update Form</h5>
                                <hr>
                                <div class="row justify-content-center">


                                    <div class="col-md-12">

                                        <form id="updateForm" class="" novalidate method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group has-validation">
                                                <label hidden>Unique subscriptions Id</label>
                                                <input hidden type="text" class="form-control" name="sub_id"
                                                    id="subId" readonly placeholder="Enter user Id" required>
                                                <div class="invalid-feedback">
                                                    Please input subscription id
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control has-validation"
                                                    name="sub_name" placeholder="Subscription Name" required>
                                                <div class="invalid-feedback">
                                                    Please input Subscription Name
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Duration</label>
                                                {{-- <input type="text" class="form-control has-validation"
                                                    name="sub_duration" placeholder="Subscription Duration" required> --}}
                                                <select class="form-control" placeholder="Device Subscribed To"
                                                    id="exampleFormControlSelect1" required name="sub_duration"
                                                    has-validation>
                                                    <option></option>
                                                    <option>monthly</option>
                                                    <option>yearly</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input your billing circle
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Device Subscribed</label>
                                                <select class="form-control" placeholder="Device Subscribed To"
                                                    id="exampleFormControlSelect1" required name="sub_device_type">
                                                    @if (isset($devices))
                                                        <option></option>
                                                        @foreach ($devices as $device)
                                                            <option><span class="pr-5">{{ $device->model }}</span>
                                                                {{ $device->type }}</option>
                                                        @endforeach
                                                    @else
                                                        <option>There is no registered device</option>
                                                    @endif
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label>Subscription Fee</label>
                                                <input type="text" class="form-control has-validation"
                                                    name="sub_amount" placeholder="Subscription Fee" required>
                                                <div class="invalid-feedback">
                                                    Please input your Fee
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

    {{-- Add modal starts here --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="row">
                    <div class="col-m-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">New Subscription Package Form</h5>
                                <hr>
                                <div class="row justify-content-center">


                                    <div class="col-md-12">

                                        <form class="needs-validation" novalidate
                                            action="{{ url('/subscriptions') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control has-validation"
                                                    name="sub_name" placeholder="Subscription Name" required>
                                                <div class="invalid-feedback">
                                                    Please input Subscription Name
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Billing Circle</label>
                                                {{-- <input type="text" class="form-control has-validation"
                                                    name="sub_duration" placeholder="Subscription Duration" required> --}}
                                                <select class="form-control" placeholder="Device Subscribed To"
                                                    id="exampleFormControlSelect1" required name="sub_duration"
                                                    has-validation>
                                                    <option></option>
                                                    <option>monthly</option>
                                                    <option>yearly</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please input your billing circle
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Device Subscribed</label>
                                                <select class="form-control" placeholder="Device Subscribed To"
                                                    id="exampleFormControlSelect1" required name="sub_device_type"
                                                    has-validation>
                                                    <option></option>
                                                    @if (isset($devices))
                                                        @foreach ($devices as $device)
                                                            <option class=""><span
                                                                    class="pr-5">{{ $device->model }}</span>
                                                                {{ $device->type }}</option>
                                                        @endforeach
                                                    @else
                                                        <option>There is no registered device</option>
                                                    @endif
                                                </select>
                                                <div class="invalid-feedback">
                                                    Please select your Device Type
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Subscription Fee</label>
                                                <input type="text" class="form-control has-validation"
                                                    id="password" name="sub_amount" placeholder="Subscription Fee"
                                                    required>
                                                <div class="invalid-feedback">
                                                    Please input your Fee
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
            var subId = button.data('sub-id');


            var tdValues = $(event.currentTarget).closest('tr').find('td').map(function() {
                return $(this).text().trim();
            }).get();


            var modal = $('#updateModal');
            modal.find('#subId').val(subId);
            modal.find('input[name="sub_name"]').val(tdValues[0]);
            modal.find('select[name="sub_duration"]').val(tdValues[1]).change();
            modal.find('select[name="sub_device_type"]').val(tdValues[2]).change();
            modal.find('input[name="sub_amount"]').val(tdValues[3]);



        });

        // subscription from
        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#subModal"]', function(event) {
            var button = $(event.currentTarget);
            var subId = button.data('subsc-id');


            var tdValues = $(event.currentTarget).closest('tr').find('td').map(function() {
                return $(this).text().trim();
            }).get();

            var modal = $('#subModal');
            modal.find('#subscId').val(subId);
        });

        // subscription from
        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#subModal"]', function(event) {
            var button = $(event.currentTarget);
            var subscId = button.data('subsc-id');
            console.log(subscId);


            // Update subsc the form action
            var form = $('#subscForm');
            var url = '/subscriptions/' + subscId;
            form.attr('action', url);
        });

        // update form
        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#updateModal"]', function(event) {
            var button = $(event.currentTarget);
            var subId = button.data('sub-id');
            // var modal = $('#updateModal');
            // modal.find('#subId').val(subId);

            // Update the form action
            var form = $('#updateForm');
            var url = '/subscriptions/' + subId;
            form.attr('action', url);
        });


        $(document).ready(function() {
            // Hide the success or failure message after 5 seconds
            setTimeout(function() {
                $('.message').fadeOut('slow');
            }, 3000);
        });
    </script>
</div>

@include('footer')
