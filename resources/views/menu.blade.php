<li class="nav-item"{{request()->routeIs('home')?'active': ''}}>
    <a href="{{route('home')}}" class="nav-link">Главная</a>
</li>

<li class="nav-item"{{request()->routeIs('news.index')?'active': ''}}>
    <a href="{{route('news.index')}}" class="nav-link">Новости</a>
</li>

<li class="nav-item"{{request()->routeIs('news.category.index')?'active': ''}}>
    <a href="{{route('news.category.index')}}" class="nav-link">Категории</a>
</li>

<li class="nav-item"{{request()->routeIs('about')?'active': ''}}>
    <a href="{{route('about')}}" class="nav-link">О нас</a>
</li>

@guest()
@else
@if(Auth::user()->is_admin)
<li class="nav-item"{{request()->routeIs('admin.index')?'active': ''}}>
    <a href="{{route('admin.index')}}" class="nav-link">Админка</a>
</li>
@endif
@endguest











