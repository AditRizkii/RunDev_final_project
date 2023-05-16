@extends ('forum::master', ['breadcrumbs_append' => [trans_choice('forum::posts.restore', 1)]])

@section ('content')
@include('user.navbar.topnav', ['title' => 'forum'])
<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 col-xl-12 chat">
            <div class="card">
                <div class="card-header msg_head bg-light">
                    <div class="d-flex bd-highlight">
                        <div class="assets/img/hehe.png">
                            <img src="{{ Vite::asset('public/assets/img/hehe.png') }}" class="rounded-circle user_img">
                        </div>
                        <div class="user_info ">
                            <h2 class="text-dark align-middle">Forum Diskusi</h2>
                        </div>
                    </div>
                    <span id="action_menu_btn" class="mt-2 mx-4"><i class="fas fa-ellipsis-v"
                            style="color: #736ca7;"></i></span>
                    <div class="action_menu">
                        <ul>
                            <li><i class="fas fa-user-circle"></i><a class="text-white"
                                    href="{{ url(config('forum.web.router.prefix')) }}">{{ trans('forum::general.index') }}</a>
                            </li>
                            <li><i class="fas fa-users"></i><a class="text-white"
                                    href="{{ route('forum.recent') }}">{{ trans('forum::threads.recent') }}</a></li>
                            <li><i class="fas fa-plus"></i><a class="text-white"
                                    href="{{ route('forum.unread') }}">{{ trans('forum::threads.unread_updated') }}</a>
                            </li>
                            @can('moveCategories')
                                <li><i class="fas fa-ban"></i><a class="text-white"
                                        href="{{ route('forum.category.manage') }}">{{ trans('forum::general.manage') }}</a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </div>

                <div class="card-body msg_card_body">

                    <div id="delete-post">
                        <h2 class="flex-grow-1">{{ trans_choice('forum::posts.restore', 1) }}</h2>
                
                        <hr>
                
                        @include ('forum::post.partials.list', ['post' => $post, 'single' => true])
                
                        <form method="POST" action="{{ Forum::route('post.restore', $post) }}">
                            @csrf
                            @method('POST')
                            
                            <div class="card mb-3">
                                <div class="card-body">
                                    {{ trans('forum::general.generic_confirm') }}
                                </div>
                            </div>
                
                            <div class="text-end">
                                <a href="{{ URL::previous() }}" class="btn btn-link">{{ trans('forum::general.cancel') }}</a>
                                <button type="submit" class="btn btn-primary px-5">{{ trans('forum::general.restore') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#action_menu_btn').click(function() {
            $('.action_menu').toggle();
        });
    });
</script>
<style>
    #action_menu_btn {
        position: absolute;
        right: 10px;
        top: 10px;
        color: white;
        cursor: pointer;
        font-size: 20px;
    }

    .action_menu {
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
        margin: 0 30px;
    }

    .action_menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .action_menu ul li {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }

    .action_menu ul li i {
        padding-right: 10px;

    }

    .action_menu ul li:hover {
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.2);
    }
</style>
    {{-- <div id="delete-post">
        <h2 class="flex-grow-1">{{ trans_choice('forum::posts.restore', 1) }}</h2>

        <hr>

        @include ('forum::post.partials.list', ['post' => $post, 'single' => true])

        <form method="POST" action="{{ Forum::route('post.restore', $post) }}">
            @csrf
            @method('POST')
            
            <div class="card mb-3">
                <div class="card-body">
                    {{ trans('forum::general.generic_confirm') }}
                </div>
            </div>

            <div class="text-end">
                <a href="{{ URL::previous() }}" class="btn btn-link">{{ trans('forum::general.cancel') }}</a>
                <button type="submit" class="btn btn-primary px-5">{{ trans('forum::general.restore') }}</button>
            </div>
        </form>
    </div> --}}
@stop
