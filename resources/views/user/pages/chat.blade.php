@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('user.navbar.topnav', ['title' => 'Chat'])
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card ">
                    <div class="card-header">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="button-addon2" style="height:43px;">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ul class="contacts">
                            <li class="active">
                                <div class="d-flex bd-highlight hmif">
                                    <div class="img_cont">
                                        <img src="{{ Vite::asset('public/assets/img/informatika.png') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span id="hmif">HMIF</span>
                                        <p>Online</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex bd-highlight himafar">
                                    <div class="img_cont">
                                        <img src="{{ Vite::asset('public/assets/img/farmasi.png') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon offline"></span>
                                    </div>
                                    <div class="user_info">
                                        <span id="himafar">HIMAFAR</span>
                                        <p>Left 7 mins ago</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex bd-highlight biologi">
                                    <div class="img_cont">
                                        <img src="{{ Vite::asset('public/assets/img/biologi.png') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span id="biologi">Biologi</span>
                                        <p>Online</p>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex bd-highlight auni">
                                    <div class="img_cont">
                                        <img src="{{ Vite::asset('public/assets/img/team-2.jpg') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon offline"></span>
                                    </div>
                                    <div class="user_info">
                                        <span id="Khairul Auni">Khairul Auni</span>
                                        <p>Left 30 mins ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex bd-highlight sofia">
                                    <div class="img_cont">
                                        <img src="{{ Vite::asset('public/assets/img/team-1.jpg') }}"
                                            class="rounded-circle user_img">
                                        <span class="online_icon offline"></span>
                                    </div>
                                    <div class="user_info">
                                        <span id="adit">Aditya</span>
                                        <p>Left 50 mins ago</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-9 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight head">
                            <div class="img_cont">
                                <img src="{{ Vite::asset('public/assets/img/informatika.png') }}"
                                    class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div>
                            <div class="user_info ">
                                <span class="text-dark">HMIF</span>
                                <p class="text-secondary">Online</p>
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
                    {{-- membuat isi chat --}}
                    <div class="card-body msg_card_body">
                        <div class="d-flex justify-content-start mb-4">


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
    <div class="container-fluid py-4">
        @include('admin.layouts.partials.footer')
    </div>
    <script>
        // script tombol 3 kanan atas
        $(document).ready(function() {
            $('#action_menu_btn').click(function() {
                $('.action_menu').toggle();
            });
        });

        // membuat fungsi kirim pesan 
        // ambil elemen dengan kelas send_btn
        const sendBtn = document.querySelector('.send_btn');
        // ambil elemen dengan kelas msg_card_body
        const msgCardBody = document.querySelector('.msg_card_body');

        // tambahkan event listener pada sendBtn
        sendBtn.addEventListener('click', function() {
            // ambil nilai dari textarea dengan nama messages
            const message = document.querySelector('textarea[name="messages"]').value;

            // buat elemen baru untuk menampilkan pesan
            const messageElement = document.createElement('div');
            messageElement.classList.add('d-flex', 'justify-content-end', 'mb-4');
            messageElement.innerHTML = `
        <div class="msg_cotainer_send">
            ${message}
            <span class="msg_time_send">${new Date().toLocaleTimeString()}</span>
        </div>
        <div class="img_cont_msg">
            <img src="{{ Vite::asset('public/assets/img/informatika.png') }}" class="rounded-circle user_img_msg">
        </div>
    `;

            // tambahkan elemen baru ke dalam msgCardBody
            msgCardBody.appendChild(messageElement);

            // reset nilai textarea menjadi kosong
            document.querySelector('textarea[name="messages"]').value = '';
        });

        // tambahkan event listener pada textarea dengan nama messages
        document.querySelector('textarea[name="messages"]').addEventListener('keydown', function(event) {
            // cek apakah tombol yang ditekan adalah tombol "Enter"
            if (event.key === 'Enter') {
                // mencegah aksi default dari tombol "Enter" (yaitu membuat baris baru)
                event.preventDefault();

                // memanggil fungsi click pada sendBtn untuk mengirim pesan
                sendBtn.click();
            }
        });



        // Mendapatkan seluruh elemen dengan class "d-flex bd-highlight" yang terdapat dalam "card-body contacts_body"
        let contacts = document.querySelectorAll(".card-body.contacts_body .d-flex.bd-highlight");

        // Looping seluruh elemen yang telah didapatkan
        for (let i = 0; i < contacts.length; i++) {
            // Ketika salah satu elemen ditekan, maka jalankan fungsi changeContent
            contacts[i].addEventListener("click", changeContent);
        }

        //script mengubah icon di header chat

        function changeContent() {
            // Mendapatkan nilai text dari elemen dengan class "user_info" dan "user_info > span"
            let name = this.querySelector(".user_info > span").textContent;
            let status = this.querySelector(".user_info > p").textContent;

            // Mendapatkan url gambar dari elemen dengan class "img_cont > img"
            let imgUrl = this.querySelector(".img_cont > img").getAttribute("src");
            // Mendapatkan url icon dari elemen dengan class "img_cont > span"
            let classUrl = this.querySelector(".img_cont > span").getAttribute("class");


            // Mengubah konten dari elemen dengan class "head" sesuai dengan nilai yang telah didapatkan
            let head = document.querySelector(".head");
            head.querySelector(".img_cont > img").setAttribute("src", imgUrl);
            head.querySelector(".img_cont > span").setAttribute("class", classUrl);
            head.querySelector(".user_info > span").textContent = name;
            head.querySelector(".user_info > p").textContent = status;
        }
    </script>
    <style>
        .chat {
            margin-top: auto;
            margin-bottom: auto;
        }

        .card {
            height: 750px;
            border-radius: 15px !important;
            background-color: rgba(0, 0, 0, 0.6);
        }

        .contacts_body {
            padding: 0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }

        .contacts_body li:hover {
            cursor: pointer;
            background-color: black
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
        }

        .container {
            align-content: center;
        }

        .search {
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0, 0, 0, 0.3) !important;
            border: 0 !important;
            color: white !important;
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
            color: rgba(255, 255, 255, 0.5);
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
            top: 0px;
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
