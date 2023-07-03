@include('header')

<div class="container">
    <!-- [ Hover-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Inbox Messages</h5>
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

                            @if (isset($notificationrecords))
                                @foreach ($notificationrecords as $notification)
                                    @if ($notification->user_id)
                                        <tr>
                                            <th scope="row">{{ $notification->user_name }}</th>
                                            <td>{{ $notification->user_email }}</td>
                                            <td>{{ $notification->subject }}</td>
                                            <td>{{ substr($notification->message, 0, 15) }}...</td>
                                            <td>{{$notification->status ? "Read" : "Unread";}} </td>
                                            <td><a href="{{ url('/notification/' . $notification->notification_id) }}">open</a>
                                            </td>
                                            <td>
                                                <form action="{{ url('/notification/' . $notification->notification_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="label theme-bg2 text-white p-1 m-0 btn f-12 color:red;"  onclick="return confirm('Are you sure you want to delete this notification?')">Delete</button>
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
    <script>
        $(document).ready(function() {
            // Hide the success or failure message after 5 seconds
            setTimeout(function() {
                $('.message').fadeOut('slow');
            }, 3000);
        });
    </script>
    <!-- [ Hover-table ] end -->
</div>

@include('footer')
