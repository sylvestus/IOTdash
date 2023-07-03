@include('header')

<div class="container">
    <div class="col-sm-12">
        <h5 class="mt-4">Sytem Settings</h5>
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
        <hr>
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <li><a class="nav-link text-left" id="v-pills-profile-tab" data-toggle="pill"
                            href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                            aria-selected="false">Profile</a></li>
                    <li><a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill"
                            href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                            aria-selected="false">Messages</a></li>
                    <li><a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill"
                            href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                            aria-selected="false">Settings</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <p class="mb-0">
                        <form action="{{ url('user_management/' . $user_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <h6 class="mb-3 mr-5 ">Profile picture</h6>

                                @if (isset($avatar))
                                    <img class="rounded-circle mr-3 mb-3" style="width:70px;" src="{{ asset($avatar) }}"
                                        alt="Profile Image"> <span class="mr5">{{ basename($avatar) }}</span><br>
                                @endif

                                <input type="file" accept="image/*" class=" mr-3 has-validation"
                                    name="profile_image">(max 2mb)
                                <input type="submit" value="Upload">
                            </div>



                        </form>


                        </p>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab">

                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Inbox Messages</h5>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Sender</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if (isset($notifications))
                                                    @foreach ($notifications as $notification)
                                                        @if ($notification->user_id)
                                                            <tr>
                                                                <th scope="row">{{ $notification->user_name }}</th>
                                                                <td>{{ $notification->user_email }}</td>
                                                                <td>{{ $notification->subject }}</td>
                                                                <td>{{ substr($notification->message, 0, 15) }}...</td>
                                                                <td>{{ $notification->status ? 'Read' : 'Unread' }}
                                                                </td>
                                                                <td><a
                                                                        href="{{ url('/notification/' . $notification->notification_id) }}">open</a>
                                                                </td>
                                                                <td>
                                                                    <form
                                                                        action="{{ url('/notification/' . $notification->notification_id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="label theme-bg2 text-white p-1 m-0 btn f-12 color:red;"
                                                                            onclick="return confirm('Are you sure you want to delete this notification?')">Delete</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <ul>
                                                                <li class="n-title">
                                                                    <p class="m-b-0">There are no new message</p>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <ul>
                                                        <li class="n-title">
                                                            <p class="m-b-0">There are no new message</p>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab">
                        <h6 class="mb-3 text-center">Notification Settings</h6>
                        <p class="mb-0">

                            @if (isset($notificationConfigs)&&$notificationConfigs->user_id==$user_id)
                                <p>Update</p>
                                <form action="{{ url('/notification-config/' . $user_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Notify By (th date to expiry)</label>
                                        <input type="number" class="form-control has-validation" name="notify_by"
                                            placeholder="Notify by _ days before device payment" value="{{$notificationConfigs->notify_by}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">At Liquid Level (Meters)</label>
                                        <input type="number" class="form-control has-validation" name="at_level"
                                            placeholder="Liquid Level Meters" value="{{$notificationConfigs->at_level}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">How Frequesnt (times per day)</label>
                                        <input type="number" class="form-control has-validation" name="how_frequent"
                                            placeholder="How many Times A Day" value="{{$notificationConfigs->how_frequent}}">
                                    </div>
                                    <button type="submit" class="bg-light pb-0 m-0"
                                        style="border: none !important; color:rgb(113, 201, 113); ">
                                        save changes
                                    </button>
                                </form>
                            @else
                                <form action="{{ url('/notification-config') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Notify By</label>
                                        <input type="number" class="form-control has-validation" name="notify_by"
                                            placeholder="Notify by _ days before device payment">
                                    </div>
                                    <div class="form-group">
                                        <label for="">At Liquid Level</label>
                                        <input type="number" class="form-control has-validation" name="at_level"
                                            placeholder="Liquid Level Meters">
                                    </div>
                                    <div class="form-group">
                                        <label for="">How Frequesnt</label>
                                        <input type="number" class="form-control has-validation" name="how_frequent"
                                            placeholder="How many Times A Day">
                                    </div>
                                    <button type="submit" class="bg-light pb-0 m-0"
                                        style="border: none !important; color:rgb(113, 201, 113); ">
                                        save changes
                                    </button>
                                </form>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ tabs ] end -->
    <script>
        $(document).ready(function() {
            // Hide the success or failure message after 5 seconds
            setTimeout(function() {
                $('.message').fadeOut('slow');
            }, 3000);
        });
    </script>
</div>

@include('footer')
