 <!-- BEGIN: Header -->
 <div class="z-[9]" id="app_header">
   <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
     <div class="flex justify-between items-center h-full">
       <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
         <a href="{{ url('/admin/') }}" class="mobile-logo xl:hidden inline-block">
           <img src="{{ asset('images/logo/iso_activos360.png') }}" class="black_logo w-7" alt="logo">
           <img src="{{ asset('images/logo/iso_activos360_white.png') }}" class="white_logo w-7" alt="logo">
         </a>

       </div>
       <!-- end horizental -->

       <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

         <!-- BEGIN: Toggle Theme -->
         <div class="relative md:block hidden">

           <!-- Mail Dropdown -->
           <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 dark:divide-slate-700 shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
             <div class="flex items-center justify-between py-4 px-4">
               <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Mensajes</h3>
               <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">Ver todos</a>
             </div>
             <div class="divide-y divide-slate-100 dark:divide-slate-700" role="none">
               <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                 <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                   <div class="flex-none">
                     <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                       <span class="bg-secondary-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                       <img src="{{ asset('images/all-img/user.png') }}" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                     </div>
                   </div>
                   <div class="flex-1">
                     <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                       Wade Warren</a>
                     <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                     <div class="text-slate-400 dark:text-slate-400 text-xs">
                       3 min ago</div>
                   </div>
                   <div class="flex-0">
                     <span class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">
                       1</span>
                   </div>
                 </div>
               </div>
               <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer">
                 <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                   <div class="flex-none">
                     <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                       <span class="bg-green-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                       <img src="{{ asset('images/all-img/user2.png') }}" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                     </div>
                   </div>
                   <div class="flex-1">
                     <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                       Savannah Nguyen</a>
                     <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                     <div class="text-slate-400 dark:text-slate-400 text-xs">3 min ago
                     </div>
                   </div>
                 </div>
               </div>
               <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm  cursor-pointer">
                 <div class="flex ltr:text-left rtl:text-right space-x-3 rtl:space-x-reverse relative">
                   <div class="flex-none">
                     <div class="h-8 w-8 bg-white dark:bg-slate-700 rounded-full relative">
                       <span class="bg-green-500 w-[10px] h-[10px] rounded-full border border-white dark:border-slate-700 inline-block absolute
                right-0 top-0"></span>
                       <img src="{{ asset('images/all-img/user3.png') }}" alt="user" class="block w-full h-full object-cover rounded-full border hover:border-white border-transparent">
                     </div>
                   </div>
                   <div class="flex-1">
                     <a href="#" class="text-slate-800 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                       Ralph Edwards</a>
                     <div class="text-xs hover:text-[#68768A] text-slate-600 dark:text-slate-300 mb-1">Hi! How are you doing?.....</div>
                     <div class="text-slate-400 dark:text-slate-400 text-xs">
                       3 min ago
                     </div>
                   </div>
                   <div class="flex-0">
                     <span class="h-4 w-4 bg-danger-500 border border-white rounded-full text-[10px] flex items-center justify-center text-white">
                       8</span>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <!-- END: Message Dropdown -->

         <!-- BEGIN: Notification Dropdown -->
         <!-- Notifications Dropdown area -->
         <div class="relative md:block hidden">
           <!-- <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
      rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
             <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
        justify-center rounded-full text-white z-[99]">
               4</span>
           </button> -->
           <!-- Notifications Dropdown -->
           <div class="dropdown-menu z-10 hidden bg-white shadow w-[335px]
      dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
             <div class="flex items-center justify-between py-4 px-4">
               <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notificaciones</h3>
               <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">Ver todas</a>
             </div>
             <div class="" role="none">
               <div class="bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-800 block w-full px-4 py-2 text-sm relative">
                 <div class="flex ltr:text-left rtl:text-right">
                   <div class="flex-none ltr:mr-3 rtl:ml-3">
                     <div class="h-8 w-8 bg-white rounded-full">
                       <img src="{{ asset('images/all-img/user.png') }}" alt="user" class="border-white block w-full h-full object-cover rounded-full border">
                     </div>
                   </div>
                   <div class="flex-1">
                     <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                       Your order is placed</a>
                     <div class="text-slate-500 dark:text-slate-200 text-xs leading-4">Amet minim mollit non deser unt ullamco est sit
                       aliqua.</div>
                     <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                       3 min ago
                     </div>
                   </div>
                 </div>
               </div>
               <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
                 <div class="flex ltr:text-left rtl:text-right relative">
                   <div class="flex-none ltr:mr-3 rtl:ml-3">
                     <div class="h-8 w-8 bg-white rounded-full">
                       <img src="{{ asset('images/all-img/user2.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                     </div>
                   </div>
                   <div class="flex-1">
                     <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
                       Congratulations Darlene 🎉</a>
                     <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
                     3 min ago
                   </div>
                 </div>
                 <div class="flex-0">
                   <span class="h-[10px] w-[10px] bg-danger-500 border border-white dark:border-slate-400 rounded-full inline-block"></span>
                 </div>
               </div>
             </div>
             <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
               <div class="flex ltr:text-left rtl:text-right relative">
                 <div class="flex-none ltr:mr-3 rtl:ml-3">
                   <div class="h-8 w-8 bg-white rounded-full">
                     <img src="{{ asset('images/all-img/user3.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                   </div>
                 </div>
                 <div class="flex-1">
                   <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
              before:top-0 before:left-0">
                     Revised Order 👋</a>
                   <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
                   <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">3 min ago</div>
                 </div>
               </div>
             </div>
             <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
               <div class="flex ltr:text-left rtl:text-right relative">
                 <div class="flex-none ltr:mr-3 rtl:ml-3">
                   <div class="h-8 w-8 bg-white rounded-full">
                     <img src="{{ asset('images/all-img/user4.png') }}" alt="user" class="border-transparent block w-full h-full object-cover rounded-full border">
                   </div>
                 </div>
                 <div class="flex-1">
                   <a href="#" class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
              before:top-0 before:left-0">
                     Brooklyn Simmons</a>
                   <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Added you to Top Secret Project group...</div>
                   <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                     3 min ago
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <!-- END: Notification Dropdown -->

         <!-- BEGIN: Profile Dropdown -->
         <!-- Profile DropDown Area -->
         @if(Auth::user())
         @can('super_manage')
         <span class="badge bg-primary-500 text-primary-500 bg-opacity-30 capitalize">SUPER ADMINSITRADOR</span>
         @endcan
         @can('administrador_manage')
         <span class="badge bg-danger-500 text-danger-500 bg-opacity-30 capitalize">ADMINISTRADOR</span>
         @endcan
         @can('inventariador_manage')
         <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">INVENTARIADOR</span>
         @endcan
         @can('arquitecto_manage')
         <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">ARQUITECTO</span>
         @endcan
         @can('mecanico_manage')
         <span class="badge bg-success-500 text-success-500 bg-opacity-30 capitalize">MECÁNICO</span>
         @endcan
         @endif
         <div class="md:block hidden w-full">
           <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
             <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
               <img src="{{ asset('images/users/user-ex.jpg') }}" alt="usuario" class="block w-full h-full object-cover rounded-full">
             </div>
             <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">

               @if(Auth::user())
               {{ Auth::user()->name }}
               @endif
             </span>
             <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
             </svg>
           </button>
           <!-- Dropdown menu -->
           <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
             <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
               <li>
                 <a href="{{ route('profile.profile') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                   <iconify-icon icon="heroicons-outline:cog" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                   <span class="font-Inter">Perfil</span>
                 </a>
               </li>
               <li>
                 <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                   <iconify-icon icon="heroicons-outline:key" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                   <span class="font-Inter">Contraseña</span>
                 </a>
               </li>
               <li>
                 <a
                   href="{{ route('logout') }}"
                   class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600 dark:text-white font-normal"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                   <iconify-icon icon="heroicons:power" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                   <span class="font-Inter">Salir</span>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                 </form>
               </li>
             </ul>
           </div>
         </div>
         <!-- END: Header -->
         <button class="smallDeviceMenuController md:hidden block leading-0">
           <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
         </button>
         <!-- end mobile menu -->
       </div>
       <!-- end nav tools -->
     </div>
   </div>
 </div>

 <!-- BEGIN: Search Modal -->
 <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
   <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
     <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
       <form>
         <div class="relative">
           <input type="text" class="form-control !py-3 !pr-12" placeholder="Buscar">
           <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
             <iconify-icon icon="heroicons-solid:search"></iconify-icon>
           </button>
         </div>
       </form>
     </div>
   </div>
 </div>

 <!-- BEGIN: Modal Tinglado -->
 <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="modal_tinglado" tabindex="-1"
   aria-labelledby="modal_tinglado" aria-hidden="true">
   <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
     <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
      rounded-md outline-none text-current">
       <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
         <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-secondary-500">
           <h3 class="text-xl font-medium text-white dark:text-white">
             Registro de Tinglado
           </h3>
           <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                  dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
             <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                          11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
             </svg>
             <span class="sr-only">Cerrra</span>
           </button>
         </div>
         <div class="p-6 space-y-4">
           <iframe src="" id="modal_form" frameborder="0" width="100%" height="1000"></iframe>
         </div>
         <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
           <a href="javascript:;" class="btn inline-flex justify-center btn-success mr-6 ml-auto" id="btn_modal_guardar">
             <span class="flex items-center">
               <i class="fa-solid fa-save text-xl ltr:mr-2 rtl:ml-2 "></i>
               <span>Guardar</span>
             </span>
           </a>
           <a href="javascript:;" class="btn inline-flex justify-center btn-danger ml-auto" id="btn_modal_cancelar" data-list-url="">
             <span class="flex items-center">
               <i class="fa-solid fa-ban text-xl ltr:mr-2 rtl:ml-2 "></i>
               <span>Cancelar</span>
             </span>
           </a>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- END: Modal Tinglado -->
 <!-- END: Search Modal -->
 <!-- END: Header -->