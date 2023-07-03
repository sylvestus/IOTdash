@include('header')

<div class="container">
    <!--[ Recent Users ] start-->
    <div class="col-xl-12 col-md-12">
        <div class="card Recent-Users">
            <div class="card-header">
                <h5>Our Sites</h5>
                <br><br><br>
                @if($user_type==1)
                <a href="#" class="text-dark " data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@fat"><i class="feather icon-plus-circle text-c-blue m-r-5"></i>Add Site</a>
                    @endif


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
                                <th class="text-center">Action</th>
                            </tr>

                            @foreach ($our_sites as $our_site)
                                <tr>

                                    <td>
                                        @if ($our_site->site_name)
                                            <h6 class="m-0 ">{{ $our_site->site_name }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>
                                    @if($user_type==1)
                                    <td class="text-right">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-user-id="{{ $our_site->id }}">
                                            <i class="feather icon-edit"></i>edit
                                        </a>
                                    </td>
                                    @endif

                                    <td class="text-center"><a href="{{ url('site/' . $our_site->id) }}"
                                            class="label theme-bg2 text-white f-12">Locations On Site<i class="feather icon-chevrons-right"></i>
                                    </td>
                                    @if($user_type==1)
                                    <td class="">
                                        <form action="{{ url('site/' . $our_site->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-light p-0 m-0"
                                            style="border: none !important; color:red;"  onclick="return confirm('Are you sure you want to delete this site?')"><i class="feather icon-trash-2">Delete</i></button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{-- paination here --}}
                    @if ($our_sites->lastPage() > 0)
                        <div class="pagination">
                            @if ($our_sites->currentPage() > 1)
                                <a href="{{ $our_sites->previousPageUrl() }}" class="prev p-3">Previous</a>
                            @endif

                            @php
                                $visiblePages = 11; // Number of visible page numbers
                                $halfTotalPages = floor($visiblePages / 2);
                                $startPage = max($our_sites->currentPage() - $halfTotalPages, 1);
                                $endPage = min($startPage + $visiblePages - 1, $our_sites->lastPage());
                            @endphp

                            @for ($i = $startPage; $i <= $endPage; $i++)
                                <a href="{{ $our_sites->url($i) }}"
                                    class="{{ $our_sites->currentPage() == $i ? 'active' : '' }} p-3">{{ $i }}</a>
                            @endfor

                            @if ($our_sites->currentPage() < $our_sites->lastPage())
                                <a href="{{ $our_sites->nextPageUrl() }}" class="next p-3">Next</a>
                            @endif

                            <p class="p-3">Page {{ $our_sites->currentPage() }} of
                                {{ $our_sites->lastPage() }} -
                                {{ $our_sites->total() }} records</p>
                        </div>
                    @endif
                    {{-- pagination ends here --}}
                </div>
            </div>
        </div>
    </div>
    <!--[ Recent Users ] end-->

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
                                <h5 class="text-center">Site Update Form</h5>
                                <hr>
                                <div class="row justify-content-center">


                                    <div class="col-md-12">

                                        <form id="updateForm" class="" novalidate method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group has-validation">
                                                <label hidden>Unique User Id</label>
                                                <input hidden type="text" class="form-control" name="user_id"
                                                    id="userId" readonly placeholder="Enter user Id" required>
                                                <div class="invalid-feedback">
                                                    Please input site id
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control has-validation" name="name"
                                                    placeholder="User Name" required>
                                                <div class="invalid-feedback">
                                                    Please input User Name
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="row">
                    <div class="col-m-12 col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <h5 class="text-center">Site Registration Form</h5>
                                <hr>
                                <div class="row justify-content-center">


                                    <div class="col-md-12">

                                        <form class="needs-validation" novalidate action="{{ url('/site') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <input type="text" class="form-control has-validation" name="name"
                                                    placeholder="User Name" required>
                                                <div class="invalid-feedback">
                                                    Please input site name
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
            var userId = button.data('user-id');
            var modal = $('#updateModal');
            modal.find('#userId').val(userId);

            var tdValues = $(event.currentTarget).closest('tr').find('td').map(function() {
                return $(this).text().trim();
            }).get();

            console.log(tdValues)

            modal.find('input[name="name"]').val(tdValues[0]);;

        });

        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#updateModal"]', function(event) {
            var button = $(event.currentTarget);
            var userId = button.data('user-id');
            var modal = $('#updateModal');
            modal.find('#userId').val(userId);

            // Update the form action
            var form = $('#updateForm');
            var url = '/site/' + userId;
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
