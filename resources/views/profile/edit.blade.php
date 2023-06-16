<x-app-layout>
    <x-slot name="header" >
        <a href="{{ url('/') }}" class="">
            <x-application-logo class="w-40 h-30" id="logNav" />
        </a>
        <div style="display: flex; flex-direction:row; justify-content:flex-end; top:0; margin:0%;padding:0;">
            <x-danger-button style="display: flex; flex-direction:row; justify-content:flex-end;">              
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <a href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                    </a>
                </form>
            </x-danger-button>
        </div>
        
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
