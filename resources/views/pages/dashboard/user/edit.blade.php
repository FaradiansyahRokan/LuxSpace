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
          User
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-black-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-black-500 md:ml-2 dark:text-black-400">Data User</span>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg aria-hidden="true" class="w-6 h-6 text-black-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          <span class="ml-1 text-sm font-medium text-black-500 md:ml-2 dark:text-black-400">Edit User</span>
        </div>
      </li>
    </ol>
  </nav>
  
        </h2>
    </x-slot>

    <x-slot name="script">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's Something Wrong!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-5 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
                @endif
                <form action="{{route('dashboard.user.update', $item->id)}}" class="w-full" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="shadow overflow sm-rounded md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3">
                        <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name</label>
                        <input type="text" value="{{old('name') ?? $item->name}}" name="name"  placeholder="Name" class="block w-full bg-gray-200 text-black-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-none">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3">
                        <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email</label>
                        <input type="email" value="{{old('email') ?? $item->email}}" name="email"  placeholder="Email" class="block w-full bg-gray-200 text-black-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-none">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3">
                        <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Roles</label>
                        <select name="status" id="" class="block w-full bg-gray-200 text-black-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-none">
                            <option value="{{ $item->roles}}">{{ $item->roles}}</option>
                            <option disabled>------------</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="USER">USER</option>
                            
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-4">
                    <div class="w-full px-3">
                        <button type="submit" class="bg-pink-200 text-black-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-none hover:bg-pink-400">Update User</button>
                    </div>
                </div>
                    </div>
                </form>
            </div>
         </div>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
</x-app-layout>