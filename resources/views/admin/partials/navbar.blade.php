<ul class="list-unstyled topbar-menu float-end mb-0">
    <!--
    <li class="dropdown notification-list topbar-dropdown">
        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
            <span class="align-middle d-none d-sm-inline-block">English</span>
            <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
            <a href="javascript:void(0);" class="dropdown-item notify-item">
                <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12">
                <span class="align-middle">Spanish</span>
            </a>
        </div>
    </li>
    -->
    <li>
        <div class="mt-1">
            <small>Dark Mode</small>
            <br>
            <input type="checkbox" id="darkMode" data-switch="none" />
            <label for="darkMode" data-on-label="on" data-off-label="off"></label>
        </div>
        <script>
            const toggleButton = document.getElementById('darkMode')

            const lightStyle = document.getElementById('light-style');
            const darkStyle = document.getElementById('dark-style');
            let style;

            if(localStorage.getItem("style") ==null) {
                style = 'light'
            }else{
                style = localStorage.getItem("style");
            }

            toggleButton.addEventListener('change', () => {
               if(style === 'light') {
                   darkStyle.removeAttribute('disabled');
                   lightStyle.setAttribute('disabled','disabled');
                   style = 'dark';
                   localStorage.setItem("style",'dark');
               }else{
                   darkStyle.setAttribute('disabled','disabled');
                   lightStyle.removeAttribute('disabled');
                   style = 'light';
                   localStorage.setItem("style",'light');
               }
            })

            window.onload = function() {
                if(localStorage.getItem("style") === 'light') {
                    lightStyle.removeAttribute('disabled');
                    darkStyle.setAttribute('disabled','disabled');
                    toggleButton.removeAttribute('checked');
                }else{
                    lightStyle.setAttribute('disabled','disabled');
                    darkStyle.removeAttribute('disabled');
                    toggleButton.checked = "checked";
                }
            }

        </script>
    </li>

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <span class="account-user-avatar">
                @if(auth()->user()->avatar == null)
                    <img src="https://ui-avatars.com/api/?background=727cf5&color=fff&bold=true&name={{auth()->user()->name }}" alt="user-image" class="rounded-circle">
                @else
                    <img src="{{ auth()->user()->avatar }}" alt="user-image" class="rounded-circle">
                @endif
            </span>
            <span>
                <span class="account-user-name">{{  $user = auth()->user()->name }}</span>
                <span class="account-position">{{ auth()->user()->roles->pluck('name')[0] ?? '' }}</span>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
            <!-- item-->
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>
            <!-- item-->
            <a href="{{route('profile',auth()->user()->id)}}" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle me-1"></i>
                <span>My Profile</span>
            </a>
            <!-- item-->
            <form action="{{ route('login.logout') }}" method="post">
                @csrf
                <a href="#" onclick="this.closest('form').submit()" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
            </form>
        </div>
    </li>

</ul>
