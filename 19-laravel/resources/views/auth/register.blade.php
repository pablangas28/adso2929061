@extends('layouts.app')
@section('title', 'Larapets: Register')
@section('content')
    <section class="bg-[#0009]
                    w-96
                    md:w-fit
                    flex
                    flex-col 
                    justify-center 
                    text-white 
                    items-center 
                    p-4 
                    rounded-sm">
        <h1 class="text-4xl 
                  flex 
                  gap-2 
                  border-b-2 
                  pb-2 
                  mb-4">

            <svg xmlns="http://www.w3.org/2000/svg" class="size-10" width="32" height="32" fill="currentColor"
                viewBox="0 0 256 256">
                <path
                    d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z">
                </path>
            </svg>
            Login
        </h1> 
       <form class="flex
                    flex-col
                    md:flex-row
                    gap-4" 
        method="POST" action="{{route ('register')}}">
            @csrf
            <div class="w-full md:w-80">
                <label class="label text-white mt-4">Document:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="document" 
                              value="{{ old('document') }}" 
                              placeholder="75000010">
                @error('document')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">FullName:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="fullname" 
                              value="{{ old('fullname') }}" 
                              placeholder="Jeremias Sparrow">
                @error('fullname')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">Gender:</label>
                <select name="gender" class="select bg-[#0009] outline-1 focus:border-white w-full">
                    <option value="">Select...</option>
                    <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                    <option value="Male"@if(old('gender') == 'Male') selected @endif>Male</option>
                </select>
                @error('gender')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">BirthDate:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="birthdate" 
                              value="{{ old('birthdate') }}" 
                              placeholder="1990-12-25">
                @error('birthdate')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-full md:w-80">
                <label class="label text-white mt-4">Phone:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="phone" 
                              value="{{ old('phone') }}" 
                              placeholder="32076726827">
                @error('phone')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Email:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="email" 
                              value="{{ old('email') }}" 
                              placeholder="example@mail.com">
                @error('email')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Password:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="password" 
                              name="password" 
                              value="{{ old('password') }}" 
                              placeholder="yoursecret">
                @error('password')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Password Confirmation:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="password" 
                              name="password_confirmation" 
                              value="{{ old('password_confirmation') }}" 
                              placeholder="confirm">
                <button class="btn btn-outline mt-4 w-full">
                    Register
                </button>
            </div>
       </form>
    </section>
@endsection        

