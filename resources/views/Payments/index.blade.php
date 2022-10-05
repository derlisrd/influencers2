@extends('Layout.app')
@section('title', 'Pagamentos')
@section('title2', 'Pagamentos')
@section('main')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Ultimos pagamentos</h6>
                <a href="{{ route('payment_request') }}" class="btn btn-primary">
                    Pedir saque
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripçao</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Monto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de requisiçao</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Data de saque</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($datos as $dato)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $dato->description }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $dato->amount }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $dato->date_request }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $dato->date_paid ?? '' }}</p>
                                    </td>
                                    <td>
                                        @if($dato->status ==1)
                                        <span class="badge badge-sm bg-gradient-success">Pago</span>
                                        @else
                                        <span class="badge badge-sm bg-gradient-warning">Pendente...</span>
                                        @endif
                                    </td>
                                    <td class="align-middle">

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
