@include('header')

<!--[ Recent Users ] start-->
<div class="container">
    <div class="col-xl-12 col-md-12">
        <div class="card Recent-Users">
            <div class="card-header">
                <h5>Contact us </h5>
            </div>
            <div class="card-block px-0 py-3">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tbody>
                            {{-- <tr>
                                                        <th></th>
                                                        <th>Device</th>
                                                        <th>Registered On</th>
                                                        <th></th>
                                                      </tr> --}}
                            <tr class="unread">
                                <td>
                                    <h6 class="mb-1">Head Office</h6>
                                    {{-- <p class="m-0">Lorem Ipsum is simply…</p> --}}
                                </td>
                                <td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>Reliance
                                        Centre- 2nd Floor, Left Wing, Westlands Woodvale Grove, Nairobi Kenya</h6>
                                </td>
                            </tr>
                            <tr class="unread">
                                <td>
                                    <h6 class="mb-1">Call Us</h6>
                                    {{-- <p class="m-0">Lorem Ipsum is simply text of…</p> --}}
                                </td>
                                <td>
                                    <h6 class="text-muted"><i
                                            class="fas fa-circle text-c-red f-10 m-r-15"></i>+254-722-585375 |
                                        +254-722-537792 | +254-700-106077</h6>
                                </td>
                                {{-- <td><a href="#!" class="label theme-bg2 text-white f-12">Details</a></td> --}}
                            </tr>
                            <tr class="unread">
                                <td>
                                    <h6 class="mb-1">Postal Address</h6>
                                    {{-- <p class="m-0">Lorem Ipsum is simply…</p> --}}
                                </td>
                                <td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>P.O Box
                                        10306 – 00100, Nairobi, Kenya.</h6>
                                </td>
                                {{-- <td><a href="#!" class="label theme-bg2 text-white f-12">Details</a></td> --}}
                            </tr>
                            <tr class="unread">
                                <td>
                                    <h6 class="mb-1">Email Us</h6>
                                    {{-- <p class="m-0">Lorem Ipsum is simply text of…</p> --}}
                                </td>
                                <td>
                                    {{-- <h6 class="text-muted f-w-300"><i
                                            class="fas fa-circle text-c-red f-10 m-r-15"></i>info@techsavanna.technology
                                    </h6> --}}
                                    <h6 class="fas fa-circle text-c-red f-11 ">
                                        <a href="mailto:info@techsavanna.technology" target="blank">
                                            info@techsavanna.technology</a>
                                        {{-- {{$notification->user_email}} --}}
                                    </h6>
                                </td>
                                {{-- <td><a href="#!" class="label theme-bg2 text-white f-12">Details</a></td> --}}
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--[ Recent Users ] end-->
@include('footer')
