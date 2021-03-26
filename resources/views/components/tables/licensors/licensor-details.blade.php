<div class="single-info-details pt-5">
    {{--<div class="item-title">--}}
        {{--&nbsp;--}}
    {{--</div>--}}
    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">Licensor</h3>
        <div class="header-elements">
            <ul>
                <li>
                    <a href="{{ route('licensors.edit', ['id' => $licensor->id]) }}"> <i class="far fa-edit"></i></a>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>
<div class="p-0 col-md-12">
    <p>The grey background is for display purposes</p>
</div>
<div class="single-info-details licensor">
<div class="col-md-2 licensor-up pl-0">
    <img style="background-color: #eee" class="text-center img-responsive" src="{{ Storage::url('logo') . '/'. $licensor->logo }}" />
        <span style="width: 100%; display: inline-block;" >Logo</span>

        <img style="background-color: #eee" class="text-center img-responsive" src="{{ Storage::url('splash_screen') . '/'. $licensor->splash_screen }}" />
        <span style="width: 100%; display: inline-block;" >Splash Screen</span>
    </div>

    <div class="item-content">
        <div class="header-inline item-header">
            <h3 class="text-dark-medium font-medium">{{ $licensor->name }}</h3>
        </div>

        <div class="info-table table-responsive">
            <table class="table text-nowrap">
                <tbody>
                    <tr>
                        <td>ID No:</td>
                        <td class="font-medium text-dark-medium">{{ $licensor->id }}</td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td class="font-medium text-dark-medium">{{ $licensor->name }}</td>
                    </tr>
                    <tr>
                        <td>Color: </td>
                        <td><span style="color:{{$licensor->color}}">{{$licensor->color}}</span></td>
                    </tr>
                    <tr>
                        <td>Secondary Color: </td>
                        <td><span style="color:{{$licensor->secondary_color}}">{{$licensor->secondary_color}}</span></td>
                    </tr>
                    <tr>
                        <td>Additional Color: </td>
                        <td><span style="color:{{$licensor->additional_color}}">{{$licensor->additional_color}}</span></td>
                    </tr>
                    @foreach($licensor->urls as $u )
                        <tr>
                            <td> Link: {{$u->name}} </td>
                            <td class="font-medium text-dark-medium">{{$u->licensor_url }}
                        </tr>
                    @endforeach
                    <tr>
                        <td>Status: </td>
                        <td class="font-medium text-dark-medium">{{(!empty($licensor->active)) ? 'Active' : 'Inactive' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
