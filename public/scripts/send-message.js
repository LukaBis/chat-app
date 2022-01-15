$("#send-message-button").click(function(e){
    e.preventDefault();

    var text = $("#text-message").val();
    var chatUserId = $("#chat-user-id").val();

    // remove text from input
    $("#text-message").val("");

    // sending the request
    $.post(
        "/message",
        {
            "_token": $('meta[name=csrf-token]').attr('content'),
            "text": text,
            "chatUserId": chatUserId
        },
        function(data, status) {
            if (status == "success") {
                add_user_text_message_to_chat(text);
            }
        }
    );
});

function add_user_text_message_to_chat(text) {
    var htmlViewMessage = `
        <div class="chats chats-right">
            <div class="chat-content">
                <div class="message-content">
                    ` + text + `
                </div>
            </div>
        </div>
    `;

    $('.messages').append(htmlViewMessage);
}
