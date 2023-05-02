@extends('user.app', ['class' => 'g-sidenav-show bg-gray-100'])


@section('content')
    @include('user.navbar.topnav', ['title' => 'Chat']) 


 
<!-- Chat box -->
<div class="chat-box">
  <div class="chat-header">
    <h3>Chat</h3>
    <button id="close-chat-btn">X</button>
  </div>
  <div class="chat-body"></div>
  <form class="chat-form">
    <input type="text" placeholder="Type your message...">
    <button type="submit">Kirim</button>
  </form>
</div>

<!-- Button to open chat box -->
<button id="open-chat-btn">Open Chat</button>

<!-- CSS Styles for chat box -->
<style>

  .message-container {
  display: flex;
  justify-content: space-between;
  margin: 5px;
}

.user {
  justify-content: flex-end;
}

.bot p {
  color: #fff;
  background-color: #A5D7E8;
  border-radius: 10px;
  padding: 5px 10px;
}

.user p {
  color: #fff;
  background-color: #4285f4;
  border-radius: 10px;
  padding: 5px 10px;
}

  .chat-box {
    position: fixed;
    right: 0px;
    bottom: 20px;
    width: 1645px;
    height: 865px;
    background-color: #fff;
    border: 1px solid #ccc;
    display: none;
  }
  
  .chat-box .chat-header {
    background-color: #A5D7E8;
    color: #fff;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .chat-box .chat-header h3 {
    margin: 0;
    font-size: 1.2rem;
    font-weight: bold;
  }
  
  .chat-box .chat-header button {
    font-size: 1.5rem;
    font-weight: bold;
    color: #fff;
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
  }
  
  .chat-box .chat-body {
    height: 80%;
    overflow-y: scroll;
    padding: 10px;
  }
  
  .chat-box .chat-form {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
  }
  
  .chat-box .chat-form input[type="text"] {
    flex-grow: 1;
    margin-right: 10px;
    border: 1px solid #ccc;
    padding: 5px;
    outline: none;
  }
  
  .chat-box .chat-form button[type="submit"] {
    font-size: 1rem;
    font-weight: bold;
    color: #fff;
    background-color: #4285f4;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    outline: none;
  }
  
  /* Styles for Open Chat button */
  #open-chat-btn {
    position: fixed;
    right: 100px;
    bottom: 30px;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px;
    border: none;
    background-color: #4285f4;
    color: #fff;
    cursor: pointer;
    outline: none;
  }

#open-chat-btn:hover,
#open-chat-btn:focus {
  background-color: #3367d6;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
}

</style>

<!-- JavaScript code for chat box -->
<script>
  const openChatBtn = document.querySelector('#open-chat-btn');
const closeChatBtn = document.querySelector('#close-chat-btn');
const chatBox = document.querySelector('.chat-box');
const chatBody = document.querySelector('.chat-body');
const chatForm = document.querySelector('.chat-form');

function addMessage(message, sender) {
  const messageContainer = document.createElement('div');
  const p = document.createElement('p');
  p.textContent = message;
  messageContainer.appendChild(p);
  messageContainer.classList.add('message-container', sender);

  if (sender === 'user') {
    setTimeout(() => {
      const replyText = `ada yang bisa saya bantu ?`;
      const replyMessageContainer = document.createElement('div');
      const replyP = document.createElement('p');
      replyP.textContent = replyText;
      replyMessageContainer.appendChild(replyP);
      replyMessageContainer.classList.add('message-container', 'bot');

      chatBody.appendChild(replyMessageContainer);

      chatBody.scrollTop = chatBody.scrollHeight;
    }, 1000);
  }

  chatBody.appendChild(messageContainer);

  chatBody.scrollTop = chatBody.scrollHeight;
}

chatForm.addEventListener('submit', function(e) {
  e.preventDefault();
  const input = this.querySelector('input[type="text"]');
  const message = input.value;
  input.value = '';
  addMessage(message, 'user');
});

openChatBtn.addEventListener('click', function() {
  chatBox.style.display = 'block';
});

closeChatBtn.addEventListener('click', function() {
  chatBox.style.display = 'none';
});


</script>

@endsection

@push('js')
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
