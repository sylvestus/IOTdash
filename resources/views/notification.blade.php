@include('header')

<div class="container">
    <div class="col-sm-12">
        <h5 class="mt-4">Inbox</h5>
        <span class="float-right"><a href="{{ '/notification' }}">Back</a> </span>
        </br>
        <hr>

        @if (isset($notification))
            <button hidden id="updateButton" data-userid="{{ $notification->notification_id }}"></button>

            <div class="row">

                <div class="col-md-3 col-sm-12">
                    <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <li><a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">{{ $notification->user_name }}</a></li>
                    </ul>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <h6>{{ $notification->subject }}</h6>
                            <p class="mb-0">
                                {{ $notification->message }}
                            </p>
                            <span class="float-right">
                                <a href="mailto:{{ $notification->user_email }}" target="blank">mail:
                                    {{ $notification->user_email }}</a>
                                {{-- {{$notification->user_email}} --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">
                            <p class="mb-0">
                                There is no notification with this Id
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            (function() {
                var userId = $("#updateButton").data("userid");
                var url = window.location.href;
                console.log(userId);
                console.log(url);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    type: "PUT",
                    url: url,
                    data: {
                        user_id: userId
                    },
                    success: function(response) {
                        // Handle the success response
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle the error
                        console.log(error);
                    }
                });
            })();
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
