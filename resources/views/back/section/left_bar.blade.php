<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="{{ asset('back/images/logo.svg') }}" width="25" alt="Aero"><span class="m-l-10">Aero</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="{{ asset('back/images/profile_av.jpg') }}" alt="User"></a>
                    <div class="detail">
                        <h4>Michael</h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            <li class="{{ Route::is('dashboard') ? 'active' : '' }}"> <a href="{{ route('back.dashboard') }}"><i class="zmdi zmdi-blogger"></i><span>Dashboard</span></a></li>
            <li class="{{ Route::is('back.category.*') ? 'active' : '' }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Category</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.category.index') ? 'active' : ''  }}"><a href="{{ route('back.category.index') }}">All Category</a></li>
                    <li class="{{ Route::is('back.category.create') ? 'active' : ''  }}"><a href="{{ route('back.category.create') }}">Create Category</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('back.slider.*') ? 'active' : ''  }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Sliders</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.slider.index') ? 'active' : ''  }}"><a href="{{ route('back.slider.index') }}">All Slider</a></li>
                    <li class="{{ Route::is('back.slider.create') ? 'active' : ''  }}"><a href="{{ route('back.slider.create') }}">Create Slider</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('users.*') ? 'active' : ''  }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Users</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('users.index') ? 'active' : ''  }}"><a href="{{ route('users.index') }}">All Users</a></li>
                    <li class="{{ Route::is('users.create') ? 'active' : ''  }}"><a href="{{ route('users.create') }}">Create User</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('back.blog.*') ? 'active' : ''  }}"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-blogger"></i><span>Blog</span></a>
                <ul class="ml-menu">
                    <li class="{{ Route::is('back.blog.index') ? 'active' : ''  }}"><a href="{{ route('back.blog.index') }}">All Blogs</a></li>
                    <li class="{{ Route::is('back.blog.create') ? 'active' : ''  }}"><a href="{{ route('back.blog.create') }}">Create Blog</a></li>
                </ul>
            </li>
            </li>
        </ul>
    </div>
</aside>