
<!-- Form Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Edit <?php echo $title?></div>
            <h1 class="mb-4">Edit <?php echo $title?></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="wow fadeIn" data-wow-delay="0.3s">

                    <input type="text" name="search" id="search" class="form-control" placeholder="Search" />

                    @foreach ($pages as $obj)

                        @if($type == 'project')
                            <form method="get" name="<?php echo "".($obj->id) ?>" action="{{route('project.edit', ['project' => $obj->id])}}">
                        @elseif($type == 'event')
                            <form method="get" name="<?php echo "".($obj->id) ?>" action="{{route('event.edit', ['event' => $obj->id])}}">
                        @elseif($type == 'news')
                            <form method="get" name="<?php echo "".($obj->id) ?>" action="{{route('news.edit', ['news' => $obj->id])}}">
                        @else
                            <form method="get" name="<?php echo "".($obj->id) ?>" action="{{route('user.edit', ['user' => $obj->id])}}">
                        @endif
                        @csrf
                            <div class="row g-3 pb-2">
                                <div class="col-9">
                                    <div class="form-control">
                                        @if($type == 'user')
                                            <label for="{{$type}}_title">{{$obj->name}}</label>
                                        @else
                                            <label for="{{$type}}_title">{{$obj->title}}</label>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-3">
                                    <button class="btn btn-warning w-100 d-none d-md-block text-white" type="submit" value="Edit" >
                                        <i class="fas fa-edit me-2"></i> Edit
                                    </button>
                                </div>
                            </div>
                            @if($type == 'user')
                                <input type="hidden" name="hid" value="{{($obj->name)}}">
                            @else
                                <input type="hidden" name="hid" value="{{($obj->title)}}">   
                            @endif
                        </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Form End -->
<script>
    $(document).ready(function(){
        // Searching feature
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            $('form').each(function() {
                var form = $(this);
                var hiddenInput = form.find('input[name="hid"]');
                var value1 = hiddenInput.val().toLowerCase();
                if (value1.includes(value)) {
                    form.show();
                } else {
                    form.hide();
                }
            });
        });
    });
</script>