@extends ('forum::master', ['category' => null, 'thread' => null, 'breadcrumbs_append' => [trans('forum::general.manage')]])

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

                    <div class="d-flex flex-row justify-content-between mb-2">
                        <h2 class="flex-grow-1">{{ trans('forum::general.manage') }}</h2>
                
                        @can ('createCategories')
                            <button type="button" class="btn btn-primary" data-open-modal="create-category">
                                {{ trans('forum::categories.create') }}
                            </button>
                
                            @include ('forum::category.modals.create')
                        @endcan
                    </div>
                
                    <div class="v-manage-categories">
                        <draggable-category-list :categories="categories"></draggable-category-list>
                
                        <transition name="fade">
                            <div v-show="changesApplied" class="alert alert-success mt-3" role="alert">
                                {{ trans('forum::general.changes_applied') }}
                            </div>
                        </transition>
                
                        <div class="text-end py-3">
                            <button type="button" class="btn btn-primary px-5" :disabled="isSavingDisabled" @click="onSave">
                                {{ trans('forum::general.save') }}
                            </button>
                        </div>
                    </div>
                
                    <script type="text/x-template" id="draggable-category-list-template">
                        <draggable tag="ul" class="list-group" :list="categories" group="categories" :invertSwap="true" :emptyInsertThreshold="14">
                            <li class="list-group-item" v-for="category in categories" :data-id="category.id" :key="category.id">
                                <a class="float-end btn btn-sm btn-danger ml-2" :href="`${category.route}#modal=delete-category`">{{ trans('forum::general.delete') }}</a>
                                <a class="float-end btn btn-sm btn-link ml-2" :href="`${category.route}#modal=edit-category`">{{ trans('forum::general.edit') }}</a>
                                <strong :style="{ color: category.color }">@{{ category.title }}</strong>
                                <div class="text-muted">@{{ category.description }}</div>
                
                                <draggable-category-list :categories="category.children"></draggable-category-list>
                            </li>
                        </draggable>
                    </script>
                
                    <script>
                    var draggableCategoryList = {
                        name: 'draggable-category-list',
                        template: '#draggable-category-list-template',
                        props: ['categories']
                    };
                
                    new Vue({
                        el: '.v-manage-categories',
                        name: 'ManageCategories',
                        components: {
                            draggableCategoryList
                        },
                        data: {
                            categories: @json($categories),
                            isSavingDisabled: true,
                            changesApplied: false
                        },
                        watch: {
                            categories: {
                                handler: function (categories) {
                                    this.isSavingDisabled = false;
                                },
                                deep: true
                            }
                        },
                        methods: {
                            onSave ()
                            {
                                this.isSavingDisabled = true;
                                this.changesApplied = false;
                
                                var payload = { categories: this.categories };
                                axios.post('{{ route('forum.bulk.category.manage') }}', payload)
                                    .then(response => {
                                        this.changesApplied = true;
                                        setTimeout(() => this.changesApplied = false, 3000);
                                    })
                                    .catch(error => {
                                        this.isSavingDisabled = false;
                                        console.log(error);
                                    });
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

    {{-- <div class="d-flex flex-row justify-content-between mb-2">
        <h2 class="flex-grow-1">{{ trans('forum::general.manage') }}</h2>

        @can ('createCategories')
            <button type="button" class="btn btn-primary" data-open-modal="create-category">
                {{ trans('forum::categories.create') }}
            </button>

            @include ('forum::category.modals.create')
        @endcan
    </div>

    <div class="v-manage-categories">
        <draggable-category-list :categories="categories"></draggable-category-list>

        <transition name="fade">
            <div v-show="changesApplied" class="alert alert-success mt-3" role="alert">
                {{ trans('forum::general.changes_applied') }}
            </div>
        </transition>

        <div class="text-end py-3">
            <button type="button" class="btn btn-primary px-5" :disabled="isSavingDisabled" @click="onSave">
                {{ trans('forum::general.save') }}
            </button>
        </div>
    </div>

    <script type="text/x-template" id="draggable-category-list-template">
        <draggable tag="ul" class="list-group" :list="categories" group="categories" :invertSwap="true" :emptyInsertThreshold="14">
            <li class="list-group-item" v-for="category in categories" :data-id="category.id" :key="category.id">
                <a class="float-end btn btn-sm btn-danger ml-2" :href="`${category.route}#modal=delete-category`">{{ trans('forum::general.delete') }}</a>
                <a class="float-end btn btn-sm btn-link ml-2" :href="`${category.route}#modal=edit-category`">{{ trans('forum::general.edit') }}</a>
                <strong :style="{ color: category.color }">@{{ category.title }}</strong>
                <div class="text-muted">@{{ category.description }}</div>

                <draggable-category-list :categories="category.children"></draggable-category-list>
            </li>
        </draggable>
    </script>

    <script>
    var draggableCategoryList = {
        name: 'draggable-category-list',
        template: '#draggable-category-list-template',
        props: ['categories']
    };

    new Vue({
        el: '.v-manage-categories',
        name: 'ManageCategories',
        components: {
            draggableCategoryList
        },
        data: {
            categories: @json($categories),
            isSavingDisabled: true,
            changesApplied: false
        },
        watch: {
            categories: {
                handler: function (categories) {
                    this.isSavingDisabled = false;
                },
                deep: true
            }
        },
        methods: {
            onSave ()
            {
                this.isSavingDisabled = true;
                this.changesApplied = false;

                var payload = { categories: this.categories };
                axios.post('{{ route('forum.bulk.category.manage') }}', payload)
                    .then(response => {
                        this.changesApplied = true;
                        setTimeout(() => this.changesApplied = false, 3000);
                    })
                    .catch(error => {
                        this.isSavingDisabled = false;
                        console.log(error);
                    });
            }
        }
    });
    </script> --}}
@stop