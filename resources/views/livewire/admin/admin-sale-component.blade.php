<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Sale Setting
                            </div>
                            {{-- <div class="col-md-6">
                                <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All Category</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="panel-heading">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                   <select name="" class="form-control" wire:model="status" id="">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                   </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Sale Date</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="sale_date" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
            $('#sale-date').datetimepicker({
                format:'Y_MM-DD h:m:s',
                useCurrent: false,
    showTodayButton: true,
    showClear: true,
    toolbarPlacement: 'bottom',
    sideBySide: true,
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: "fa fa-chevron-left",
        next: "fa fa-chevron-right",
        today: "fa fa-clock-o",
        clear: "fa fa-trash-o"
    }
            })
            .on('dp.change',function(ev){
                var data=$('#sale-date').val();
                @this.set('sale_date',data);
            });
        });
    
    </script>
@endpush