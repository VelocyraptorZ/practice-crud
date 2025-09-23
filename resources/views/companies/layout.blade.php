<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel 11 CRUD Application</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="col-md-2 sidebar">
                    <button class="sidebar-toggle" id="sidebarToggle" title="Toggle sidebar">
                        &#9783;
                        <span>Menu</span>
                    </button>
                    <a href="{{ url('/products') }}"><i class="bi bi-box"></i> <span>Products</span></a>
                    <a href="{{ url('/companies') }}"><i class="bi bi-building"></i> <span>Companies</span></a>
                </nav>
                <main class="col-md-10 pt-2" style="flex: auto">
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        <script>
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                document.getElementById('sidebar').classList.toggle('collapsed');
            });
        </script>
    </body>
</html>