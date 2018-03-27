<div class="gestion_progress progress">
    @if(($ingredient->stock/$ingredient->max*100) > 66)
        <div class="progress-bar progress-bar-striped bg-success progress-bar-animated"
    @elseif (($ingredient->stock/$ingredient->max*100) > 33)
        <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated"
    @else
        <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated"
             @endif
             role="progressbar" style="width:{{$ingredient->stock/$ingredient->max*100}}%" aria - valuenow="100"
             aria - valuemin="0" aria - valuemax="1000">
            {{$ingredient->stock/$ingredient->max*100}}%
        </div>
</div>
