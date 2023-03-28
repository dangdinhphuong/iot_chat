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
    var url = new URL('wss://socket-server-demo.herokuapp.com:443');
    url.searchParams.set('data', JSON.stringify(data));
    var conn = new WebSocket(url.href);

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
