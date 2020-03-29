<style>
    .message {
        border: double 4px red;
        margin: 10px;
        padding: 10px;
        background-color: aqua;
    }

    .msg_title {
        margin: 10px 20px;
        color: orange;
        font-size: 16pt;
        font-weight: bold;
    }

    .msg_content {
        margin: 10px 20px;
        color: purple;
        font-size: 12pt;
    }
</style>
<div class="message">
    <p class="msg_title">{{$msg_title}}</p>
    <p class="msg_content">{{$msg_content}}</p>
</div>