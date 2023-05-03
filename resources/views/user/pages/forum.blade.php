@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'forum'])
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-8 col-xl-9 chat">
                <div class="card">
                    <div class="card-header msg_head bg-light">
                        <div class="d-flex bd-highlight">
                            <div class="assets/img/hehe.png">
                                <img src="{{ Vite::asset('public/assets/img/hehe.png') }}"
                                    class="rounded-circle user_img">
                            </div>
                            <div class="user_info ">
                                <span class="text-dark">FORUM DISKUSI</span>
                                <p class="text-secondary">8 organisasi </p>
                            </div>
                        </div>
                        <span id="action_menu_btn" class="mt-2 mx-4"><i class="fas fa-ellipsis-v"
                                style="color: #736ca7;"></i></span>
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to close friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-body msg_card_body">
                        <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">HIMASTA</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/statistika.png" class="rounded-circle user_img_msg">
                            </div>

                            <div class="msg_cotainer">
                                Selamat pagi kawan kawan semua, apakah sudah ada kabar 
                                <br>lanjutan mengenai pendaftaran POMMIPA?
                                <span class="msg_time">8:40 AM, Today</span>
                            </div>

                        </div>

                         <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">HMMI</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/hmmi.png" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Sudah di buka menurut postingan di Instagram BEM
                                <span class="msg_time">9:00 AM, Today</span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mb-4">
                            <div class="msg_cotainer_send">
                                ya benar,kami sudah mendaftar 
                                <span class="msg_time_send">9:05 AM, Today</span>
                            </div>
                            <div class="img_cont_msg">
                                <img src="assets/img/team-2.jpg" class="rounded-circle user_img_msg">
                            </div>
                        </div>

                             <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">HIMAFIS</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/fisika.png" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                kami juga sudah mendaftarkan beberapa cabor 
                                <span class="msg_time">9:07 AM, Today</span>
                            </div>
                        </div>


                             <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">HIMAFAR</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/farmasi.png" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                wahhh,sudah di buka ya? terimakasih infonya
                                <span class="msg_time">9:12 AM, Today</span>
                            </div>
                        </div>

                             <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">BEM FMIPA</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/bem.png" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Benar, untuk pendaftaran pom sudah di buka ya teman-teman.
                                <br>Untuk kabar lebih lanjut bisa pantau instagram bem fmipa ya
                                <span class="msg_time">9:15 AM, Today</span>
                            </div>
                        </div>

                         <div class="">
                            <span class="" style="padding-left: 60px; font-weight: bold;">SOFIA</span>
                        </div>

                        <div class="d-flex justify-content-start mb-4">
                            <div class="img_cont_msg">
                                <img src="assets/img/ivana-square.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Baik terimakasih Infonya
                                <span class="msg_time">9:20 AM, Today</span>
                            </div>
                        </div>

                    </div> 
                    
                    <div class="card-footer">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="messages" class="form-control type_msg" placeholder="Type your message..."></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        @include('admin.layouts.partials.footer')
    </div>
    <script>
        $(document).ready(function() {
            $('#action_menu_btn').click(function() {
                $('.action_menu').toggle();
            });
        });
    </script>
    <style>
        .chat {
            margin-top: 70px;
            margin-bottom: auto;
        }

        .card {
            height: 750px;
            border-radius: 15px !important;
            background-color: light-subtle;
            margin-left: -60px;
            margin-right: -60px;
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .msg_card_body {
            overflow-y: auto;
        }

        .card-header {
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
            
            
        }

        .card-footer {
            border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
            position: sticky;
            bottom: 0;
            background-color: rgba(32, 32, 32, 0);
        }

        .container {
            align-content: center ;
        }


        .search:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .type_msg {
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            height: 50px !important;
            overflow-y: auto;
        }

        .type_msg:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }

        .attach_btn {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
            height: 50px;
        }

        .send_btn {
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
            height: 50px;
        }

        .search_btn {
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
            cursor: pointer;
        }

        .contacts {
            list-style: none;
            padding: 0;
        }

        .contacts li {
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }

        .active {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .user_img {
            height: 70px;
            width: 70px;
            border: 1.5px solid #f5f6fa;

        }

        .user_img_msg {
            height: 40px;
            width: 40px;
            border: 1.5px solid #f5f6fa;

        }

        .img_cont {
            position: relative;
            height: 70px;
            width: 70px;
        }

        .img_cont_msg {
            height: 40px;
            width: 40px;
        }

        .online_icon {
            position: absolute;
            height: 15px;
            width: 15px;
            background-color: #4cd137;
            border-radius: 50%;
            bottom: 0.2em;
            right: 0.4em;
            border: 1.5px solid white;
        }

        .offline {
            background-color: #c23616 !important;
        }

        .user_info {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 15px;
        }

        .user_info span {
            font-size: 20px;
            color: white;
        }

        .user_info p {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.6);
        }

        .video_cam {
            margin-left: 50px;
            margin-top: 5px;
        }

        .video_cam span {
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-right: 20px;
        }

        .msg_cotainer {
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
            border-radius: 25px;
            background-color: #82ccdd;
            padding: 10px;
            position: relative;
        }

        .msg_cotainer_send {
            margin-top: auto;
            margin-bottom: auto;
            margin-right: 10px;
            border-radius: 25px;
            background-color: #78e08f;
            padding: 10px;
            position: relative;
        }

        .msg_time {
            position: absolute;
            left: 0;
            bottom: -15px;
            color: rgba(96, 96, 96, 0.5);
            font-size: 10px;
        }

        .msg_time_send {
            position: absolute;
            right: 0;
            bottom: -15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
        }

        .msg_head {
            position: relative;
            margin: 0;
            padding: 0;
        }

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

        @media(max-width: 576px) {
            .contacts_card {
                margin-bottom: 10px !important;
            }
        }
    </style>
@endsection
