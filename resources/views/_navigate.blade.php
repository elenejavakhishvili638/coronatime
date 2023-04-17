   <div class="">
       <h1 class="text-dark-black font font-black text-xl">Worldwide statistics</h1>
       <div class="mt-24 border-b border-gr mb-16 flex">
           <a href="{{ route('worldwide.show') }}"
               class="{{ Request::is('worldwide-statistics') ? 'font-bold border-dark-black pb-16 border-b-2 mr-24 text-sm' : 'mr-24 text-sm ' }}
                 ">Worldwide</a>
           <a href="{{ route('country.show') }}"
               class="{{ Request::is('by-country-statistics') ? 'font-bold border-dark-black pb-16 border-b-2 text-sm' : 'text-sm' }}">By
               country</a>
       </div>
   </div>
