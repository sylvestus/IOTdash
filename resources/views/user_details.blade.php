@include('header')

<div class="container">
    <!--[ Recent Users ] start-->
    <div class="col-xl-12 col-md-12">
        <div class="card Recent-Users">
            <div class="card-header">
                <h5>User Profile</h5>
                <br><br><br>
                 <div class="row">
            <div class="col-6">
                        <a href="{{ route('user_management') }}" class="text-dark">
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
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>

                            {{-- @foreach ($users as $user) --}}
                                <tr>

                                    <td><img class="rounded-circle" style="width:40px;"
                                            src="assets/images/user/avatar-2.jpg" alt="activity-user"></td>

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
                                    </td> <td>
                                        @if ($user->added_by)
                                            <h6 class="m-0 ">{{ $user->added }}</h6>
                                        @else
                                            <h6 class="m-0 text-c-green">NA</h6>
                                        @endif
                                    </td>
                                    @if($user_type ==1 ||$user->added_by==$userId)
                                    <td class="text-right">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-user-id="{{ $user->id }}">
                                            <i class="feather icon-edit"></i>edit
                                        </a>
                                    </td>

                                    @endif
                                     @if($user_type ==1 ||$user->added_by==$userId)
                                    <td class="text-left">
                                        <form action="{{ url('user_management/' . $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                          <button type="submit" class="bg-light p-0 m-0"
                                            style="border: none !important; color:red;"  onclick="return confirm('Are you sure you want to delete this item ?')"><i class="feather icon-trash-2">Delete</i></button>
                                        </form>
                                    </td>
                                    @else
                                     <td><a href="{{ url('user_management/') }}"
                                            class="label theme-bg2 text-white f-12"> Details<i class="feather icon-chevrons-right"></i>
                                        </a>
                                    </td>
                                    @endif

                                </tr>
                            {{-- @endforeach --}}
                        </tbody>

                    </table>

                    {{-- paination here --}}
                    {{-- @if ($users->lastPage() > 0)
                        <div class="pagination">
                            @if ($users->currentPage() > 1)
                                <a href="{{ $users->previousPageUrl() }}" class="prev p-3">Previous</a>
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
                    @endif --}}
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
                                <h5 class="text-center">User Update Form</h5>
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
                                                    Please input device id
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

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control has-validation" name="email"
                                                    placeholder="User Email" required>
                                                <div class="invalid-feedback">
                                                    Please input your email
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control has-validation"
                                                    name="phone_no" placeholder="Phone Number" required>
                                                <div class="invalid-feedback">
                                                    Please input your phone number
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control has-validation"
                                                    id="password" name="password" placeholder="Password" required>
                                                <div class="invalid-feedback">
                                                    Please input your password
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Re-enter Password</label>
                                                <input type="password" class="form-control has-validation"
                                                    id="re-password" name="re-password" placeholder="Re-enter Password"
                                                    required>
                                                <div class="invalid-feedback" id="password-match-feedback">
                                                    Ensure your passwords match
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

            modal.find('input[name="name"]').val(tdValues[1]);
            modal.find('input[name="email"]').val(tdValues[2]);
            modal.find('input[name="phone_no"]').val(tdValues[3]);
            modal.find('input[name="password"]').val(tdValues[4]);
            modal.find('input[name="re-password"]').val(tdValues[5]);

        });

        $(document).on('click', '[data-bs-toggle="modal"][data-bs-target="#updateModal"]', function(event) {
            var button = $(event.currentTarget);
            var userId = button.data('user-id');
            var modal = $('#updateModal');
            modal.find('#userId').val(userId);

            // Update the form action
            var form = $('#updateForm');
            var url = '/user_management/' + userId;
            form.attr('action', url);
        });

        // Update Check if passwords match
        document.getElementById('updateForm').addEventListener('input', function() {
            var password = document.getElementById('password');
            var rePassword = document.getElementById('re-password');
            var passwordMatchFeedback = document.getElementById('password-match-feedback');

            if (password.value !== rePassword.value) {
                rePassword.setCustomValidity("Passwords do not match");
                passwordMatchFeedback.style.display = 'block';
            } else {
                rePassword.setCustomValidity('');
                passwordMatchFeedback.style.display = 'none';
            }
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
