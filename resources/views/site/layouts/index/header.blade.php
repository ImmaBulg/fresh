<header>
    <div class="head-block container">
        <div class="menu">
            <div class="menu-btn">
                <svg class='menu-btn-circle' >
                    <circle class='circle-ext circle-desk' r="8" cx="50%" cy="50%" fill="transparent" stroke="crimson" stroke-width="5" />
                    <circle class='circle-ext circle-mob' r="40%" cx="50%" cy="50%" fill="transparent" stroke="crimson" stroke-width="5" />
                    <!-- <circle class='circle-inter' r="6" cx="50%" cy="50%" fill="#57c8f3" stroke="crimson" stroke-width="5" /> -->
                </svg>
            </div>
            <div class="menu-blk">
                <div class="menu-block">
                    @forelse($menus as $menu)
                        <a class="menu-item" href="{{ $menu->outer_link ? '/' . $menu->slug : $menu->slug }}">{{ config('app.locale') === 'en' ? $menu->en_title : $menu->title }}</a>
                    @empty
                        <a class="menu-item" href="#">video</a>
                        <a class="menu-item" href="#">photo</a>
                        <a class="menu-item" href="#">the creators</a>
                        <a class="menu-item" href="#">about</a>
                        <a class="menu-item" href="#">archive</a>
                        <a class="menu-item" href="#">news</a>
                        <a class="menu-item" href="#">contact</a>
                    @endforelse
                </div>
            </div>
            <div class="menu-mob">
                <div class="logo-mob-blk">
                    <a class="fresh-logo logo-mob" href="/">fresh films</a>
                </div>
                <div class="menu-block-mob">
                    @forelse($menus as $menu)
                        <a class="menu-item" href="{{ $menu->outer_link ? '/' . $menu->slug : $menu->slug }}">{{ config('app.locale') === 'en' ? $menu->en_title : $menu->title }}</a>
                    @empty
                        <a class="menu-item" href="#">video</a>
                        <a class="menu-item" href="#">photo</a>
                        <a class="menu-item" href="#">the creators</a>
                        <a class="menu-item" href="#">about</a>
                        <a class="menu-item" href="#">archive</a>
                        <a class="menu-item" href="#">news</a>
                        <a class="menu-item" href="#">contact</a>
                    @endforelse
                </div>
            </div>
        </div>
        <a class="fresh-logo logo-desk" href="/">fresh films</a>
    </div>
    </div>
</header>
