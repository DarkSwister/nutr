@extends('layouts/contentLayoutMaster')

@section('title', 'Solar parks')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Saules parki</h4>
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
                                <div>Saules parks</div>
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="2" aria-sort="none"
                                class="">
                                <div>E-pasts</div>
                            </th>
                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="3" aria-sort="none"
                                class="">
                                <div>Saražots</div>
                            </th>

                            <th role="columnheader" scope="col" tabindex="0" aria-colindex="5" aria-sort="none"
                                class="">
                                <div>Statuss</div>
                            </th>
                            <th role="columnheader" scope="col" aria-colindex="6" class="">
                                <div>Darbība</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody role="rowgroup">
                        <!---->
                        <tr role="row" id="__BVID__1108__row_50" data-pk="50" class="">

                            <td aria-colindex="1" role="cell" class="">
                                <div class="media d-flex align-items-center">
                                    <div class="media-aside align-self-center">
                                        <a href="/view-more" target="_self">
                                             <span class="b-avatar-img">
                                                 <img src="{{ asset('/images/portrait/small/avatar-s-1.jpg') }}"
                                                      class="b-avatar badge-light-info rounded-circle"
                                                      alt="avatar" style="height: 30px; margin-right: 10px;">
                                             </span><!---->
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="/url-check"
                                           class="font-weight-bold d-block text-nowrap" target="_self">
                                            SIA Saules parku holding
                                        </a>
                                        <small class="text-muted">Saulītes</small>
                                    </div>
                                </div>
                            </td>

                            <td aria-colindex="2" role="cell" class="">inventors@latvenergo.lv</td>

                            <td aria-colindex="3" role="cell" class="">
                                <div class="text-nowrap">
                                    <span class="align-text-top text-capitalize">220kw</span>
                                </div>
                            </td>

                            <td aria-colindex="5" role="cell" class="">
                                <span class="badge text-capitalize badge-light-success badge-pill">
                                    active
                                </span>
                            </td>

                            <td aria-colindex="6" role="cell" class="">
                                <a href="/url-check">skatīt vairāk</a>
                            </td>
                        </tr>
                        <!----><!---->
                        </tbody>
                        <!---->
                    </table>
                </div>
            </div>
        </div>
    </div>
    @livewire('plants')
@endsection
