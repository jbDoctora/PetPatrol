<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<style>
  body::-webkit-scrollbar {
    display: none;
}    
iframe{
    float:left;
    clear: both;
}
</style>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- DAISYUI -->
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.46.1/dist/full.css" rel="stylesheet" type="text/css" />
        <!-- TAILWINDCSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
          tailwind.config = {
              theme: {
                  extend: {
                      fontFamily: {
                          'sans': ['Poppins', 'sans-serif'],
                      },
                      colors: {
                          laravel: "#ef3b2d",
                      },
                  },
              },
          };
          </script>
        <!-- FONTAWESOME -->
        <script src="https://kit.fontawesome.com/ceb9fb7eba.js" crossorigin="anonymous"></script>
        <!-- GOOGLE FONT -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="images/apple-touch-icon-72x72.png" />
        <!-- Tailwind Forms -->
        {{-- <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet"> --}}
        {{-- ALPINE JS --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body>

        <!-- NavBar -->
            <div class="navbar border-b-black-200 sticky top-0 z-50 bg-primary-content">
              <div class="flex-1 bg-fixed">
                <label for="my-drawer" class="btn btn-square btn-md drawer-button ml-3">
                  <i class="fa-solid fa-bars fa-lg"></i>
                </label>
                {{-- e add ni if mawala ang logo mix-blend-mode: color-burn --}}
                <img style="aspect-ratio: 4/2; object-fit: contain; margin-left: 4px; margin-right: 4px;" src="images/apple-touch-icon-76x76.png"><span class="font-semibold text-md tracking-wide" style="font-family: 'Fredoka One', cursive;">PET PATROL</span>
              </div>

              <div class="navbar-start hidden lg:flex px-5">
                <ul class="menu menu-horizontal px-5 font-bold text-sm">
                  <li class="px-5">About Us</li>
                  <li class="px-5">Need Help?</li>
                  <a href="/register-trainer"><li class="px-5">Be A Pet Patroller</li></a>
                </ul>
              </div>

              @auth
              <div class="dropdown dropdown-end">
                <div class="indicator">
                  <span class="indicator-item badge badge-primary">99+</span>
                  <button tabindex="0" class="fa-solid fa-bell fa-xl m-4"></button>
                </div>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                  <li><a href="">jagssdjagsdkjas</a></li>
                  <li><a href="">iuywieyiuqwyeiuqw</a></li>
                </ul>
              </div>

              <div class="avatar dropdown dropdown-end">
                <div tabindex="0" class="w-9 h-9 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 mr-4 ml-8">
                  <img src="/images/avatar/Avatar-9.png" />
                </div>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/profile">Profile</a></li>
                    <li>
                      <form method="POST" action="/logout">
                        @csrf
                        <button type="submit">Logout</button>
                      </form>
                    </li>
                </ul>
              </div>
              <div class="mr-3">
                <p class="font-bold">Hi, {{auth()->user()->name}}</p>
              </div>
              @else
              
                <button class="btn btn-outline mx-1"><a href="/login"><span class="normal-case">Sign in</span></a></button>
                <button class="btn btn-primary mx-2"><a href="/register-owner"><span class="normal-case">Sign up</span></a></button>
              
              @endauth
              </div>
              
<main>
  <div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <iframe name="myFrame" src="/request" frameborder="0" class="w-full h-screen"></iframe>
    </div> 
    <div class="drawer-side">
      <label for="my-drawer" class="drawer-overlay"></label>
      <ul class="menu p-2 w-56 h-screen bg-base-100 text-base-content fixed">
        <!-- Sidebar content here -->
        <li class="m-4 text-center"><span class="font-extrabold">My Dashboard</span></li>
        <li class="m-4"><a href="/request" target="myFrame"><i class="fa-solid fa-book fa-xl"></i>My Request</a></li>
        <li class="m-4"><a href="/pet-info" target="myFrame"><i class="fa-solid fa-paw fa-xl"></i>Pet Profile</a></li>
        <li class="m-4"><a href="/profile" target="myFrame"><i class="fa-solid fa-user fa-xl"></i>My Profile</a></li>
      </ul>
    </div>
  </div>
</main>
    </body>
</html>