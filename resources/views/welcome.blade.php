<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/bootstrapcss.css') }}" rel="stylesheet"> --}}
        <script src="{{ asset('js/app.js') }}"></script>
        <title>Home</title>
    </head>
    <body>
      <div id="app">
        <div x-data="{ open: false }" class="relative bg-white overflow-hidden">
          <div class="max-w-screen-xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
              <div class="pt-6 px-4 sm:px-6 lg:px-8">
                <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                  <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                      <a href="#" class="text-xl">
                        <img class="h-8 w-auto sm:h-10" src="{{ asset('images/logo.png') }}" alt="" />
                      </a>
                      <div class="-mr-2 flex items-center md:hidden">
                        <button x-on:click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div style="z-index: 400;" class="hidden md:block md:ml-10 md:pr-4 lg:-mr-10">
                    <a href="#how" class="font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">How it works</a>
                    <a href="#features" class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Features</a>
                    <a href="../shop" class="ml-8 font-medium text-gray-500 hover:text-gray-900 focus:outline-none focus:text-gray-900 transition duration-150 ease-in-out">Shop</a>
                    <a href="../login" class="ml-8 font-medium text-red-600 hover:text-red-900 focus:outline-none focus:text-red-700 transition duration-150 ease-in-out">Get Started</a>
                  </div>
                </nav>
              </div>
        
              <div  x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-0 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                <div class="rounded-lg shadow-md">
                  <div class="rounded-lg bg-white shadow-xs overflow-hidden">
                    <div class="px-5 pt-4 flex items-center justify-between">
                      <div class="text-xl">
                        {{-- <img class="h-8 w-auto" src="/img/logos/workflow-mark-on-white.svg" alt="" /> --}}
                        SchoolStore
                      </div>
                      <div class="-mr-2">
                        <button x-on:click="open = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                      </div>
                    </div>
                    <div class="px-2 pt-2 pb-3">
                      <a href="#how" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">How it works</a>
                      <a href="#features" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Features</a>
                      <a href="../shop" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out">Store</a>
                    </div>
                    <div>
                      <a href="../login" class="block w-full mx-5 py-3 text-center font-medium text-red-600 bg-gray-50 hover:bg-gray-100 hover:text-red-700 focus:outline-none focus:bg-gray-100 focus:text-red-700 transition duration-150 ease-in-out">
                        Get Started
                      </a>
                    </div>
                  </div>
                </div>
              </div>
        
              <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                  <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                    We are here for 
                    <br class="xl:hidden" />
                    <span class="text-red-600">Students</span>
                  </h2>
                  <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                    Get your needed food items delivered to your school at the right time without paying a dime
                  </p>
                  
                  <div class="mt-5 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">
                    <p class="text-base font-medium text-gray-900">
                      Sign up to get notified when we lunch.
                    </p>
                    <form class="mt-3 sm:flex">
                      <input v-model="email" required aria-label="Email" class="appearance-none block w-full px-3 py-3 border border-gray-300 text-base leading-6 rounded-md placeholder-gray-500 shadow-sm focus:outline-none focus:placeholder-gray-400 focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out sm:flex-1" placeholder="Enter your email" />
                      <button v-on:click.prevent="submitContact"   type="submit" class="mt-3 w-full px-6 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-400 shadow-sm hover:bg-gray-700 focus:outline-none focus:shadow-outline active:bg-gray-900 transition duration-150 ease-in-out sm:mt-0 sm:ml-3 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                        Notify me
                      </button>
                    </form>
                    <p class="mt-3 text-sm leading-5 text-gray-500">
                      We care about the protection of your data.
                      {{-- <a href="#" class="font-medium text-gray-900 underline">Privacy Policy</a>. --}}
                    </p>
                  </div>
                </div>
              </div>
                <svg  class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>
               </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('images/shop_banner.jpg') }}" alt="" />
            </div>
        </div>
        <a name="how"></a>
        <div class="py-36 bg-red-50">
            <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
              <div class="text-center">
                <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                  How it works
                </h3>
                <p class="mt-4 max-w-2xl text-xl leading-7 text-gray-500 mx-auto">
                  Four simple steps to start enjoying the benefits of SchoolStore
                </p>
              </div>
          
              <div class="mt-10">
                <ul class="md:grid md:grid-cols-2 md:col-gap-8 md:row-gap-10">
                  <li>
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                          <i class="las la-users p-1 text-3xl"></i>
                        </div>
                      </div>
                      <div class="ml-4">
                        <h5 class="text-lg leading-6 font-medium text-gray-900">Register</h5>
                        <p class="mt-2 text-base leading-6 text-gray-500">
                          Create an account on SchoolStore with required information, after verification you gain access to the platform
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="mt-10 md:mt-0">
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                          <i class="las la-wallet p-1 text-3xl"></i>
                        </div>
                      </div>
                      <div class="ml-4">
                        <h5 class="text-lg leading-6 font-medium text-gray-900">Credit Facility</h5>
                        <p class="mt-2 text-base leading-6 text-gray-500">
                         After verification of your account information, credit is loaded into your account walet. Loaded credit are equivalent to money
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="mt-10 md:mt-0">
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                          <i class="las la-store-alt p-1 text-3xl"></i>
                        </div>
                      </div>
                      <div class="ml-4">
                        <h5 class="text-lg leading-6 font-medium text-gray-900">Shopping</h5>
                        <p class="mt-2 text-base leading-6 text-gray-500">
                          Loaded credits (money) can be used to buy food items and products on the SchoolStore online shop,
                        </p>
                      </div>
                    </div>
                  </li>
                  <li class="mt-10 md:mt-0">
                    <div class="flex">
                      <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                          <i class="las la-truck  p-1 text-3xl"></i>
                        </div>
                      </div>
                      <div class="ml-4">
                        <h5 class="text-lg leading-6 font-medium text-gray-900">Deliever</h5>
                        <p class="mt-2 text-base leading-6 text-gray-500">
                          Purchased food items and products are delivered right at your school, hostel or dormitory 
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <a name="features"></a>
        <div class="py-16 bg-white overflow-hidden lg:py-24">
            <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
              <svg class="hidden lg:block absolute left-full transform -translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                  <pattern id="svg-pattern-squares-1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                  </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#svg-pattern-squares-1)" />
              </svg>
          
              <div class="relative">
                <h3 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                 Treating our Student as VIPs
                </h3>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl leading-7 text-gray-500">
                 SchoolStore 

                </p>
              </div>
          
              <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="relative">
                  <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                    Shopping Experience
                  </h4>
                  <p class="mt-3 text-lg leading-7 text-gray-500">
                    Our Catelogue is packed with all essential products from Milo, Rice, Tin Tomatoes etc. The best part is we deliver at your door step.
                  </p>
          
                  <ul class="mt-10">
                    <li>
                      <div class="flex">
                        <div class="flex-shrink-0">
                          <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                            </svg>
                          </div>
                        </div>
                        <div class="ml-4">
                          <h5 class="text-lg leading-6 font-medium text-gray-900">Lowest Prices</h5>
                          <p class="mt-2 text-base leading-6 text-gray-500">
                           Our Price are one of the lowest, you will save more buying from us.
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="mt-10">
                      <div class="flex">
                        <div class="flex-shrink-0">
                          <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                           <i class="las la-money-bill text-2xl"></i>
                          </div>
                        </div>
                        <div class="ml-4">
                          <h5 class="text-lg leading-6 font-medium text-gray-900">No Cash upfront</h5>
                          <p class="mt-2 text-base leading-6 text-gray-500">
                            Student do not require to have cash in their account to start shopping online, all you have to do is request for a credit facility and voila
                            
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="mt-10">
                      <div class="flex">
                        <div class="flex-shrink-0">
                          <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                          </div>
                        </div>
                        <div class="ml-4">
                          <h5 class="text-lg leading-6 font-medium text-gray-900">Discount Offers</h5>
                          <p class="mt-2 text-base leading-6 text-gray-500">
                            Enjoy weekly and monthly discount on product and items. 
                          </p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
          
                <div class="mt-10 -mx-4 relative lg:mt-0">
                  <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
                    <defs>
                      <pattern id="svg-pattern-squares-2" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                      </pattern>
                    </defs>
                    <rect width="784" height="404" fill="url(#svg-pattern-squares-2)" />
                  </svg>
                  <img class="relative mx-auto" width="490" src="/img/features/feature-example-1.png" alt="" />
                </div>
              </div>
          
              <svg class="hidden lg:block absolute right-full transform translate-x-1/2 translate-y-12" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                  <pattern id="svg-pattern-squares-3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                  </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#svg-pattern-squares-3)" />
              </svg>
          
              <div class="relative mt-12 sm:mt-16 lg:mt-24">
                <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
                  <div class="lg:col-start-2">
                    <h4 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                      Door Step Delivery
                    </h4>
                    <p class="mt-3 text-lg leading-7 text-gray-500">
                     As a company we take convienience very seriously that why we added door-step delivery to the package. Every Product is deliveredto your campuses, hostels or dormitories.
                    </p>
          
                    <ul class="mt-10">
                      <li>
                        <div class="flex">
                          <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                              </svg>
                            </div>
                          </div>
                          <div class="ml-4">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">Mobile Notifications & Tracking</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                             You can track your orders using our Mobile App, Send equiries about ETA's and Receive notifications based on Package closeness to your set destination .
                            </p>
                          </div>
                        </div>
                      </li>
                      <li class="mt-10">
                        <div class="flex">
                          <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
                             <i class="las la-money-check text-2xl"></i>
                            </div>
                          </div>
                          <div class="ml-4">
                            <h5 class="text-lg leading-6 font-medium text-gray-900">No Hidden Fees</h5>
                            <p class="mt-2 text-base leading-6 text-gray-500">
                              There absolutely no hidden charges when shoppping on the platform. Every transaction is recorded for transparency and convienience.
                            </p>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
          
                  <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
                    <svg class="absolute left-1/2 transform -translate-x-1/2 translate-y-16 lg:hidden" width="784" height="404" fill="none" viewBox="0 0 784 404">
                      <defs>
                        <pattern id="svg-pattern-squares-4" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                      </defs>
                      <rect width="784" height="404" fill="url(#svg-pattern-squares-4)" />
                    </svg>
                    <img class="relative mx-auto" width="490" src="/img/features/feature-example-2.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
         </div>
         <div class="relative bg-gray-800">
            <div class="h-56 bg-red-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
              <img class="w-full h-full object-cover" src="{{ asset('images/shop_banner2.jpg') }}" alt="Support team" />
            </div>
            <div class="relative max-w-screen-xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
              <div class="md:ml-auto md:w-1/2 md:pl-10">
                <div class="text-base leading-6 font-semibold uppercase tracking-wider text-gray-300">
                  No more hassel
                </div>
                <h2 class="mt-2 text-white text-3xl leading-9 font-extrabold tracking-tight sm:text-4xl sm:leading-10">
                  We’re here to help
                </h2>
                <p class="mt-3 text-lg leading-7 text-gray-300">
                  We understand sometimes your monthly or weekly allowance don't come on time that why we came up with this service, no need to hassel anymore, order food stuff and get it delivered to the comfort of your home, school or hostel. We are here to help you focus on studies and excel.
                </p>
                <div class="mt-8">
                  <div class="inline-flex rounded-md shadow">
                    <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-900 bg-white hover:text-gray-600 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                      Get started now
                      <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5zM5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" clip-rule="evenodd"/>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
        </div>
          <div class="bg-white pt-10 pb-12">
            <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
              <p class="text-center text-base leading-6 font-semibold uppercase text-gray-600 tracking-wider">
                Partners
              </p>
              <div class="mt-6 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-8">
                <div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
                  <img class="max-h-12" src="/img/logos/transistor-logo.svg" alt="MTN" />
                </div>
                <div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
                  <img class="max-h-12" src="/img/logos/mirage-logo.svg" alt="PASILIER LIMITED" />
                </div>
                <div class="col-span-1 flex justify-center py-8 px-8 bg-gray-50">
                  <img class="max-h-12" src="/img/logos/tuple-logo.svg" alt="JUMENI" />
                </div>
              </div>
            </div>
        </div>
        <div class="bg-gray-800">
            <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center">
              <div class="lg:w-0 lg:flex-1">
                <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-white sm:text-4xl sm:leading-10">
                  Sign up for to be informed when we lunch 
                </h2>
                <p class="mt-3 max-w-3xl text-lg leading-6 text-gray-300">
                  Be the first to know when we lunch 
               </p>
              </div>
              <div class="mt-8 lg:mt-0 lg:ml-8">
                <form class="sm:flex">
                  <input v-model="email" aria-label="Email address" type="email" required class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out sm:max-w-xs" placeholder="Enter your email" />
                  <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                    <button  v-on:click.prevent="submitContact" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:bg-red-400 transition duration-150 ease-in-out">
                      Notify me
                    </button>
                  </div>
                </form>
                <p class="mt-3 text-sm leading-5 text-gray-300">
                  We care about the protection of your data. 
                  {{-- <a href="#" class="text-white font-medium underline">
                    Privacy Policy.
                  </a> --}}
                </p>
              </div>
            </div>
          </div>
          <div class="bg-white">
            <div class="max-w-screen-xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
              {{-- <nav class="-mx-5 -my-2 flex flex-wrap justify-center">
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    About
                  </a>
                </div>
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Blog
                  </a>
                </div>
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Jobs
                  </a>
                </div>
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Press
                  </a>
                </div>
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Accessibility
                  </a>
                </div>
                <div class="px-5 py-2">
                  <a href="#" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Partners
                  </a>
                </div>
              </nav> --}}
              {{-- <div class="mt-8 flex justify-center">
                <a href="#" class="text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Facebook</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                  </svg>
                </a>
                <a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Instagram</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                  </svg>
                </a>
                <a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">Twitter</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                  </svg>
                </a>
                <a href="#" class="ml-6 text-gray-400 hover:text-gray-500">
                  <span class="sr-only">GitHub</span>
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/>
                  </svg>
                </a>
              </div> --}}
              <div class="mt-8">
                <p class="text-center text-base leading-6 text-gray-400">
                  &copy; 2020 SchoolStore, Inc. All rights reserved.
                </p>
              </div>
            </div>
          </div>
      </div>
      <script>
       const app = new Vue({
          el: '#app',
          data: function(){
            return {
                email: '',
            }
          },

          methods: {
            submitContact: function(){
              var self = this;
              const checkEmail = validateEmail.validate(this.email);              
              if(checkEmail === false){
                return Vue.swal.fire({
                  icon: 'error', 
                  title: 'Validation',
                  text: 'enter email',
                  toast: true,
                  timer: 5000,
                  position: 'top-end',
                  timerProgressBar: true,
                })
              }

              axios.post('../newsletters/signup', {
                email: this.email
              }).then(function(response){
                  self.email = '';
                  return Vue.swal.fire({
                    icon: 'success', 
                    title: 'Received',
                    text: 'Contact Received',
                    toast: true,
                    timer: 10000,
                    position: 'top-end',
                    timerProgressBar: true,
                  })
              }).catch(function(error){
                console.log(error.response);
                
                  return Vue.swal.fire({
                    icon: error.response.data.status, 
                    title: 'Try Again',
                    text: error.response.data.message,
                    toast: true,
                    timer: 10000,
                    position: 'top-end',
                    timerProgressBar: true,
                  })
              })
            },
          }
      })
    </script>
    </body>
</html>
