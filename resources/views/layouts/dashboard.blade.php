<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <h1>Artist Dash board</h1>
    <p>Welcome to your dashboard! Here you can manage your profile, artworks, and more.</p>
    <div class="mt-4">
        <h2 class="text-lg font-semibold">Profile Information</h2>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
    </div>
    <a href="{{ route('logout') }}">Logout</a>
</div>
