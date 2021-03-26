<!-- Licensors Table Area Start Here -->
<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Licensors</h3>
            </div>
            <!-- <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button"
                   data-toggle="dropdown" aria-expanded="false">...</a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                </div>
            </div> -->
        </div>

        <div class="table-responsive">
            <table class="table display data-table table-with-images text-nowrap">
                <thead>
                <tr>
                    <th>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input checkAll">
                            <label class="form-check-label">ID</label>
                        </div>
                    </th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Color</th>
                    <th>Secondary Color</th>
                    <th>Additional Color</th>
                    <th>Splash Screen</th>
                    <th>Active</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($licensors as $licensor)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">{{ $licensor->id }}</label>
                            </div>
                        </td>
                        <td>{{ $licensor->name }}</td>
                        <td><img class="text-center" src="{{ Storage::url('logo') . '/'. $licensor->logo }}" /> </td>
                        <td><span style="color:{{$licensor->color}}">{{ $licensor->color }}</span> </td>
                        <td><span style="color:{{$licensor->secondary_color}}">{{ $licensor->secondary_color }}</span> </td>
                        <td><span style="color:{{$licensor->additional_color}}">{{ $licensor->additional_color }}</span> </td>
                        <td><img class="text-center" src="{{ Storage::url('splash_screen') . '/'.$licensor->splash_screen }}" /></td>
                        {{--<td>{{ $product->store->name}}</td>--}}
                        {{--<td>{{ $product->rank}}</td>--}}
                        <td class="">
                            <span><i class="fas {{(!empty($licensor->active)) ? 'text-dark-pastel-green' : 'text-orange-red' }} fa-circle"></i></span>  &nbsp; <span hidden>{{ $licensor->active }}</span>
                        </td>
                        <td>
                            @component('components.menu.licensors', ['canDo' => $canDo ])
                                @slot('id')
                                    {{$licensor->id}}
                                @endslot
                                Licensors Menu Component
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Licensors Area End Here -->

