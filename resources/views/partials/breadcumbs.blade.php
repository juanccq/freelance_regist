@if (count($breadcrumbs) > 0)
<!-- BEGIN: Breadcrumb -->
<div class="mb-5">
  <ul class="m-0 p-0 list-none">
    <li class="inline-block relative top-[3px] text-base text-warning-500 font-Inter ">
      <a href="{{ url('/admin/') }}">
        <iconify-icon icon="heroicons-outline:home"></iconify-icon>
      </a>
      <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
    </li>
    @foreach ($breadcrumbs as $breadcrumb)
      @if (!is_null($breadcrumb->url) && !$loop->last)
        <li class="inline-block relative text-sm font-Inter dark:text-white">
          <a href="{{ $breadcrumb->url }}">

            {{ $breadcrumb->title }}
          </a>
          <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
        </li>
      @else
        <li class="inline-block relative text-sm text-warning-500 font-Inter dark:text-warning">{{ $breadcrumb->title }}</li>
      @endif
    @endforeach
  </ul>
</div>
<!-- END: BreadCrumb -->
@endif