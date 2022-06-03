<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Add New Coupon
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.coupons')}}" class="btn btn-success pull-right">All Coupons</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCoupon">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Code</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Code" class="form-control input-md" wire:model="code">
                                    @error('code') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Type</label>
                                <div class="col-md-4">
                                    <select name="" wire:model="type" id="" class="form-control">
                                        
                                        <option value="percent">Percent</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Value</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Value" class="form-control input-md" wire:model="value">
                                    @error('value') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Cart Value</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Cart Value" class="form-control input-md" wire:model="cart_value">
                                    @error('cart_value') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Expire Date</label>
                                <div class="col-md-4" wire:ignore>
                                    <input type="text" id="expire-date" class="form-control input-md" wire:model="expire_date">
                                    @error('expire_date') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $('#expire-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(ev){
                var data=$('#expire-date').val();
                @this.set('expire_date',data);
            });
        });
    </script>

@endpush