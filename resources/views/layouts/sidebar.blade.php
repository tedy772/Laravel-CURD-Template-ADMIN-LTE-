<style>
    /* Animasi shake hanya pada .nav-icon dan .nav-label */
    .nav-item .nav-icon,
    .nav-item .nav-label {
        transition: transform 0.5s; /* Menambahkan efek transisi untuk memastikan animasi terjadi hanya sekali */
    }

    .nav-item:hover .nav-icon.shake,
    .nav-item:hover .nav-label.shake {
        animation: shake 0.5s;
        animation-iteration-count: 1; /* Menetapkan iterasi animasi hanya satu kali */
    }

    /* Keyframes untuk shake */
    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        25% {
            transform: translateX(-5px);
        }
        50% {
            transform: translateX(5px);
        }
        75% {
            transform: translateX(-5px);
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menggunakan JavaScript untuk menambahkan dan menghapus kelas shake pada hover
        let navItems = document.querySelectorAll('.nav-item');
        
        navItems.forEach(function(item) {
            let icon = item.querySelector('.nav-icon');
            let label = item.querySelector('.nav-label');

            item.addEventListener('mouseover', function() {
                icon.classList.add('shake');
                label.classList.add('shake');
            });

            item.addEventListener('animationend', function() {
                icon.classList.remove('shake');
                label.classList.remove('shake');
            });
        });
    });
</script>

<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-purple elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('img/amikom.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Amikom Students</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-purple">
        @auth
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/Foto.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- dashboard -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p class="nav-label">Dashboard</p>
                    </a>
                </li>

                <!-- jurusan -->
                <li class="nav-item">
                    <a href="{{route('daftarJurusan')}}" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p class="nav-label">Daftar Jurusan</p>
                    </a>
                </li>

                <!-- mata_pelajaran -->
                <li class="nav-item">
                    <a href="{{route('daftarMapel')}}" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p class="nav-label">Mata Kuliah</p>
                    </a>
                </li>

                <!-- log out -->
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out"></i>
                        <p class="nav-label">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
