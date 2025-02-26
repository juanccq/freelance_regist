@if(Session::has('success'))
<div class="py-[18px] px-6 font-normal text-sm rounded-md bg-success-500 bg-opacity-[14%]  text-white">
  <div class="flex items-center space-x-3 rtl:space-x-reverse">
    <iconify-icon class="text-2xl flex-0 text-success-500" icon="system-uicons:target"></iconify-icon>
    <p class="flex-1 text-success-500 font-Inter">{!! Session::get('success') !!}</p>
    <div class="flex-0 text-xl cursor-pointer text-success-500">
      <iconify-icon icon="line-md:close"></iconify-icon>
    </div>
  </div>
</div>
@endif
@if(Session::has('warning'))
<div class="py-[18px] px-6 font-normal text-sm rounded-md bg-warning-500 bg-opacity-[14%]  text-white">
  <div class="flex items-center space-x-3 rtl:space-x-reverse">
    <iconify-icon class="text-2xl flex-0 text-warning-500" icon="system-uicons:target"></iconify-icon>
    <p class="flex-1 text-warning-500 font-Inter">{!! Session::get('warning') !!}
    </p>
    <div class="flex-0 text-xl cursor-pointer text-warning-500">
      <iconify-icon icon="line-md:close"></iconify-icon>
    </div>
  </div>
</div>
@endif
@if (Session::has('danger'))
<div class="py-[18px] px-6 font-normal text-sm rounded-md bg-danger-500 bg-opacity-[14%]  text-white">
  <div class="flex items-center space-x-3 rtl:space-x-reverse">
    <iconify-icon class="text-2xl flex-0 text-danger-500" icon="system-uicons:target"></iconify-icon>
    <p class="flex-1 text-danger-500 font-Inter">{!! Session::get('danger') !!}</p>
    <div class="flex-0 text-xl cursor-pointer text-danger-500">
      <iconify-icon icon="line-md:close"></iconify-icon>
    </div>
  </div>
</div>
@endif
@if(Session::has('errors'))
<div class="py-[18px] px-6 font-normal text-sm rounded-md bg-danger-500 bg-opacity-[14%]  text-white">
  <div class="flex items-center space-x-3 rtl:space-x-reverse">
    <iconify-icon class="text-2xl flex-0 text-danger-500" icon="system-uicons:target"></iconify-icon>
    <p class="flex-1 text-danger-500 font-Inter">
    Se produjo un error. Por favor vuelva a intentarlo:
        <!--{{ session()->get('errors') }}-->
        <ul style="padding-left: 20px">
            @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </p>
    <div class="flex-0 text-xl cursor-pointer text-danger-500">
      <iconify-icon icon="line-md:close"></iconify-icon>
    </div>
  </div>
</div>
@endif