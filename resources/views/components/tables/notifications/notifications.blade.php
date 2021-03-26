<!-- Notifications Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Notifications</h3>
            </div>
            <!-- <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-expanded="false">...</a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{--<a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>--}}
                    {{--<a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>--}}
                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div> -->
        </div>

        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                <tr>
                    <th>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input checkAll">
                            <label class="form-check-label">&nbsp;</label>
                        </div>
                    </th>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">&nbsp;</label>
                            </div>
                        </td>
                        <td>{{ $notification->id }}</td>
                        <td>{{ $notification->type}}</td>
                        <td>{{ $notification->message}}</td>
                        <td>
                            <span><i class="fas {{(!empty($notification->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"></i></span> &nbsp; <span hidden>{{ ($notification->active) }}</span>
                        </td>
                        <td>
                            @component('components.menus.notifications')
                                @slot('id')
                                    {{$notification->id}}
                                @endslot
                                Notifications Menu Component
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Notifications Table Area End Here -->

