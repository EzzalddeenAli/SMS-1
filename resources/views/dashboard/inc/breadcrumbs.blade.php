<ol class="breadcrumb">
    <li><a href="{{'/'.request()->segment(1) }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">{{ request()->segment(2) }}</li>
    @if(request()->segment(3) !== null)
        <li class="active">{{ request()->segment(3) }}</li>
    @endif
    @if(request()->segment(4) !== null)
        <li class="active">{{ request()->segment(4) }}</li>
    @endif
</ol>