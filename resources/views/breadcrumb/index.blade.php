<ol class="breadcrumb">
    @foreach($breadcrum as $name=>$url)
    <li @if(count($breadcrum) == ($k+1)) class="active" @endif >
        <a href="{{ $url }}">{{ $name }}</a>
    </li>
    @endforeach
</ol>
