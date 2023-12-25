@switch($bcrumb)
@case('bc_level_satu')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="\">SmartAdmin</a></li>
        <li class="breadcrumb-item active">@yield('title','My App')</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@break
@case('bc_level_dua')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="\">SmartAdmin</a></li>
        <li class="breadcrumb-item">{{$bc_1}}</li>
        <li class="breadcrumb-item active">@yield('title','My App')</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@break
@case('bc_level_tiga')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="\">SmartAdmin</a></li>
        <li class="breadcrumb-item">{{$bc_1}}</li>
        <li class="breadcrumb-item">{{$bc_2}}</li>
        <li class="breadcrumb-item active">@yield('title','My App')</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@break
@endswitch