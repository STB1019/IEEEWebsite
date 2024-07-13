{{--
 * Renders a form for deleting a project, event, news, or user.
 *
 * The form is displayed in a container with a centered title and a delete button for each item in the `$objs` array.
 * The form action is determined based on the `$type` variable, which can be 'project', 'event', 'news', or 'user'.
 * The form includes a CSRF token and a hidden method field to indicate a DELETE request.
 *
 * @param string $title The title to display for the delete action.
 * @param array $objs An array of objects to be deleted (e.g. projects, events, news, or users).
 * @param string $type The type of object being deleted ('project', 'event', 'news', or 'user').
 *
--}}

<!-- Form Start -->
<div class="container-fluid">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
            <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Delete <?php echo $title?></div>
            <h1 class="mb-4">Delete {{$title}}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="wow fadeIn" data-wow-delay="0.3s">

                    <input type="text" name="search" id="search" class="form-control" placeholder="Search" />

                    @if (count($objs) == 0)
                        <p>Nothing to delete.</p>
                    @else
                        @foreach ($objs as $obj)
                            @if($type == 'project')
                                <form method="post" name="{{($obj->id)}}" action="{{route('project.destroy', ['project' => $obj->id])}}">
                            @elseif($type == 'event')
                                <form method="post" name="{{($obj->id)}}" action="{{route('event.destroy', ['event' => $obj->id])}}">
                            @elseif($type == 'news')
                                <form method="post" name="{{($obj->id)}}" action="{{route('news.destroy', ['news' => $obj->id])}}">
                            @else
                                <form method="post" name="{{($obj->id)}}" action="{{route('user.destroy', ['user' => $obj->id])}}">
                            @endif
                            {{ method_field('DELETE') }}
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
                                        <button class="btn btn-danger w-100 d-none d-md-block" type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this {{$type}}? (It will be permanently removed from the database)');">
                                            <i class="fas fa-trash me-2"></i> Delete
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
                    @endif

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