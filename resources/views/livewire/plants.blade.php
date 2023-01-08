<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ražotnes</h4>
        </div>
        <div class="card-body">
            <div class="card-text">
                <div class="position-relative table-responsive">
                    <table role="table" aria-busy="false" aria-colcount="6" class="table b-table">
                        <!----><!---->
                        <thead role="rowgroup" class="">
                        <!---->
                        <tr role="row" class="">
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="1" aria-sort="none"
                                class="">
                                <div>Ražotnes ID</div>
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="2" aria-sort="none"
                                class="">
                                <div>Nosaukums</div>
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="3" aria-sort="none"
                                class="">
                                <div>Laika josla</div>
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="3" aria-sort="none"
                                class="">
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="3" aria-sort="none"
                                class="">
                            </th>
                        </tr>
                        </thead>
                        <tbody role="rowgroup">
                        <!---->
                        @foreach($plants as $plant)
                        <tr role="row" id="{{$plant->plantId}}" data-pk="50" class="cell-1" data-bs-toggle="collapse" href="#devices{{$plant->plantId}}">
                            <td aria-colindex="2" role="cell" class="col-md-1">{{$plant->plantId}}</td>

                            <td aria-colindex="1" role="cell" class="col-md-4">
                                <div class="media d-flex align-items-center">
                                    <div class="media-aside align-self-center">
                                        <a href="#">
                                             {{$plant->name}}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td aria-colindex="2" role="cell" class="col-md-4">{{$plant->timezone}}</td>
                        </tr>
                        @if($devices[$plant->plantId])
                        @forelse($devices[$plant->plantId] as $device)
                        <tr id="devices{{$plant->plantId}}" class="collapse cell-1 row-child table-dark">
                            <td>{{$device->deviceId}}</td>
                            <td>{{$device->name}}</td>
                            <td>{{$device->timezone}}</td>
                            <td >{{$device->type}}</td>
                            <td >{{$device->product}}</td>
                        </tr>
                        @empty
                        @endforelse
                        @endif
                        @endforeach
                        <!----><!---->
                        </tbody>
                        <!---->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
