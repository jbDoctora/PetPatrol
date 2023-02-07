<x-noFoot>
   <div class="flex flex-row">
        <div class="drawer drawer-mobile h-screen drop-shadow-2xl">
          <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
          <div class="drawer-content flex flex-col items-start justify-start h-60">
      
            <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden"><svg class="w-6 h-6 text-gray-600" viewBox="0 0 24 24">
              <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
            </svg></label>
            <div class="w-full h-96"><iframe name="myFrame" src="/request" frameborder="0" class="w-full h-screen"></iframe></div>
          </div> 
          <div class="drawer-side text-base">
            <label for="my-drawer-2" class="drawer-overlay"></label> 
            <ul class="menu p-2 w-52 bg-secondary text-base-content">
         
              <li class="m-4 text-center"><span class="font-extrabold">My Dashboard</span></li>
              <li class="m-4"><a href="/request" target="myFrame"><i class="fa-solid fa-book"></i>My Request</a></li>
              <li class="m-4"><a href="/pet-info" target="myFrame"><i class="fa-solid fa-paw"></i>Pet Profile</a></li>
              <li class="m-4"><a><i class="fa-solid fa-user"></i>My Profile</a></li>
              <li class="m-4"><a href="/profile" target="__parent"><i class="fa-solid fa-gears"></i>Profile settings</a></li>
            </ul>
          </div>
</x-noFoot>