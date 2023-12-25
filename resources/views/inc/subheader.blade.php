{{-- 
    st_type_1
    @component('inc.subheader',['subheader_title'=>'st_type_1'])
        @slot('sh_icon') chart-area @endslot
        @slot('sh_titile_main') Analytics @endslot
        @slot('sh_titile_sub') Dashboard @endslot
        cat : Tambahan slot
    @endcomponent

    st_type_2
    @component('inc.subheader',['subheader_title'=>'st_type_2'])
    @slot('sh_icon') home @endslot
    @slot('sh_descipt') Your first page for content division @endslot
    @endcomponent

    st_type_3
    @component('inc.subheader',['subheader_title'=>'st_type_3'])
    @slot('sh_descipt') Your first page for content division @endslot
    @endcomponent

    st_type_4
    @component('inc.subheader',['subheader_title'=>'st_type_4'])
    @slot('sh_titile_main') Analytics @endslot
    @slot('sh_titile_sub') Dashboard @endslot
    @slot('sh_descipt') Your first page for content division @endslot
    @endcomponent

    st_type_5
    @component('inc.subheader',['subheader_title'=>'st_type_5'])
    @slot('sh_icon') home @endslot
    @slot('sh_titile_main') Analytics @endslot
    @slot('sh_descipt') Your first page for content division @endslot
    @endcomponent
--}}

<h1 class="subheader-title">
    @switch($subheader_title)
        @case('st_type_1')
            <i class='subheader-icon fal fa-{{$sh_icon}}'></i> {{$sh_titile_main}} <span class='fw-300'>{{$sh_titile_sub}}</span>
            <small>
            </small>
        @break
        @case('st_type_2')
            <i class='subheader-icon fal fa-{{$sh_icon}}'></i> @yield('title','My App')
            <small>
                {{$sh_descipt}}
            </small>
        @break
        @case('st_type_3')
            @yield('title','My App')
            <small>
                {{$sh_descipt}}
            </small>
        @break
        @case('st_type_4')
            {{$sh_titile_main}} <span class='fw-300'>{{$sh_titile_sub}}</span>
            <small>
                {{$sh_descipt}}
            </small>
        @break 
        @case('st_type_5')
            <i class='subheader-icon fal fa-{{$sh_icon}}'></i> {{$sh_titile_main}}
            <small>
                {{$sh_descipt}}
            </small>
        @break                
    @endswitch
</h1>
{{$slot}}