<!-- Store Single Info Details Table Area Start Here -->
<div class="heading-layout1">
    <div class="item-title">
        <h3>Notification</h3>
    </div>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button"
           data-toggle="dropdown" aria-expanded="false">...</a>

        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{route('notifications.edit', ['id' => $notification->id])}}"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
            <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
        </div>
    </div>
</div>
<div class="single-info-details">
    <div class="item-img">
        {{--<img src="{{asset('img/figure/teacher.jpg')}}" alt="teacher">--}}
    </div>
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $notification->type }}</h3>
        </div>
        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                <tr>
                    <td>ID No:</td>
                    <td class="font-medium text-dark-medium">{{ $notification->id }}</td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td class="font-medium text-dark-medium">{{ $notification->type }}</td>
                </tr>
                <tr>
                    <td>Message:</td>
                    <td class="font-medium text-dark-medium">{{ $notification->message }}</td>
                </tr>
                <tr>
                    <td>Variables:</td>
                    <td class="font-medium text-dark-medium">{{ $notification->variables }}</td>
                </tr>
                <tr>
                    <td>Severity:</td>
                    <td class="font-medium text-dark-medium">{{ $notification->severity }}</td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td class="font-medium text-dark-medium">{{(!empty($notification->active)) ? 'Active' : 'Inactive' }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Store Single Info Details Table Area End Here -->

