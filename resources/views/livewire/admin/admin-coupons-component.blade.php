<div>
<style>
    nav svg{
        height:20px;
    }
    nav .hidden{
        display:block !important;
    }
</style>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                All Coupons
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right">Add New</a>
                            </div>
                        </div>
                    </div>
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Cart Value</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{$coupon->type}}</td>
                                    @if($coupon->type == 'fixed')
                                        <td>${{$coupon->value}}</td>
                                    @else
                                        <td>{{$coupon->value}}%</td>
                                    @endif
                                    <td>${{$coupon->cart_value}}</td>
                                    <td>{{$coupon->expire_date}}</td>
                                    <td>
                                        <a href="{{route('admin.editcoupons',['coupon_id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="#" wire:click.prevent="deleteCoupon({{$coupon->id}})"><i class="fa fa-times fa-2x text-danger" style="margin-left:10px"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$coupons->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
