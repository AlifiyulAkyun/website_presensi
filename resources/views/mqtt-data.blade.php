<!DOCTYPE html>
<html>
<head>
    <title>MQTT Data</title>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="mqtt-data"></div>

    <script>
        window.Echo.channel('mqtt-messages')
            .listen('MqttMessageReceived', (e) => {
                let mqttData = document.getElementById('mqtt-data');
                mqttData.innerHTML = `
                    <p>Status: ${e.message.status}</p>
                    <p>Label: ${e.message.label}</p>
                    <p>Confident: ${e.message.confident}</p>
                    <p>Datetime: ${e.message.datetime}</p>
                `;
            });
    </script>
</body>
</html>