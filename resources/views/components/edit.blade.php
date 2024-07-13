
<!-- Form Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Edit <?php echo $title ?></div>
            <h1 class="mb-4">Update <?php echo $title ?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-3">
                        <p class="pt-4 ">Choose a layout for the <?php echo $type ?> (Click the one you want)</p>

                        <div class="col-4 pb-4" id="button_layout1" onclick="setButtons('button_layout1')" style="cursor: pointer;">
                            <!-- pointer-events prevent the user to select the image -->
                            <img src="{{asset("img/layout1.jpg")}}" width="100%" style="pointer-events: none; user-select: none;">
                        </div>
                        <div class="col-4 unselected pb-4" id="button_layout2" onclick="setButtons('button_layout2')"  style="cursor: pointer;">
                            <img src="{{asset("img/layout2.jpg")}}" width="100%" style="pointer-events: none; user-select: none; cursor: pointer;">
                        </div>
                        <div class="col-4 unselected pb-4" id="button_layout3" onclick="setButtons('button_layout3')"  style="cursor: pointer;">
                            <img src="{{asset("img/layout3.jpg")}}" width="100%" style="pointer-events: none; user-select: none; cursor: pointer;">
                        </div>
                        
                    <div>
                    @if($type == 'project')
                        <form method="post" enctype="multipart/form-data" name="<?php echo $type ?>" action="{{ route('project.update', ['project' => $obj->id]) }}">
                    @elseif($type == 'event')
                        <form method="post" enctype="multipart/form-data" name="<?php echo $type ?>" action="{{ route('event.update', ['event' => $obj->id]) }}">
                    @else
                        <form method="post" enctype="multipart/form-data" name="<?php echo $type ?>" action="{{ route('news.update', ['news' => $obj->id]) }}">
                    @endif
                    @method('PUT')
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="title"
                                        name="title" value="{{ $obj->title }}" placeholder="<?php echo $title ?> Title"
                                        required>
                                    <label for="<?php echo $type ?>_title"><?php echo $title ?> Title</label>
                                </div>
                            </div>

                            @php
                            $align=12
                            @endphp
                            
                            @if($type == 'news')
                                <div class="col-md-{{ $align }}">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="{{ $type }}_author"
                                            name="author" placeholder="{{ $type }} Author" value="{{ $obj->author }}" required>
                                        <label for="{{ $type }}">{{ $title }} Author</label>
                                    </div>
                                </div>
                                <div class="col-md-{{ $align }}">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="{{ $type }}_date"
                                            name="date" placeholder="{{ $type }}' Date" value="{{ $obj->date }}" required>
                                        <label for="{{ $type }}_date">{{ $title }} Date</label>
                                    </div>
                                </div>
                                @php
                                $align-=6
                                @endphp
                            @endif

                            @if($type == 'project')
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="{{$type}}_team"
                                            name="team" placeholder="{{$type}} Team Members Names"  value="{{ $obj->team_members }}" required>
                                        <label for="{{$type}}">{{$title}} Team Members Names</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="{{$type}}_active" name="active" value="on" {{ $obj->active ? 'checked' : '' }}>
                                        <label for="{{$type}}">{{$title}} Active?</label>
                                    </div>
                                </div>
                            @endif
                            
                            @if($type == 'event')
                                @php
                                $align = 6
                                @endphp
                                <div class="col-md-{{ $align }}">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="date"
                                            name="date1" placeholder="Date" value="{{ $obj->date_start }}" required>
                                        <label for="date">Start Date</label>
                                    </div>
                                </div>
                                <div class="col-md-{{ $align }}">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="date1"
                                            name="date2" placeholder="Date" value="{{ $obj->date_end }}" min="{{ $obj->date_start }}" required>
                                        <label for="date">End Date</label>
                                    </div>
                                </div>                      
                                @php
                                $align = 12
                                @endphp
                            @endif

                            <div class="col-md-12">
                                <p class="btn btn-warning w-100 py-3"> <i class="fa fa-exclamation-triangle me-2"></i> Warning: Editing the images will replace the current ones. 
                                To keep the current images, leave the image fields empty.</p>
                            </div>

                            @if($type != 'event')
                                <div class="col-md-{{$align}}">
                                    <div class="form-floating">
                                        <input type="file" id="input-th" class="form-control" 
                                            name="thumbnail" accept="image/*" onchange="verifyFileUpload('input-th','0.75')">
                                        <label for="{{$type}}">Thumbnail</label>
                                        <p><small> Note: the thumbnail needs to have a 3/4 ratio</small></p>
                                    </div>
                                </div>

                                <div class="col-md-{{$align}}">
                                    <div class="form-floating">
                                        <input type="file" id="input-t" class="form-control" 
                                            name="top" accept="image/*" onchange="verifyFileUpload('input-t','0.75')">
                                        <label for="{{$type}}_image">Top image</label>
                                        <p class="d-none" id="input-h"><small> Note: the top image needs to have a 14/2 ratio (ex: 1400 x 200)</small></p>
                                        <p id="input-h2"><small> Note: the top image needs to have a 3/4 ratio</small></p>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-{{$align}}">
                                    <div class="form-floating">
                                        <input type="file" id="input-th" class="form-control" 
                                            name="thumbnail" accept="image/*" onchange="verifyFileUpload('input-th','1.3333333333')">
                                        <label for="{{$type}}_image">Thumbnail</label>
                                        <p><small> Note: the thumbnail needs to have a 4/3 ratio</small></p>
                                    </div>
                                </div>

                                <div class="col-md-{{$align}}">
                                    <div class="form-floating">
                                        <input type="file" id="input-t" class="form-control" 
                                            name="top" accept="image/*" onchange="verifyFileUpload('input-t','1.3333333333')">
                                        <label for="{{$type}}_image">Top image</label>
                                        <p class="d-none" id="input-h"><small> Note: the top image needs to have a 14/2 ratio (ex: 1400 x 200)</small></p>
                                        <p id="input-h2"><small> Note: the top image needs to have a 4/3 ratio</small></p>
                                    </div>
                                </div>
                            @endif  

                            
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" id="input-id" class="form-control"
                                        name="image[]" accept="image/*" onchange="verifyFilesUpload('input-id','1')" multiple>
                                    <label for="{{$type}}_image">Images</label>
                                    <p><small> Note: the images need to have a square ratio</small></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="btn btn-warning w-100 py-3"></p>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="<?php echo $title ?> Description"
                                        id="<?php echo $type ?>_description" name="description"
                                        style="height: 150px" required>{{ $obj->description }}</textarea>
                                    <label for="<?php echo $type ?>_description"><?php echo $title ?> Text</label>
                                </div>
                            </div>

                            <!-- For the layout -->
                            <input type="hidden" class="form-control" id="layout" name="layout" placeholder="0" value="{{ $obj->layout }}">

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" id="mySubmit" type="submit">
                                    <i class="fas fa-plus me-2"></i> Edit <?php echo $title ?>
                                </button>
                            </div>

                            
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@if($type == 'event')
    {{-- Force the second date to be after the first date for the events --}}
    <script>
        const date1 = document.getElementById('date');
        const date2 = document.getElementById('date1');

        date1.addEventListener('change', () => {
            if (date2.value < date1.value) {
                date2.value = date1.value;
            }
            date2.setAttribute("min", date1.value)
        });
    </script> 
@endif

<script>
window.URL = window.URL || window.webkitURL;

var w = 800;
var h = 600;

function verifyFilesUpload(id, ratio_s) {
    
    
    document.getElementById(id).setCustomValidity("");
    var files = document.getElementById(id).files;
    var ratio = parseFloat(ratio_s);

    for (var i = 0; i < files.length; i++) {
        (function(file) {
            var img = new Image();
            img.src = window.URL.createObjectURL(file);

            img.onload = function() {
                var width = this.naturalWidth;
                var height = this.naturalHeight;
                window.URL.revokeObjectURL(this.src);

                //Square Ratio
                if (width/height < (ratio)-0.00005 || width/height > (ratio)+0.00005) {
                    document.getElementById(id).setCustomValidity("The Image " + file.name + " does not meet the ratio requirements.");
                }
            };
        })(files[i]);
    }
}

function verifyFileUpload(id, ratio_s) {

    var ratio = 1;
    
    if(id == "input-t") {
        v = document.getElementById("layout").value;
        if(v == 2){
            //custom ratio
            var ratio = 14/2;
        }
        else{
            //standard 4/3 ratio
            var ratio = parseFloat(ratio_s);
        }
    }
    else{
        var ratio = parseFloat(ratio_s);
    }
    
    document.getElementById(id).setCustomValidity("");
    var fileInput = document.getElementById(id);
    var file = fileInput.files[0];
    

    if (file) {

        var img = new Image();
        img.src = window.URL.createObjectURL(file);

        img.onload = function() {
            var width = this.naturalWidth;
            var height = this.naturalHeight;
            window.URL.revokeObjectURL(this.src);

            

            if (width/height < (ratio)-0.05 || width/height > (ratio)+0.05) {
                document.getElementById(id).setCustomValidity("The Image " + file.name + " does not meet the ratio requirements.");
            }
        };
    }
}

function setButtons(id) {

    if(id==""){
        //only first selected
        document.getElementById("button_layout2").classList.add("unselected");
        document.getElementById("button_layout3").classList.add("unselected");
    }else{
        //select only needed
        document.getElementById("button_layout1").classList.add("unselected");
        document.getElementById("button_layout2").classList.add("unselected");
        document.getElementById("button_layout3").classList.add("unselected");
        document.getElementById(id).classList.remove("unselected");

        document.getElementById('input-h').classList.remove("d-none");
        document.getElementById('input-h2').classList.remove("d-none");
        if(id=="button_layout2"){
            document.getElementById("layout").value = 1;
            document.getElementById('input-h').classList.add("d-none");
            w=800;
            document.getElementById('input-t').value = null;
        }else if(id=="button_layout3"){
            document.getElementById("layout").value = 2;
            document.getElementById('input-h2').classList.add("d-none");
            w=1600;
            document.getElementById('input-t').value = null;
        }else{
            document.getElementById("layout").value = 0;
            document.getElementById('input-h').classList.add("d-none");
            w=800;
            document.getElementById('input-t').value = null;
        }
    }

    return false

}

window.onload = function() {
    setButtons("button_layout{{ ($obj->layout)+1 }}");
};
</script>
<!-- Form End -->