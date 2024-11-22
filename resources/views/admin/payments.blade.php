@extends('layout.main')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('main')

    <div class="container">

        <div id="wrapper">

            @include('admin.sidebar_menu')

            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')


                <div class="row">
                    <div class="col-xs-12">

                        <table class="table table-bordered table-striped" id="jDataTable">
                            <thead>
                                <tr>
                                    <th>@lang('app.ad')</th>
                                    <th>@lang('app.user')</th>
                                    <th>@lang('app.amount')</th>
                                    <th>@lang('app.payment_method')</th>
                                    <th>@lang('app.status')</th>
                                    <th>@lang('app.created_at')</th>
                                </tr>
                            </thead>
                            
                            
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{!! $payment->ad ? '<a href="'.route('single_ad', $payment->ad->slug).'" target="_blank">'.$payment->ad->title.'</a>' : '' !!}</td>

                                    <td>{!! '<a href="'.route('user_info', $payment->user->id).'"  target="_blank"> '.$payment->user->name.'</a>' !!}</td>
                                    <td>{!! themeqx_price($payment->amount) !!}</td>
                                    <td>{!! $payment->payment_method !!}</td>
                                    <td>{!! '<a href="'.route('payment_info', $payment->local_transaction_id).'"  target="_blank"> '.$payment->status.'</a>' !!}</td>
                                    <td>{!! $payment->created_at_datetime() !!}</td>
                                </tr>
                            @endforeach
                            
                        </table>


                        {!! $payments->links() !!}

                    </div>
                </div>


            </div>   <!-- /#page-wrapper -->

        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->
@endsection