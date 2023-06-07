<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                  <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.product.index')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-black-400 dark:hover:text-white">
                      <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 0l8 8-8 8-8-8V0h8zM7 2H2v5l6 6 5-5-6-6zM4.5 3C5.328 3 6 3.666 6 4.5 6 5.328 5.334 6 4.5 6 3.672 6 3 5.334 3 4.5 3 3.672 3.666 3 4.5 3z" fill-rule="evenodd"/>
                    </svg>
                      Products
                    </a>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg aria-hidden="true" class="w-6 h-6 text-black-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <span class="ml-1 text-sm font-medium text-black-500 md:ml-2 dark:text-black-400">Pkfdof</span>
                    </div>
                  </li>
                  <li aria-current="page">
                    <div class="flex items-center">
                      <svg aria-hidden="true" class="w-6 h-6 text-black-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      <span class="ml-1 text-sm font-medium text-black-500 md:ml-2 dark:text-black-400">Galleries</span>
                    </div>
                  </li>
                </ol>
              </nav>
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            var datatable = $('#crudTable').dataTable(
                {
                    ajax : {
                        url : '{!! url()->current() !!}'
                    },
                    columns : [
                        {
                            data: 'id',
                            name: 'id',
                            width:'5%',
                        },
                        {
                            data:'product.title',
                            name : 'product.title',
                        },
                        {
                            data:'product.price',
                            name: 'product.price',
                         
                        },
                        
                    ]
                }
            )
        </script>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <h2 class="font-semibold text-lg text-gray-800 text-leading-tight mb-5">
                Transaction Detail
               </h2>
               <div class="shadow overflow-hidden sm:rounded-lg">
                <div class="text-white p-6 border-b border-gray-200">
                    <table class="table-auto w-full">
                        
                    </table>
                </div>
               </div>
               <h2 class="font-semibold text-lg text-gray-800 text-leading-tight mb-5">
                Transaction Items
               </h2>
                <div class="shadow overflow sm-rounded-lg">
                    <div class="bg-white sm:p-6">
                        <table id="crudTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
         </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>