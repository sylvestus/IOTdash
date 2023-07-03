@include('header')

<div class="container">
    <!--[ Recent Users ] start-->
    <div class="col-xl-12 col-md-12">
        <div class="card Recent-Users">
            <div class="card-header">
                <h5>My Subscriptions</h5>
                <br><br><br>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('subscriptions') }}" class="text-dark">
                            <i class="feather icon-chevrons-left text-c-blue m-r-5"></i>Back
                        </a>
                    </div>

                    <div class="col-6">
                        <a href="" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false"
                            aria-controls="multiCollapseExample1 multiCollapseExample2" class="text-dark"><i
                                class="feather icon-chevrons-down text-c-blue"></i> Confirm Payment Reciepts</a>
                    </div>

                </div>
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse mt-2" id="multiCollapseExample1">
                            <table class="table table-hover" id="confirmPayTable">
                                <tbody>
                                    <h5 class="pt-4 pb-4">Confirm Payment</h5>


                                    <tr>
                                        <th hidden>subscription package id</th>
                                        <th hidden>Reciept No</th>
                                        <th>Package Name</th>
                                        <th>Billing Circle</th>
                                        <th>Device Type</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Devices</th>
                                        <th>Total</th>
                                        <th>Confirm</th>

                                    </tr>

                                    @if (isset($receiptedSubscriptions))
                                        @foreach ($receiptedSubscriptions as $mysubscription)
                                            @if ($mysubscription->status == 'Active' && $mysubscription->isPayed == 'No')
                                                <tr>
                                                    <td class="subscription_package_id" hidden>
                                                        @if ($mysubscription->subscription_package_id)
                                                            <h6 class="m-0 ">
                                                                {{ $mysubscription->subscription_package_id }}
                                                            </h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td class="reciept_id" hidden>
                                                        @if ($mysubscription->receipt_id)
                                                            <h6 class="m-0 ">{{ $mysubscription->receipt_id }}
                                                            </h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($mysubscription->sub_name)
                                                            <h6 class="m-0 ">{{ $mysubscription->sub_name }}</h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td class="sub_duration">
                                                        @if ($mysubscription->sub_duration)
                                                            <h6 class="m-0 ">{{ $mysubscription->sub_duration }}</h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($mysubscription->sub_device_type)
                                                            <h6 class="m-0 ">{{ $mysubscription->sub_device_type }}
                                                            </h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($mysubscription->status)
                                                            <h6 class="m-0 ">{{ $mysubscription->status }}</h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>


                                                    <td>
                                                        @if ($mysubscription->sub_amount)
                                                            <h6 class="m-0 ">{{ $mysubscription->sub_amount }}</h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td class="text-center no_of_devices">
                                                        @if ($mysubscription->sub_amount)
                                                            <h6 class="m-0 ">
                                                                {{ (int) $mysubscription->no_of_devices }}</h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td class="">
                                                        @if ($mysubscription->sub_amount)
                                                            <h6 class="m-0 ">
                                                                {{ (int) $mysubscription->no_of_devices * (int) $mysubscription->sub_amount }}
                                                            </h6>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>

                                                    <td class="text-center">
                                                        @if ($mysubscription)
                                                            <div class="form-group form-check mt-4">
                                                                <input type="checkbox"
                                                                    class="form-check-input confirm_pay"
                                                                    id="pay_checkbox_{{ $loop->index }}"
                                                                    onclick="getConfirmPAyValues()">
                                                            </div>
                                                        @else
                                                            <h6 class="m-0 text-c-green">NA</h6>
                                                        @endif
                                                    </td>
                                            @endif

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><a href=""><i onclick="confirmPay()">Confirm</i></a></td>
                                        </tr>

                                    @endif
                                </tbody>

                            </table>

                        </div>
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
                    <table class="table table-hover" id="subTable">

                        <tbody>
                            <h5 class="pt-2 pb-4">My Active Subscriptions</h5>
                            <tr>
                                <th hidden>subscription package id</th>
                                <th>Package</th>
                                <th>Billing Circle</th>
                                <th>Device Type</th>
                                <th hidden>Status</th>
                                <th>Amount</th>
                                <th>Devices</th>
                                <th hidden>sub total</th>
                                <th>Pay</th>
                                <th>Action</th>
                            </tr>
                            @if (isset($mysubscriptions))
                            {{-- @php
                            dd($mysubscriptions)
                            @endphp --}}
                                @foreach ($mysubscriptions as $mysubscription)
                                    @if ($mysubscription->status == 'Active')
                                        <tr>
                                            <td hidden class="subscription_package_id">
                                                @if ($mysubscription->subscription_package_id)
                                                    <h6 class="m-0 ">{{ $mysubscription->subscription_package_id }}
                                                    </h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($mysubscription->sub_name)
                                                    <h6 class="m-0 ">{{ $mysubscription->sub_name }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td class="sub_duration">
                                                @if ($mysubscription->next_payment)
                                                    <h6 class="m-0 ">{{ date('d F Y', strtotime($mysubscription->next_payment)) }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">{{ $mysubscription->sub_duration }}</h6>
                                                @endif
                                            </td>

                                            <td class="sub_device_type">
                                                @if ($mysubscription->sub_device_type)
                                                    <h6 class="m-0 ">{{ $mysubscription->sub_device_type }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td hidden>
                                                @if ($mysubscription->status)
                                                    <h6 class="m-0 ">{{ $mysubscription->status }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($mysubscription->sub_amount)
                                                    <h6 class="m-0 ">{{ $mysubscription->sub_amount }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>
                                            <td class="no_of_devices">
                                                @if ($mysubscription->sub_amount)
                                                    <h6 class="m-0 ">{{ (int) $mysubscription->no_of_devices }}</h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td hidden class="sub_total_amount">
                                                @if ($mysubscription->no_of_devices)
                                                    <h6 class="m-0 ">
                                                        {{ (int) $mysubscription->no_of_devices * (int) $mysubscription->sub_amount }}
                                                    </h6>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td>
                                                @if ($mysubscription->isPayed == 'No')
                                                    <div class="form-group form-check mt-4">
                                                        <input type="checkbox" class="form-check-input pay"
                                                            id="pay_checkbox_{{ $loop->index }}"
                                                            onclick="getCheckedRows()">
                                                        <label class="form-check-label" for="exampleCheck1">pay</label>
                                                    </div>
                                                @else
                                                    <h6 class="m-0 text-c-green">NA</h6>
                                                @endif
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ url('mysubscriptions/' . $mysubscription->subscription_package_id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <input hidden type="text" class="form-control has-validation"
                                                            name="sub_status" placeholder="Subscription Name"
                                                            value="Inactive">
                                                        <div class="invalid-feedback">
                                                            Please input Subscription Name
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="bg-light p-0 m-0"
                                                        style="border: none !important; color:red;"><i
                                                            class="feather icon-rotate-ccw">Unsubscribe</i></button>
                                                </form>
                                            </td>
                                    @endif

                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="form-group form-check mt-3">
                                            <input type="checkbox" class="form-check-input " id="checkAll" ">
                                            <label class="form-check-label " for="exampleCheck1">Pay All</label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" style="border: none !important; color:red; background-color:transparent" class=""><a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#recieptModal"
                            data-bs-whatever="@fat">
                            <i class="feather icon-plus-circle text-c-blue m-r-5"></i>Get bill
                        </a></button>

                        </td>
                        </tr>
                        </tbody>
                        <tbody>
                    </table>
                    <table class="table table-hover">

                        <h5 class="pt-4 pb-4">Subscriptions History</h5>

                        <tr>
                            <th hidden>subscription package id</th>
                            <th>Package Name</th>
                            <th>Billing Circle</th>
                            <th>Device Type</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Devices</th>
                            <th>Action</th>
                        </tr>
                                                @foreach ($mysubscriptions as
                                                $mysubscription)
                                            @if ($mysubscription->status == 'Inactive')
                                <tr>
                                    <td hidden>
                                        @if ($mysubscription->subscription_package_id)
                                            <h6 class="m-0 ">{{ $mysubscription->subscription_package_id }}
                                            </h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mysubscription->sub_name)
                                            <h6 class="m-0 ">{{ $mysubscription->sub_name }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mysubscription->sub_duration)
                                            <h6 class="m-0 ">{{ $mysubscription->sub_duration }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mysubscription->sub_device_type)
                                            <h6 class="m-0 ">{{ $mysubscription->sub_device_type }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($mysubscription->status)
                                            <h6 class="m-0 ">{{ $mysubscription->status }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>


                                    <td>
                                        @if ($mysubscription->sub_amount)
                                            <h6 class="m-0 ">{{ $mysubscription->sub_amount }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td class="no_of_devices">
                                        @if ($mysubscription->sub_amount)
                                            <h6 class="m-0 ">{{ (int) $mysubscription->no_of_devices }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>

                                    <td class="pb-4">
                                        <form
                                            action="{{ url('mysubscriptions/' . $mysubscription->subscription_package_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <input hidden type="text" class="form-control has-validation"
                                                    name="sub_status" placeholder="Subscription Name" value="Active">
                                                <div class="invalid-feedback">
                                                    Please input Subscription Name
                                                </div>
                                            </div>
                                            <button type="submit" class="bg-light pb-0 m-0"
                                                style="border: none !important; color:blue; "><i
                                                    class="feather icon-rotate-cw">Re-subscribe</i></button>
                                        </form>
                                    </td>

                                    <td class="pb-2">
                                        <form
                                            action="{{ url('mysubscriptions/' . $mysubscription->subscription_package_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-light p-0 m-0"
                                                style="border: none !important; color:red;"
                                                onclick="return confirm('Are you sure you want to delete this item ?')"><i
                                                    class="feather icon-trash-2">Delete</i></button>
                                        </form>
                                    </td>
                            @endif

                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>

                    @if ($mysubscriptions->lastPage() > 0)
                        <div class="pagination">
                            @if ($mysubscriptions->currentPage() > 1)
                                <a href="{{ $mysubscriptions->previousPageUrl() }}" class="prev p-3">Previous</a>
                            @endif

                            @php
                                $visiblePages = 11; // Number of visible page numbers
                                $halfTotalPages = floor($visiblePages / 2);
                                $startPage = max($mysubscriptions->currentPage() - $halfTotalPages, 1);
                                $endPage = min($startPage + $visiblePages - 1, $mysubscriptions->lastPage());
                            @endphp

                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <a href="{{ $mysubscriptions->url($i) }}"
                                    class="{{ $mysubscriptions->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
                            @endfor

                            @if ($mysubscriptions->currentPage() < $mysubscriptions->lastPage())
                                <a href="{{ $mysubscriptions->nextPageUrl() }}" class="next p-3">Next</a>
                            @endif

                            <p class="p-3">Page {{ $mysubscriptions->currentPage() }} of
                                {{ $mysubscriptions->lastPage() }} - {{ $mysubscriptions->total() }} records</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <!--[ Recent Users ] end-->

    {{-- reciept modal starts here --}}
    <div class="modal fade" id="recieptModal" tabindex="-1" aria-labelledby="recieptModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="row">
                    <div class="col-m-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                {{-- <h5>Basic Componant</h5> --}}
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">Payment Reciept</h5>
                                <hr>
                                <div class="row justify-content-center" id="resultContainer">
                                    <div class="col-md-12">


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
                                                <input type="text" class="form-control has-validation"
                                                    name="sub_duration" placeholder="Subscription Duration" required>
                                                <div class="invalid-feedback">
                                                    Please input your Subscription Duration
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
                                                            <option class=""> {{ $device->type }}</option>
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
                                                <label>Duration</label>
                                                <input type="text" class="form-control has-validation"
                                                    name="sub_duration" placeholder="Subscription Duration" required>
                                                <div class="invalid-feedback">
                                                    Please input your Subscription Duration
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
                                                            <option class=""> {{ $device->type }}</option>
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
            modal.find('input[name="sub_duration"]').val(tdValues[1]);
            modal.find('select[name="sub_device_type"]').val(tdValues[2]);
            modal.find('input[name="sub_amount"]').val(tdValues[3]);



        });

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


        function getCheckedRows() {
            var checkedRows = [];
            var total = 0;

            $("table#subTable tbody tr").each(function() {
                var checkbox = $(this).find(".pay");
                if (checkbox.is(":checked")) {
                    var rowData = {
                        sub_device_type: $(this).find(".sub_device_type").text().trim(),
                        no_of_devices: parseInt($(this).find(".no_of_devices").text()),
                        sub_total_amount: parseFloat($(this).find(".sub_total_amount").text())
                    };
                    checkedRows.push(rowData);
                    total += rowData.sub_total_amount;
                }
            });
            // console.log(checkedRows);
            // console.log("Total:", total);

            // Update the content of the result container
            var resultContainer = $("#resultContainer");
            resultContainer.empty();

            // Display the checked rows
            resultContainer.append("<h3>Devices Purchase Reciept:</h3>");
            for (var i = 0; i < checkedRows.length; i++) {
                var row = checkedRows[i];
                resultContainer.append("<p>Subscribed Device Type: " + row.sub_device_type + "</p>");
                resultContainer.append("<p>No of Devices: " + row.no_of_devices + "</p>");
                resultContainer.append("<p>Total Subscriptions Amount: " + row.sub_total_amount + "</p>");
                resultContainer.append("<hr>");
            }

            // Display the total
            resultContainer.append("<h3>Total:</h3>");
            resultContainer.append("<p>" + total + "</p>");
            resultContainer.append(
                '<button class="btn btn-primary" type="submit" onclick="saveRowData()">Confirm Pay</button>')


        }

        $("#checkAll").on("change", function() {
            var isChecked = $(this).is(":checked");
            $(".pay").prop("checked", isChecked);
            getCheckedRows()
        });

        function saveRowData() {
            var checkedRows = [];
            var total = 0;

            $("table#subTable tbody tr").each(function() {
                var checkbox = $(this).find(".pay");
                if (checkbox.is(":checked")) {
                    var rowData = {
                        subscription_package_id: parseInt($(this).find(".subscription_package_id").text()),
                        sub_device_type: $(this).find(".sub_device_type").text().trim(),
                        no_of_devices: parseInt($(this).find(".no_of_devices").text()),
                        sub_total_amount: parseFloat($(this).find(".sub_total_amount").text())
                    };
                    checkedRows.push(rowData);
                    total += rowData.sub_total_amount;
                }
            });

            // Perform the action with the saved row data
            // For example, you can send an AJAX request to a server-side endpoint
            $.ajax({
                url: "/save_reciept",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                data: {
                    rows: checkedRows,
                    total: total
                },
                success: function(response) {
                    // Handle the response if needed
                    location.reload(); // Refresh the page

                    alert("payment made saved successfully.");
                },
                error: function(xhr, status, error) {
                    // Handle the error if needed
                    console.error("Error making payment:", error);
                }
            });
        }



        function getConfirmPAyValues() {
            var checkedRows = [];
            $("table#confirmPayTable tbody tr").each(function() {
                var checkbox = $(this).find(".confirm_pay");
                if (checkbox.is(":checked")) {
                    checkedRows.push({
                        subscription_package_id: parseInt($(this).find(".subscription_package_id").text()),
                        sub_duration: $(this).find(".sub_duration").text().trim(),
                        reciept_id_val: parseFloat($(this).find(".reciept_id").text())

                    });
                    // checkedRows.push(rowData);
                    // total += rowData.sub_total_amount;
                }
            });
            // console.log(checkedRows);
            return checkedRows;
        }

        function confirmPay() {
            var rows = getConfirmPAyValues()
            for (var i = 0; i < rows.length; i++) {
                var rowData = rows[i];
                if (rowData.reciept_id_val && rowData.subscription_package_id) {

                    var recieptId = rowData.reciept_id_val;
                    var package_id = rowData.subscription_package_id
                    var package_duration =rowData.sub_duration
                    $.ajax({
                        url: "/confirm-pay/" + recieptId,
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        data: {
                            rows: rowData,
                        },
                        success: function(response) {
                            // Handle the response if needed
                            location.reload(); // Refresh the page

                            console.log(response.message);
                        },
                        error: function(xhr, status, error) {
                            // Handle the error if needed
                            location.reload();
                            console.error("Error making payment:", error);
                        }
                    })
                }
            }
        }
    </script>
</div>

@include('footer')
