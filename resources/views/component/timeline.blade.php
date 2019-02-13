<div class="vertical-timeline-block">
    <div class="vertical-timeline-icon {{ $bg }}">
       <i class="fa {{ $icon }}"></i>
    </div>

    <div class="vertical-timeline-content">
       <h2>{{ $title }}</h2>
       <p>{{ $text }}</p>
       <a href="{{ $route }}" class="btn btn-sm btn-{{ $btn }}" style="{{ $displai }}"> {{ $btn_text }}</a>
       <span class="vertical-date">
            {{ $tgl_1 }} <br/>
            <small>{{ $tgl_2 }}</small>
       </span>
    </div>
</div>
