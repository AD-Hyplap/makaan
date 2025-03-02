<x-layouts.app>
    @auth
    <div class="container-fluid header bg-white pt-5">
        <div class="row pt-5 my-5">
            <h2 class="display-2">Profile</h2>
            <h4>{{Auth::user()->username}}</h4>
            <h4>{{Auth::user()->email}}</h4>
        </div>
    </div>
    @endauth
</x-layouts.app>
