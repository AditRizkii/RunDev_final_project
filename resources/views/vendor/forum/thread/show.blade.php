@extends ('forum::master', ['thread' => null, 'breadcrumbs_append' => [$thread->title], 'thread_title' =>
$thread->title])

@section('content')
    {{-- <div id="thread" class="v-thread">
        <div class="d-flex flex-column flex-md-row justify-content-between">
            <h2 class="flex-grow-1">{{ $thread->title }}</h2>

            <div>
                @if (Gate::allows('deleteThreads', $thread->category) && Gate::allows('delete', $thread))
                    @if ($thread->trashed())
                        <a href="#" class="btn btn-danger mr-3 mb-2" data-open-modal="perma-delete-thread">
                            <i data-feather="trash"></i> {{ trans('forum::general.perma_delete') }}
                        </a>
                    @else
                        <a href="#" class="btn btn-danger mr-3 mb-2" data-open-modal="delete-thread">
                            <i data-feather="trash"></i> {{ trans('forum::general.delete') }}
                        </a>
                    @endif
                @endif
                @if ($thread->trashed() && Gate::allows('restoreThreads', $thread->category) && Gate::allows('restore', $thread))
                    <a href="#" class="btn btn-secondary mb-2" data-open-modal="restore-thread">
                        <i data-feather="refresh-cw"></i> {{ trans('forum::general.restore') }}
                    </a>
                @endif

                @if (Gate::allows('lockThreads', $category) || Gate::allows('pinThreads', $category) || Gate::allows('rename', $thread) || Gate::allows('moveThreadsFrom', $category))
                    <div class="btn-group mb-2" role="group">
                        @if (!$thread->trashed())
                            @can('lockThreads', $category)
                                @if ($thread->locked)
                                    <a href="#" class="btn btn-secondary" data-open-modal="unlock-thread">
                                        <i data-feather="unlock"></i> {{ trans('forum::threads.unlock') }}
                                    </a>
                                @else
                                    <a href="#" class="btn btn-secondary" data-open-modal="lock-thread">
                                        <i data-feather="lock"></i> {{ trans('forum::threads.lock') }}
                                    </a>
                                @endif
                            @endcan
                            @can('pinThreads', $category)
                                @if ($thread->pinned)
                                    <a href="#" class="btn btn-secondary" data-open-modal="unpin-thread">
                                        <i data-feather="arrow-down"></i> {{ trans('forum::threads.unpin') }}
                                    </a>
                                @else
                                    <a href="#" class="btn btn-secondary" data-open-modal="pin-thread">
                                        <i data-feather="arrow-up"></i> {{ trans('forum::threads.pin') }}
                                    </a>
                                @endif
                            @endcan
                            @can('rename', $thread)
                                <a href="#" class="btn btn-secondary" data-open-modal="rename-thread">
                                    <i data-feather="edit-2"></i> {{ trans('forum::general.rename') }}
                                </a>
                            @endcan
                            @can('moveThreadsFrom', $category)
                                <a href="#" class="btn btn-secondary" data-open-modal="move-thread">
                                    <i data-feather="corner-up-right"></i> {{ trans('forum::general.move') }}
                                </a>
                            @endcan
                        @endif
                    </div>
                @endcan
            </div>
        </div>


        <div class="thread-badges">
            @if ($thread->trashed())
                <span class="badge rounded-pill bg-danger">{{ trans('forum::general.deleted') }}</span>
            @endif
            @if ($thread->pinned)
                <span class="badge rounded-pill bg-info">{{ trans('forum::threads.pinned') }}</span>
            @endif
            @if ($thread->locked)
                <span class="badge rounded-pill bg-warning">{{ trans('forum::threads.locked') }}</span>
            @endif
        </div>

        <hr>

        @if ((count($posts) > 1 || $posts->currentPage() > 1) && (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) && count($selectablePosts) > 0)
            <form :action="postActions[selectedPostAction]" method="POST">
                @csrf
                <input type="hidden" name="_method" :value="postActionMethods[selectedPostAction]" />
        @endif

        <div class="row mb-3">
            <div class="col col-xs-8">
                {{ $posts->links('forum::pagination') }}
            </div>
            <div class="col-md-auto text-end">
                @if (!$thread->trashed())
                    @can('reply', $thread)
                        <div class="btn-group" role="group">
                            <a href="{{ Forum::route('post.create', $thread) }}" class="btn btn-primary">
                                {{ trans('forum::general.new_reply') }}
                            </a>
                            <a href="#quick-reply" class="btn btn-primary">
                                {{ trans('forum::general.quick_reply') }}
                            </a>
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        @if ((count($posts) > 1 || $posts->currentPage() > 1) && (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) && count($selectablePosts) > 0)
            <div class="text-end pb-1">
                <div class="form-check">
                    <label for="selectAllPosts">
                        {{ trans('forum::posts.select_all') }}
                    </label>
                    <input type="checkbox" value="" id="selectAllPosts" class="align-middle" @click="toggleAll" :checked="selectedPosts.length == posts.data.length">
                </div>
            </div>
        @endif

        @foreach ($posts as $post)
            @include ('forum::post.partials.list', compact('post'))
        @endforeach

        @if ((count($posts) > 1 || $posts->currentPage() > 1) && (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) && count($selectablePosts) > 0)
                <div class="fixed-bottom-right pb-xs-0 pr-xs-0 pb-sm-3 pr-sm-3">
                    <transition name="fade">
                        <div class="card text-white bg-secondary shadow-sm" v-if="selectedPosts.length">
                            <div class="card-header text-center">
                                {{ trans('forum::general.with_selection') }}
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="bulk-actions">{{ trans_choice('forum::general.actions', 1) }}</label>
                                    </div>
                                    <select class="custom-select" id="bulk-actions" v-model="selectedPostAction">
                                        <option value="delete">{{ trans('forum::general.delete') }}</option>
                                        <option value="restore">{{ trans('forum::general.restore') }}</option>
                                    </select>
                                </div>

                                @if (config('forum.general.soft_deletes'))
                                    <div class="form-check mb-3" v-if="selectedPostAction == 'delete'">
                                        <input class="form-check-input" type="checkbox" name="permadelete" value="1" id="permadelete">
                                        <label class="form-check-label" for="permadelete">
                                            {{ trans('forum::general.perma_delete') }}
                                        </label>
                                    </div>
                                @endif

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary" @click="submitPosts">{{ trans('forum::general.proceed') }}</button>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </form>
        @endif

        {{ $posts->links('forum::pagination') }}

        @if (!$thread->trashed())
            @can('reply', $thread)
                <h3>{{ trans('forum::general.quick_reply') }}</h3>
                <div id="quick-reply">
                    <form method="POST" action="{{ Forum::route('post.store', $thread) }}">
                        @csrf

                        <div class="mb-3">
                            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-5">{{ trans('forum::general.reply') }}</button>
                        </div>
                    </form>
                </div>
            @endcan
        @endif
    </div>

    @if ($thread->trashed() && Gate::allows('restoreThreads', $thread->category) && Gate::allows('restore', $thread))
        @component('forum::modal-form')
            @slot('key', 'restore-thread')
            @slot('title', '<i data-feather="refresh-cw" class="text-muted"></i>' . trans('forum::general.restore'))
            @slot('route', Forum::route('thread.restore', $thread))
            @slot('method', 'POST')

            {{ trans('forum::general.generic_confirm') }}

            @slot('actions')
                <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
            @endslot
        @endcomponent
    @endif

    @if (Gate::allows('deleteThreads', $thread->category) && Gate::allows('delete', $thread))
        @component('forum::modal-form')
            @slot('key', 'delete-thread')
            @slot('title', '<i data-feather="trash" class="text-muted"></i>' . trans('forum::threads.delete'))
            @slot('route', Forum::route('thread.delete', $thread))
            @slot('method', 'DELETE')

            @if (config('forum.general.soft_deletes'))
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permadelete" value="1" id="permadelete">
                    <label class="form-check-label" for="permadelete">
                        {{ trans('forum::general.perma_delete') }}
                    </label>
                </div>
            @else
                {{ trans('forum::general.generic_confirm') }}
            @endif

            @slot('actions')
                <button type="submit" class="btn btn-danger">{{ trans('forum::general.proceed') }}</button>
            @endslot
        @endcomponent

        @if (config('forum.general.soft_deletes'))
            @component('forum::modal-form')
                @slot('key', 'perma-delete-thread')
                @slot('title', '<i data-feather="trash" class="text-muted"></i>' . trans_choice('forum::threads.perma_delete', 1))
                @slot('route', Forum::route('thread.delete', $thread))
                @slot('method', 'DELETE')

                <input type="hidden" name="permadelete" value="1" />

                {{ trans('forum::general.generic_confirm') }}

                @slot('actions')
                    <button type="submit" class="btn btn-danger">{{ trans('forum::general.proceed') }}</button>
                @endslot
            @endcomponent
        @endif
    @endif

    @if (!$thread->trashed())
        @can('lockThreads', $category)
            @if ($thread->locked)
                @component('forum::modal-form')
                    @slot('key', 'unlock-thread')
                    @slot('title', '<i data-feather="unlock" class="text-muted"></i> ' . trans('forum::threads.unlock'))
                    @slot('route', Forum::route('thread.unlock', $thread))
                    @slot('method', 'POST')

                    {{ trans('forum::general.generic_confirm') }}

                    @slot('actions')
                        <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                    @endslot
                @endcomponent
            @else
                @component('forum::modal-form')
                    @slot('key', 'lock-thread')
                    @slot('title', '<i data-feather="lock" class="text-muted"></i> ' . trans('forum::threads.lock'))
                    @slot('route', Forum::route('thread.lock', $thread))
                    @slot('method', 'POST')

                    {{ trans('forum::general.generic_confirm') }}

                    @slot('actions')
                        <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                    @endslot
                @endcomponent
            @endif
        @endcan

        @can('pinThreads', $category)
            @if ($thread->pinned)
                @component('forum::modal-form')
                    @slot('key', 'unpin-thread')
                    @slot('title', '<i data-feather="arrow-down" class="text-muted"></i> ' . trans('forum::threads.unpin'))
                    @slot('route', Forum::route('thread.unpin', $thread))
                    @slot('method', 'POST')

                    {{ trans('forum::general.generic_confirm') }}

                    @slot('actions')
                        <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                    @endslot
                @endcomponent
            @else
                @component('forum::modal-form')
                    @slot('key', 'pin-thread')
                    @slot('title', '<i data-feather="arrow-up" class="text-muted"></i> ' . trans('forum::threads.pin'))
                    @slot('route', Forum::route('thread.pin', $thread))
                    @slot('method', 'POST')

                    {{ trans('forum::general.generic_confirm') }}

                    @slot('actions')
                        <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                    @endslot
                @endcomponent
            @endif
        @endcan

        @can('rename', $thread)
            @component('forum::modal-form')
                @slot('key', 'rename-thread')
                @slot('title', '<i data-feather="edit-2" class="text-muted"></i> ' . trans('forum::general.rename'))
                @slot('route', Forum::route('thread.rename', $thread))
                @slot('method', 'POST')

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="new-title">{{ trans('forum::general.title') }}</label>
                    </div>
                    <input type="text" name="title" value="{{ $thread->title }}" class="form-control">
                </div>

                @slot('actions')
                    <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                @endslot
            @endcomponent
        @endcan

        @can('moveThreadsFrom', $category)
            @component('forum::modal-form')
                @slot('key', 'move-thread')
                @slot('title', '<i data-feather="corner-up-right" class="text-muted"></i> ' . trans('forum::general.move'))
                @slot('route', Forum::route('thread.move', $thread))
                @slot('method', 'POST')

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="category-id">{{ trans_choice('forum::categories.category', 1) }}</label>
                    </div>
                    <select name="category_id" id="category-id" class="form-select">
                        @include ('forum::category.partials.options', ['hide' => $thread->category])
                    </select>
                </div>

                @slot('actions')
                    <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                @endslot
            @endcomponent
        @endcan
    @endif

    <style>
    .thread-badges .badge
    {
        font-size: 100%;
    }
    </style>

    <script>
    new Vue({
        el: '.v-thread',
        name: 'Thread',
        data: {
            posts: @json($posts),
            selectablePosts: @json($selectablePosts),
            postActions: {
                'delete': "{{ Forum::route('bulk.post.delete') }}",
                'restore': "{{ Forum::route('bulk.post.restore') }}"
            },
            postActionMethods: {
                'delete': 'DELETE',
                'restore': 'POST'
            },
            selectedPostAction: 'delete',
            selectedPosts: [],
            selectedThreadAction: null
        },
        created ()
        {
            this.posts.data = this.posts.data.filter(post => post.sequence != 1);
        },
        methods: {
            toggleAll ()
            {
                this.selectedPosts = (this.selectedPosts.length < this.selectablePosts.length) ? this.selectablePosts : [];
            },
            submitThread (event)
            {
                if (this.threadActionMethods[this.selectedThreadAction] === 'DELETE' && ! confirm("{{ trans('forum::general.generic_confirm') }}"))
                {
                    event.preventDefault();
                }
            },
            submitPosts (event)
            {
                if (this.postActionMethods[this.selectedPostAction] === 'DELETE' && ! confirm("{{ trans('forum::general.generic_confirm') }}"))
                {
                    event.preventDefault();
                }
            }
        }
    });
    </script> --}}
    @include('user.navbar.topnav', ['title' => 'Forum'])
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

                        <div id="thread" class="v-thread">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <h2 class="flex-grow-1">{{ $thread->title }}</h2>

                                <div>
                                    @if (Gate::allows('deleteThreads', $thread->category) && Gate::allows('delete', $thread))
                                        @if ($thread->trashed())
                                            <a href="#" class="btn btn-danger mr-3 mb-2"
                                                data-open-modal="perma-delete-thread">
                                                <i data-feather="trash"></i> {{ trans('forum::general.perma_delete') }}
                                            </a>
                                        @else
                                            <a href="#" class="btn btn-danger mr-3 mb-2"
                                                data-open-modal="delete-thread">
                                                <i data-feather="trash"></i> {{ trans('forum::general.delete') }}
                                            </a>
                                        @endif
                                    @endif
                                    @if ($thread->trashed() && Gate::allows('restoreThreads', $thread->category) && Gate::allows('restore', $thread))
                                        <a href="#" class="btn btn-secondary mb-2" data-open-modal="restore-thread">
                                            <i data-feather="refresh-cw"></i> {{ trans('forum::general.restore') }}
                                        </a>
                                    @endif

                                    @if (Gate::allows('lockThreads', $category) ||
                                            Gate::allows('pinThreads', $category) ||
                                            Gate::allows('rename', $thread) ||
                                            Gate::allows('moveThreadsFrom', $category))
                                        <div class="btn-group mb-2  mt-3" role="group">
                                            @if (!$thread->trashed())
                                                @can('lockThreads', $category)
                                                    @if ($thread->locked)
                                                        <a href="#" class="btn btn-secondary"
                                                            data-open-modal="unlock-thread">
                                                            <i data-feather="unlock"></i> {{ trans('forum::threads.unlock') }}
                                                        </a>
                                                    @else
                                                        <a href="#" class="btn btn-secondary"
                                                            data-open-modal="lock-thread">
                                                            <i data-feather="lock"></i> {{ trans('forum::threads.lock') }}
                                                        </a>
                                                    @endif
                                                @endcan
                                                @can('pinThreads', $category)
                                                    @if ($thread->pinned)
                                                        <a href="#" class="btn btn-secondary"
                                                            data-open-modal="unpin-thread">
                                                            <i data-feather="arrow-down"></i>
                                                            {{ trans('forum::threads.unpin') }}
                                                        </a>
                                                    @else
                                                        <a href="#" class="btn btn-secondary"
                                                            data-open-modal="pin-thread">
                                                            <i data-feather="arrow-up"></i> {{ trans('forum::threads.pin') }}
                                                        </a>
                                                    @endif
                                                @endcan
                                                @can('rename', $thread)
                                                    <a href="#" class="btn btn-secondary" data-open-modal="rename-thread">
                                                        <i data-feather="edit-2"></i> {{ trans('forum::general.rename') }}
                                                    </a>
                                                @endcan
                                                @can('moveThreadsFrom', $category)
                                                    <a href="#" class="btn btn-secondary" data-open-modal="move-thread">
                                                        <i data-feather="corner-up-right"></i>
                                                        {{ trans('forum::general.move') }}
                                                    </a>
                                                @endcan
                                            @endif
                                        </div>
                                    @endcan
                            </div>
                        </div>


                        <div class="thread-badges">
                            @if ($thread->trashed())
                                <span class="badge rounded-pill bg-danger">{{ trans('forum::general.deleted') }}</span>
                            @endif
                            @if ($thread->pinned)
                                <span class="badge rounded-pill bg-info">{{ trans('forum::threads.pinned') }}</span>
                            @endif
                            @if ($thread->locked)
                                <span class="badge rounded-pill bg-warning">{{ trans('forum::threads.locked') }}</span>
                            @endif
                        </div>

                        <hr>

                        @if (
                            (count($posts) > 1 || $posts->currentPage() > 1) &&
                                (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) &&
                                count($selectablePosts) > 0)
                            <form :action="postActions[selectedPostAction]" method="POST">
                                @csrf
                                <input type="hidden" name="_method" :value="postActionMethods[selectedPostAction]" />
                        @endif

                        <div class="row mb-3">
                            <div class="col col-xs-8">
                                {{ $posts->links('forum::pagination') }}
                            </div>
                            <div class="col-md-auto text-end">
                                @if (!$thread->trashed())
                                    @can('reply', $thread)
                                        <div class="btn-group" role="group">
                                            <a href="{{ Forum::route('post.create', $thread) }}" class="btn btn-primary">
                                                {{ trans('forum::general.new_reply') }}
                                            </a>
                                            <a href="#quick-reply" class="btn btn-primary">
                                                {{ trans('forum::general.quick_reply') }}
                                            </a>
                                        </div>
                                    @endcan
                                @endif
                            </div>
                        </div>

                        @if (
                            (count($posts) > 1 || $posts->currentPage() > 1) &&
                                (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) &&
                                count($selectablePosts) > 0)
                            <div class="text-end pb-1">
                                <div class="form-check">
                                    <label for="selectAllPosts">
                                        {{ trans('forum::posts.select_all') }}
                                    </label>
                                    <input type="checkbox" value="" id="selectAllPosts" class="align-middle"
                                        @click="toggleAll" :checked="selectedPosts.length == posts.data.length">
                                </div>
                            </div>
                        @endif

                        @foreach ($posts as $post)
                            @include ('forum::post.partials.list', compact('post'))
                        @endforeach

                        @if (
                            (count($posts) > 1 || $posts->currentPage() > 1) &&
                                (Gate::allows('deletePosts', $thread) || Gate::allows('restorePosts', $thread)) &&
                                count($selectablePosts) > 0)
                            <div class="fixed-bottom-right pb-xs-0 pr-xs-0 pb-sm-3 pr-sm-3">
                                <transition name="fade">
                                    <div class="card text-white bg-secondary shadow-sm" v-if="selectedPosts.length">
                                        <div class="card-header text-center">
                                            {{ trans('forum::general.with_selection') }}
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text"
                                                        for="bulk-actions">{{ trans_choice('forum::general.actions', 1) }}</label>
                                                </div>
                                                <select class="custom-select" id="bulk-actions"
                                                    v-model="selectedPostAction">
                                                    <option value="delete">{{ trans('forum::general.delete') }}
                                                    </option>
                                                    <option value="restore">{{ trans('forum::general.restore') }}
                                                    </option>
                                                </select>
                                            </div>

                                            @if (config('forum.general.soft_deletes'))
                                                <div class="form-check mb-3" v-if="selectedPostAction == 'delete'">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="permadelete" value="1" id="permadelete">
                                                    <label class="form-check-label" for="permadelete">
                                                        {{ trans('forum::general.perma_delete') }}
                                                    </label>
                                                </div>
                                            @endif

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary"
                                                    @click="submitPosts">{{ trans('forum::general.proceed') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                            </form>
                        @endif

                        {{ $posts->links('forum::pagination') }}

                        @if (!$thread->trashed())
                            @can('reply', $thread)
                                <h3>{{ trans('forum::general.quick_reply') }}</h3>
                                <div id="quick-reply">
                                    <form method="POST" action="{{ Forum::route('post.store', $thread) }}">
                                        @csrf

                                        <div class="mb-3">
                                            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                                        </div>

                                        <div class="text-end">
                                            <button type="submit"
                                                class="btn btn-primary px-5">{{ trans('forum::general.reply') }}</button>
                                        </div>
                                    </form>
                                </div>
                            @endcan
                        @endif
                    </div>

                    @if ($thread->trashed() && Gate::allows('restoreThreads', $thread->category) && Gate::allows('restore', $thread))
                        @component('forum::modal-form')
                            @slot('key', 'restore-thread')
                            @slot('title', '<i data-feather="refresh-cw" class="text-muted"></i>' .
                                trans('forum::general.restore'))
                                @slot('route', Forum::route('thread.restore', $thread))
                                @slot('method', 'POST')

                                {{ trans('forum::general.generic_confirm') }}

                                @slot('actions')
                                    <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                @endslot
                            @endcomponent
                        @endif

                        @if (Gate::allows('deleteThreads', $thread->category) && Gate::allows('delete', $thread))
                            @component('forum::modal-form')
                                @slot('key', 'delete-thread')
                                @slot('title', '<i data-feather="trash" class="text-muted"></i>' .
                                    trans('forum::threads.delete'))
                                    @slot('route', Forum::route('thread.delete', $thread))
                                    @slot('method', 'DELETE')

                                    @if (config('forum.general.soft_deletes'))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permadelete" value="1"
                                                id="permadelete">
                                            <label class="form-check-label" for="permadelete">
                                                {{ trans('forum::general.perma_delete') }}
                                            </label>
                                        </div>
                                    @else
                                        {{ trans('forum::general.generic_confirm') }}
                                    @endif

                                    @slot('actions')
                                        <button type="submit" class="btn btn-danger">{{ trans('forum::general.proceed') }}</button>
                                    @endslot
                                @endcomponent

                                @if (config('forum.general.soft_deletes'))
                                    @component('forum::modal-form')
                                        @slot('key', 'perma-delete-thread')
                                        @slot('title', '<i data-feather="trash" class="text-muted"></i>' .
                                            trans_choice('forum::threads.perma_delete', 1))
                                            @slot('route', Forum::route('thread.delete', $thread))
                                            @slot('method', 'DELETE')

                                            <input type="hidden" name="permadelete" value="1" />

                                            {{ trans('forum::general.generic_confirm') }}

                                            @slot('actions')
                                                <button type="submit"
                                                    class="btn btn-danger">{{ trans('forum::general.proceed') }}</button>
                                            @endslot
                                        @endcomponent
                                    @endif
                                @endif

                                @if (!$thread->trashed())
                                    @can('lockThreads', $category)
                                        @if ($thread->locked)
                                            @component('forum::modal-form')
                                                @slot('key', 'unlock-thread')
                                                @slot('title', '<i data-feather="unlock" class="text-muted"></i> ' .
                                                    trans('forum::threads.unlock'))
                                                    @slot('route', Forum::route('thread.unlock', $thread))
                                                    @slot('method', 'POST')

                                                    {{ trans('forum::general.generic_confirm') }}

                                                    @slot('actions')
                                                        <button type="submit"
                                                            class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                    @endslot
                                                @endcomponent
                                            @else
                                                @component('forum::modal-form')
                                                    @slot('key', 'lock-thread')
                                                    @slot('title', '<i data-feather="lock" class="text-muted"></i> ' .
                                                        trans('forum::threads.lock'))
                                                        @slot('route', Forum::route('thread.lock', $thread))
                                                        @slot('method', 'POST')

                                                        {{ trans('forum::general.generic_confirm') }}

                                                        @slot('actions')
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                        @endslot
                                                    @endcomponent
                                                @endif
                                            @endcan

                                            @can('pinThreads', $category)
                                                @if ($thread->pinned)
                                                    @component('forum::modal-form')
                                                        @slot('key', 'unpin-thread')
                                                        @slot('title', '<i data-feather="arrow-down" class="text-muted"></i> ' .
                                                            trans('forum::threads.unpin'))
                                                            @slot('route', Forum::route('thread.unpin', $thread))
                                                            @slot('method', 'POST')

                                                            {{ trans('forum::general.generic_confirm') }}

                                                            @slot('actions')
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                            @endslot
                                                        @endcomponent
                                                    @else
                                                        @component('forum::modal-form')
                                                            @slot('key', 'pin-thread')
                                                            @slot('title', '<i data-feather="arrow-up" class="text-muted"></i> ' .
                                                                trans('forum::threads.pin'))
                                                                @slot('route', Forum::route('thread.pin', $thread))
                                                                @slot('method', 'POST')

                                                                {{ trans('forum::general.generic_confirm') }}

                                                                @slot('actions')
                                                                    <button type="submit"
                                                                        class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                                @endslot
                                                            @endcomponent
                                                        @endif
                                                    @endcan

                                                    @can('rename', $thread)
                                                        @component('forum::modal-form')
                                                            @slot('key', 'rename-thread')
                                                            @slot('title', '<i data-feather="edit-2" class="text-muted"></i> ' .
                                                                trans('forum::general.rename'))
                                                                @slot('route', Forum::route('thread.rename', $thread))
                                                                @slot('method', 'POST')

                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <label class="input-group-text"
                                                                            for="new-title">{{ trans('forum::general.title') }}</label>
                                                                    </div>
                                                                    <input type="text" name="title" value="{{ $thread->title }}" class="form-control">
                                                                </div>

                                                                @slot('actions')
                                                                    <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                                @endslot
                                                            @endcomponent
                                                        @endcan

                                                        @can('moveThreadsFrom', $category)
                                                            @component('forum::modal-form')
                                                                @slot('key', 'move-thread')
                                                                @slot('title', '<i data-feather="corner-up-right" class="text-muted"></i> ' .
                                                                    trans('forum::general.move'))
                                                                    @slot('route', Forum::route('thread.move', $thread))
                                                                    @slot('method', 'POST')

                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <label class="input-group-text"
                                                                                for="category-id">{{ trans_choice('forum::categories.category', 1) }}</label>
                                                                        </div>
                                                                        <select name="category_id" id="category-id" class="form-select">
                                                                            @include (
                                                                                'forum::category.partials.options',
                                                                                ['hide' => $thread->category]
                                                                            )
                                                                        </select>
                                                                    </div>

                                                                    @slot('actions')
                                                                        <button type="submit" class="btn btn-primary">{{ trans('forum::general.proceed') }}</button>
                                                                    @endslot
                                                                @endcomponent
                                                            @endcan
                                                        @endif

                                                        <style>
                                                            .thread-badges .badge {
                                                                font-size: 100%;
                                                            }
                                                        </style>

                                                        <script>
                                                            new Vue({
                                                                el: '.v-thread',
                                                                name: 'Thread',
                                                                data: {
                                                                    posts: @json($posts),
                                                                    selectablePosts: @json($selectablePosts),
                                                                    postActions: {
                                                                        'delete': "{{ Forum::route('bulk.post.delete') }}",
                                                                        'restore': "{{ Forum::route('bulk.post.restore') }}"
                                                                    },
                                                                    postActionMethods: {
                                                                        'delete': 'DELETE',
                                                                        'restore': 'POST'
                                                                    },
                                                                    selectedPostAction: 'delete',
                                                                    selectedPosts: [],
                                                                    selectedThreadAction: null
                                                                },
                                                                created() {
                                                                    this.posts.data = this.posts.data.filter(post => post.sequence != 1);
                                                                },
                                                                methods: {
                                                                    toggleAll() {
                                                                        this.selectedPosts = (this.selectedPosts.length < this.selectablePosts.length) ? this
                                                                            .selectablePosts : [];
                                                                    },
                                                                    submitThread(event) {
                                                                        if (this.threadActionMethods[this.selectedThreadAction] === 'DELETE' && !confirm(
                                                                                "{{ trans('forum::general.generic_confirm') }}")) {
                                                                            event.preventDefault();
                                                                        }
                                                                    },
                                                                    submitPosts(event) {
                                                                        if (this.postActionMethods[this.selectedPostAction] === 'DELETE' && !confirm(
                                                                                "{{ trans('forum::general.generic_confirm') }}")) {
                                                                            event.preventDefault();
                                                                        }
                                                                    }
                                                                }
                                                            });
                                                        </script>
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
                                @stop
