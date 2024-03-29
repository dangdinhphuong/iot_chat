<!DOCTYPE html>
<html>
<head>
    <title>Send Data to WebSocket Server</title>
</head>
<body>
<form id="myForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Send</button>
</form>

<script>
    var data = {name: "phương"};
    var url = new URL('wss://hieuns-e3324e230c8a.herokuapp.com:443/controller');
    url.searchParams.set('data', JSON.stringify(data));
    var conn = new WebSocket(url.href);

    // Gửi dữ liệu sau khi WebSocket đã kết nối
    conn.onopen = function(event) {
        var message = {
            command: "groupchat",
            message: "name",
            channel: "global"
        };
        conn.send(JSON.stringify(message));
    };

    // Lắng nghe các tin nhắn trả về từ server
    conn.onmessage = function(event) {
        if(event.data){
            var message = JSON.parse(event.data);
            console.log('Received message:', message);
        }
    };

</script>
</body>
</html>
