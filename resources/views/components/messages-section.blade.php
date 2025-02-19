<style>
    .chat-card {
        width: 350px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        display: flex;
        flex-direction: column;
    }

    .chat-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .chat-message {
        display: flex;
        align-items: flex-end;
        max-width: 80%;
    }

    .received {
        align-self: flex-start;
        flex-direction: row;
    }

    .sent {
        align-self: flex-end;
        /* flex-direction: row-reverse; */
    }

    .chat-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        margin: 0 10px;
    }

    .message-content {
        background: #e5e5e5;
        padding-left: 12px;
        padding-right: 12px;
        padding-top: 1px;
        padding-bottom: 12px;
        border-radius: 15px;
        font-size: 14px;
        max-width: 350px;
        word-wrap: break-word;
    }

    .message-content p {
        margin-top: 0.8em;
        margin-bottom: 1px;
    }

    .sent .message-content {
        background: #007bff;
        color: white;
    }

    .chat-time {
        display: block;
        font-size: 10px;
        color: gray;
        text-align: right;
        margin-top: 3px;
    }

    .sent .chat-time {
        color: #d1e9ff;
        text-align: left;
        /* Biru muda agar terlihat di latar biru */
    }

    .user-name {
        font-size: 12px;
        margin-top: 1px;
        margin-bottom: 3px;
    }

    .sent .user-name {
        text-align: right;
    }

    .message-unsent {
        font-size: 14px;
        color: gray;
        text-align: center;
        width: 100%;
        /* Agar teks bisa rata tengah */
        display: flex;
        justify-content: center;
    }

    .chat-date {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }

    .date-bubble {
        background-color: #f1f1f1;
        border-radius: 50px;
        padding: 8px 20px;
        font-size: 14px;
        color: #333;
        font-weight: bold;
        text-transform: uppercase;
        border: 1px solid #ccc;
    }
</style>



<script>
    // Fungsi untuk format waktu
    function formatTime(dateString) {
        const date = new Date(dateString);
        let hours = date.getHours();
        let minutes = date.getMinutes();
        const ampm = hours >= 12 ? 'PM' : 'AM';

        hours = hours % 12;
        hours = hours ? hours : 12;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        return hours + ':' + minutes + ' ' + ampm;
    }

    function scrollToBottom() {
        var chatBody = $(".messages-card .card-body");
        chatBody.scrollTop(chatBody[0].scrollHeight);
    }


    // Fungsi untuk format tanggal
    function formatDate(dateString) {
        const date = new Date(dateString);
        const day = date.getDate();
        const month = date.getMonth() + 1; // Bulan dimulai dari 0
        const year = date.getFullYear();
        return `${day}/${month}/${year}`;
    }

    $(document).ready(function() {
        let toUser = "{{ $receiver->id }}"; // ID user yang diajak chat
        let fromUser = "{{ auth()->id() }}"; // ID user yang login

        let lastDate = null; // Menyimpan tanggal terakhir yang ditampilkan

        // Load messages setiap 1 detik
        function fetchMessages() {
            $.ajax({
                url: "{{ route('messages.fetch', $receiver->username) }}",
                method: "GET",
                success: function(data) {
                    $(".chat-container").html(""); // Kosongkan container
                    data.forEach(msg => {
                        let isSent = msg.from_user_id == fromUser;
                        let formattedTime = formatTime(msg.created_at);
                        let messageDate = formatDate(msg.created_at); // Format tanggal

                        // Jika tanggal berbeda dengan tanggal sebelumnya, tampilkan tanggal baru dalam bubble
                        if (lastDate !== messageDate) {
                            lastDate = messageDate;
                            $(".chat-container").append(`
                                <div class="chat-date">
                                    <span class="date-bubble">${messageDate}</span>
                                </div>
                            `);
                        }

                        let messageHtml = `
                            <div class="chat-message ${isSent ? 'sent' : 'received'}">
                                ${!isSent ? `<img src="${msg.profile_picture}" alt="User" class="chat-avatar">` : ""}
                                <div>
                                    <p class="user-name">${msg.from_user_name}</p>
                                    <div class="message-content">
                                        <p>${msg.message}</p>
                                        <span class="chat-time">${formattedTime}</span>
                                    </div>
                                </div>
                                ${isSent ? `<img src="${msg.profile_picture}" alt="User" class="chat-avatar">` : ""}
                            </div>
                        `;
                        $(".chat-container").append(messageHtml);
                    });
                }
            });
        }

        fetchMessages(); // Load pertama kali
        setInterval(fetchMessages, 1500); // Load setiap 3 detik

        // Kirim pesan
        $("#sendMessage").on("click", function() {
            let message = $("#messageInput").val();

            if (message.trim() !== "") {
                $.ajax({
                    url: "{{ route('messages.send') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        to_user_id: toUser,
                        message: message
                    },
                    success: function() {
                        $("#messageInput").val(""); // Bersihkan input
                        fetchMessages(); // Load ulang chat
                        scrollToBottom();

                    }
                });
            }


        });
    });
</script>


<div class="chat-container"></div>

{{-- <div class="mt-3 d-flex gap-2">
    <input type="text" id="messageInput" class="form-control" placeholder="Type your message...">
    <button class="btn btn-primary" id="sendMessage">
        <i class='bx bx-send'></i>
    </button>
</div> --}}
