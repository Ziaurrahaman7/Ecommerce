@include('admin.layouts.header')

<body class="g-sidenav-show  bg-gray-200">
@include('admin.layouts.sidebar')
  @yield('content')
 @include('admin.layouts.footer')