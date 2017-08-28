<div class="col-md-12">
    <ul class="list-group">
        <li class="list-group-item"><h2><strong>Title:</strong> <a href="{{$ad->id}}">{{$ad->title}}</a></h2></li>
        <li class="list-group-item"><h2><strong>Author:</strong> {{$ad->author_name}}</h2></li>
        <li class="list-group-item"><h2><strong>Description:</strong> {{$ad->description}}</h2></li>
        <li class="list-group-item"><h2><strong>Created at:</strong> {{$ad->created_at}}</h2></li>
        @can('updateAd', $ad)
            <li class="buttons-row col-md-12 list-group-item">
                <form class="delete-btn-wrapper col-md-6" action="{{route('delete',$ad->id)}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-delete btn-block">Delete</button>
                </form>
                <div class="update-btn-wrapper col-md-6">
                    <form action="{{route('show.update',$ad->id)}}" method="get">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary btn-update btn-block">Update</button>
                    </form>
                </div>
            </li>
        @endcan
    </ul>
</div>