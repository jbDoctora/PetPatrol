<x-noFoot>
  <div class="flex flex-row">
       <div class="drawer drawer-mobile h-screen">
         <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
         <div class="drawer-content flex flex-col items-start justify-start h-60">
     
           <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden"><svg class="w-6 h-6 text-gray-600" viewBox="0 0 24 24">
             <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"/>
           </svg></label>
           <div class="w-full h-96"><iframe name="myFrame" src="/trainer/portfolio" frameborder="0" class="w-full h-screen"></iframe></div>
         </div> 
         <div class="drawer-side text-base">
           <label for="my-drawer-2" class="drawer-overlay"></label> 
           <ul class="menu p-2 w-52 bg-secondary text-sm-content bg-secondary">
            <div class="m-4 text-center font-extrabold">Dashboard</div>
             <li class="m-4"><a href="/trainer/portfolio" target="myFrame"><i class="fa-sharp fa-solid fa-record-vinyl"></i>My Portfolio</a></li>
             <li class="m-4"><a target="myFrame"><i class="fa-solid fa-calendar-check"></i>My Bookings</a></li>
             <li class="m-4"><a target="myFrame"><i class="fa-solid fa-bell-concierge"></i>My Services</a></li>
             <li class="m-4"><a><i class="fa-solid fa-user"></i>My Profile</a></li>
             <li class="m-4"><a><i class="fa-solid fa-gears"></i>Privacy Settings</a></li>
           </ul>
</x-noFoot>