<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <x-head />
</head>

<body>
    {{-- jquery --}}

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <x-sidebar />
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            <x-header />
            <!--  Header End -->
            <div class="container-fluid">
                <x-alert />
                {{ $slot }}
            </div>


            {{-- <x-footer /> --}}
        </div>
    </div>
    <x-back-to-top />
    <x-script />
</body>

</html>
