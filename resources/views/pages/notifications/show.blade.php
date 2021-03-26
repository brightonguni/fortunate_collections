@extends('layouts.app')
@section('content')

    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notification</h3>
        <ul>
            <li>
                <a href="{{ route('notifications.index')  }}">Home</a>
            </li>
            <li>Notification Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- User Table Area Start Here -->
    <div class="row gutters-20">
        <div class="col-md-12">
        <div class="card ui-tab-card">
            <div class="card-body p-0">
                <div class="border-nav-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-selected="true">Detail</a>
                        </li>
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#store" role="tab" aria-selected="false">Store</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab5" role="tab" aria-selected="false">Purchases</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" data-toggle="tab" href="#tab6" role="tab" aria-selected="false">Activity Log</a>--}}
                        {{--</li>--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('notifications.edit', ['id' => $notification->id]) }}" >Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row gutters-20">
        <div class="col-md-12">
            <div class="card ui-tab-card">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="card-body">

                            @component('components.table.notifications-details',['notification' => $notification ])
                                Notification Details table Component
                            @endcomponent
                        </div>
                    </div>
                    <div class="tab-pane fade" id="store" role="tabpanel">
                        <div class="card-body">

                        </div>
                    </div>
                    {{--<div class="tab-pane fade" id="tab7" role="tabpanel">--}}
                        {{--<div class="card-body p-0 pt-2">--}}
                            {{--@component('components.form.notifications.edit',['notification' => $notification ])--}}
                                {{--Notification edit form Component--}}
                            {{--@endcomponent--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){
            $('button#submitBtn').click(function(event) {
                // event.preventDefault();,
                event.preventDefault();
                var $form = $('#walletTopupForm');
                var $target = $($form.attr('data-target'));
                $.ajax({
                    type: $form.attr('method'),
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function(data, status) {
                        console.log(data.html);
                        if (data.html == "true") {
                            location.reload();
                        } else {
                            $("#wallet-topup-wrapper").html(data.html);
                        }
                    }
                });
            });
            var hash = window.location.hash;
            console.log(hash);
            $('a[href="' + hash + '"]').click();
            // show active
            // $('ul.nav-link a').click(function (e) {
            //     $(this).tab('show');
            //     var scrollmem = $('body').scrollTop();
            //     window.location.hash = this.hash;
            // });
        })

    </script>
@endsection
