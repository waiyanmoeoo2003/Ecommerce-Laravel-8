<div>
    <div class="container" style="padding:30px 0">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit HomeSlider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All HomeSliders</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-heading">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="updateSlider">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Title</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="title" placeholder="Title" class="form-control input-md">
                                    @error('title') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="subtitle" placeholder="Subtitle" class="form-control input-md" >
                                    @error('subtitle') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="price" placeholder="Price" class="form-control input-md">
                                    @error('price') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="text" wire:model="link" placeholder="Link" class="form-control input-md" >
                                    @error('link') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file form-control"  wire:model="newImage">
                                    @if($newImage)
                                        <img src="{{$newImage->temporaryUrl()}}" width="120" alt="">
                                    @else
                                    <img src="{{asset('assets/images/sliders/'.$image)}}" width="120" alt="">
                                    @endif
                                    @error('newImage') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Status</label>
                                <div class="col-md-4">
                                    <select name="" id="" class="form-control" wire:model="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
