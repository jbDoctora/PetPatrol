<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="retro">
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
        <link href="https://unpkg.com/@tailwindcss/forms@0.2.1/dist/forms.min.css" rel="stylesheet">
        {{-- ALPINE JS --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
    </head>
    <body>


        
    <main>
        {{$slot}}
    </main>
        
        
        <!-- FOOTER -->
         <footer class="footer p-10 bg-neutral text-neutral-content">
          <div>
            <span class="footer-title">Services</span> 
            <a class="link link-hover">Branding</a>
            <a class="link link-hover">Design</a>
            <a class="link link-hover">Marketing</a>
            <a class="link link-hover">Advertisement</a>
          </div> 
          <div>
            <span class="footer-title">Company</span> 
            <a class="link link-hover">About us</a>
            <a class="link link-hover">Contact</a>
            <a class="link link-hover">Jobs</a>
            <a class="link link-hover">Press kit</a>
          </div> 
          <div>
            <span class="footer-title">Legal</span> 
            <a class="link link-hover">Terms of use</a>
            <a class="link link-hover">Privacy policy</a>
            <a class="link link-hover">Cookie policy</a>
          </div>
        </footer>
        </body>
    </html>