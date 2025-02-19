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
</style>
{{-- <div class="chat-card"> --}}
<div class="">
    <div class="chat-container">
        <!-- Pesan yang diterima -->
        <div class="chat-message received">
            <img src="{{ asset('img/profilePicture/default.jpg') }}" alt="User" class="chat-avatar">
            <div>
                <p class="user-name">Nama</p>
                <div class="message-content">
                    <p>Halo, apa kabar?</p>
                    <span class="chat-time">10:05 AM</span>
                </div>
            </div>
        </div>

        <!-- Pesan yang dikirim -->
        <div class="chat-message sent">
            <div>
                <p class="user-name">Nama</p>
                <div class="message-content">
                    <p>Hai! Aku baik, bagaimana denganmu?</p>
                    <span class="chat-time">10:06 AM</span>
                </div>
            </div>
            <img src="{{ asset('img/profilePicture/default.jpg') }}" alt="User" class="chat-avatar">
        </div>

        <!-- Pesan yang tidak terkirim -->
        <div class="chat-message ">
            <p class="message-unsent"><i>Message unsent</i></p>
        </div>

        <div class="d-flex gap-2">
            <input type="text" class="form-control" placeholder="Type your message...">
            <button class="btn btn-primary">
                <i class='bx bx-send'></i>
            </button>
        </div>

    </div>
</div>
