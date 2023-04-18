   <div class="">
       <p class="text-dark-black font font-bold text-xl">{{ __('dashboard.title') }}</p>
       <div class="mt-24 border-b border-gr mb-16 flex">
           <a href="{{ route('worldwide.show') }}"
               class="{{ Request::is('worldwide-statistics') ? 'font-bold border-dark-black pb-16 border-b-2 mr-24 text-sm' : 'mr-24 text-sm ' }}
                 ">{{ __('dashboard.worldwide') }}</a>
           <a href="{{ route('country.show') }}"
               class="{{ Request::is('by-country-statistics') ? 'font-bold border-dark-black pb-16 border-b-2 text-sm' : 'text-sm' }}">{{ __('dashboard.by_country') }}</a>
       </div>
   </div>
