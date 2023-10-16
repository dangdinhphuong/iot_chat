// System
var countSystem = 4;
let myChart1;
var nodeList = document.getElementById('nodeList');
var systemList = document.getElementById('systemList');
var TotalData = [];
$('#dataSytem').hide();
console.log(appUrl);
function callAPISystem(callbackNode) {
    $.ajax({
        url: appUrl+"api/cate/With/Node",
        method: "get",
        dataType: "json",
        success: function (response) {
            let data = TotalData = response;
            var html = ``;
            var htmlSystem = ``;
            for (let i = 0; i < data.length; i++) {
                let latest_node = data[i].latest_node;
                if (latest_node) {
                    var temperature = latest_node.temperature ?? "null";
                    var pressure = latest_node.pressure ?? "null";
                    var altitude_sea = latest_node.altitude_sea ?? "null";
                    var altitude_cm = latest_node.altitude_cm ?? "null";
                } else {
                    var temperature = "null";
                    var pressure = "null";
                    var altitude_sea = "null";
                    var altitude_cm = "null";
                }

                html += /*html*/ `
                <div class="col-xl-3 col-md-6 mb-4 " onclick="callAPIDataSystem(${data[i].id},'${data[i].name}')">
                                              <div class="card border-left-primary shadow h-100 py-2">
                                                  <div class="card-body">
                                                      <div class="row no-gutters align-items-center">
                                                          <div class="col mr-2">
                                                              <div class="h5 mb-0 font-weight-bold text-gray-800"> ${data[i].name}
                                                              </div>
                                                              <hr>
                                                              <div id="system-${data[i].id}">
                                                                <div class="mb-2"> Temperature: <b>${temperature}</b> <b>°C</b></div>
                                                                <div class="mb-2"> Pressure: <b>${pressure}</b> <b>pa</b></div>
                                                                <div class="mb-2"> Altitude_SEA: <b>${altitude_sea}</b> m<b></b>
                                                                <div class="mb-2"> Altitude_CM: <b>${altitude_cm}</b> <b>cm</b></div>
                                                                </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
              </div>
          `;
            }

            callbackNode(html);
            changeSystem(data);
        },
        error: function (xhr, status, error) {
            // Xử lý lỗi ở đây
            console.log(error);
            callbackNode("");
        }
    });
}

callAPISystem(
    function (html) {
        nodeList.innerHTML = html;
    }
);

function renderItemNode(data, number = 1) {
    var htmlRender = ``;
    var color = number == 1 ? "bg-success" : "bg-danger";
    data.filter(item => item.status === number).forEach(item => {
        // Thực hiện việc cập nhật giá trị của biến a
        htmlRender += `
        <tr>
        <td>${item.name}</td>
        <td>
            <div class="border rounded-circle ${color} "
                style="width:15px; height:15px"></div>
        </td>
        </tr>
        `;
    });
    return htmlRender;
}


function generateRandomArray() {
    var obj = {
        "cate_id": Math.floor(Math.random() * 4) + 1,
        "pressure": Math.random() * 10,
        "temperature": Math.random() * 1000000,
        "altitude_sea": Math.random() * 100,
        "altitude_cm": Math.random() * 100
    };
    return obj;
}

function generateOjb(data) {
    var htmlOjb = /*html*/ `
    <div class="mb-2"> Temperature: <b>${data.temperature}</b> <b>°C</b></div>
    <div class="mb-2"> Humidity: <b>${data.pressure}</b> <b>pa</b></div>
    <div class="mb-2"> Height above sea level: <b>${data.altitude_sea}</b> cm<b></b>
    </div>
    <div class="mb-2"> Actual height: <b>${data.altitude_cm}</b> <b>m</b></div>
`;
    document.getElementById('system-' + data.cate_id).innerHTML = htmlOjb;
}

// ---------- Trạng thái các trạm ---------------

function loadData() {
    console.log("loadData");
    $('#dataSytem').hide();
    callAPISystem(
        function (html) {
            nodeList.innerHTML = html;
        },
        function (htmlSystem) {
            systemList.innerHTML = htmlSystem;
        }
    );
}

// ------------------chart-----------------------

function callAPIDataSystem(id = 1, nameNode = 'node 1') {
    $('#dataSytem').show();
    $('#title_stytem').text(nameNode)
    $.ajax({
        url: appUrl+"api/chart/" + id,
        method: "get",
        dataType: "json",
        success: function (response) {
            let data = response.reverse();
            console.log('data', appUrl+"api/chart/" + id, data);
            var charArray = {
                temperature: [],
                pressure: [],
                altitude_sea: [],
                altitude_cm: [],
                created_at: [],
                name: nameNode
            };
            for (let i = 0; i < data.length; i++) {
                var obj = data[i];
                charArray["temperature"].push(Number(obj.temperature));
                charArray["pressure"].push(Number(obj.pressure));
                charArray["altitude_sea"].push(Number(obj.altitude_sea));
                charArray["altitude_cm"].push(Number(obj.altitude_cm));
                charArray["created_at"].push(formatDate(obj.created_at));
            }
            console.log('charArray', charArray);
            createChart(charArray);
        },
        error: function (xhr, status, error) {
        }
    });
}

function formatDate(datetime) {
    const date = new Date(datetime);
    const day = date.getDate();
    const dayWithOrdinal = day + (day % 10 === 1 && day !== 11 ? 'st' : day % 10 === 2 && day !== 12 ? 'nd' : day % 10 === 3 && day !== 13 ? 'rd' : 'th');
    const time = date.toLocaleTimeString('en-US', { hour12: false });
    return `${dayWithOrdinal}  ${time}`;
}

// Khởi tạo biểu đồ
function createChart(charArray) {
    const dataMyChart1 = {
        labels: charArray["created_at"],
        datasets: [
            {
                label: "Temperature",
                backgroundColor: "rgb(255, 99, 132)",
                borderColor: "rgb(255, 99, 132)",
                data: charArray["temperature"],
                tension: 0.3
            },
            {
                label: "Pressure",
                backgroundColor: "rgb(205, 0, 255)",
                borderColor: "rgb(205, 0, 255)",
                data: charArray["pressure"],
                tension: 0.3
            },
            {
                label: "Altitude sea",
                backgroundColor: "rgb(17, 144, 225)",
                borderColor: "rgb(17, 144, 225)",
                data: charArray["altitude_sea"],
                tension: 0.3
            },
            {
                label: "Altitude cm",
                backgroundColor: "rgb(129, 255, 17)",
                borderColor: "rgb(129, 255, 17)",
                data: charArray["altitude_cm"],
                tension: 0.3
            },
        ],
    };
    const configMyChart1 = {
        type: 'line',
        data: dataMyChart1
    }
    myChart1 = new Chart(document.getElementById("myChart1"), configMyChart1);
}

function updateLabel(newLabel) {
    labelBtn = newLabel;
    var count = 1
    myChart1.data.datasets.forEach((dataset) => {
        dataset.label = " " + count++;
        console.log(dataset.label);
    });
    myChart1.update();
    var buttons = document.getElementsByTagName("button");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].classList.remove("active");
        buttons[i].classList.replace("btn-primary", "btn-secondary");
    }

    // Thêm class "active" và thay đổi class từ "btn-secondary" sang "btn-primary" cho button được bấm
    event.target.classList.add("active");
    event.target.classList.replace("btn-secondary", "btn-primary");
}

// Cập nhật dữ liệu y4 sau mỗi 10 giây
// setInterval(() => {
//     myChart1.data.datasets[0].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
//     myChart1.data.datasets[1].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
//     myChart1.data.datasets[2].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
//     myChart1.data.datasets[3].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
//     myChart1.update();
//     var now = new Date();
//     var hours = now.getHours().toString().padStart(2, '0');
//     var minutes = now.getMinutes().toString().padStart(2, '0');
//     var currentTime = hours + ':' + minutes;
//     x1.push(currentTime);
//     if (x1.length > 7) {
//         x1.shift();
//     }


//     // generateOjb(generateRandomArray())
// }, 60000);

// Gọi hàm khởi tạo biểu đồ khi trang web được tải lên


// end chart

// realtime

const ws = new WebSocket('wss://hieuns-e3324e230c8a.herokuapp.com:443');

// Bắt đầu kết nối với server
ws.addEventListener('open', (event) => {
    console.log('Connected to server');
});

// Nhận dữ liệu từ server
ws.addEventListener('message', (event) => {
    try {
        const datas = JSON.parse(event.data);
        console.log(datas.type, datas.data);
        
        // Xử lý dữ liệu từ WebSocket
        datas.data.forEach(function (item) {
            const filteredNodes = TotalData.filter(node => node.id === item.cate_id);
            if (filteredNodes.length > 0) {
                filteredNodes.forEach(node => node.status = item.status);
            } else {
                console.warn(`No nodes found with id ${item.cate_id}`);
            }
            changeDataNode(item);
        });

        if (TotalData) {
            changeSystem(TotalData);
        }
    } catch (error) {
        if (event.data === "ping") {
            // Xử lý khi là "ping"
            console.log("Received ping message.");
        } else {
            console.error('Error processing WebSocket message:', error);
        }
    }
});


// Bị ngắt kết nối từ server
ws.addEventListener('close', (event) => {
    console.log('Disconnected from server');
});

function changeDataNode(data) {
    var html = /*html*/ `
            <div class="mb-2"> Temperature: <b>${data.temperature}</b> <b>°C</b></div>
            <div class="mb-2"> Pressure: <b>${data.pressure}</b> <b>pa</b></div>
            <div class="mb-2"> Altitude_SEA: <b>${data.altitude_sea}</b> m<b></b>
            <div class="mb-2"> Altitude_CM: <b>${data.altitude_cm}</b> <b>cm</b></div>
          `;
    var systemId = document.getElementById('system-' + data.cate_id);
    systemId.innerHTML = html;
}

function changeSystem(data) {
    let countStatus0 = data.filter(item => item.status === 0).length;
    let countStatus1 = data.filter(item => item.status === 1).length;
    console.log(data, (countStatus0 / data.length) * 100);
    let totalCountStatus0 = (countStatus0 / data.length) * 100;
    let totalCountStatus1 = (countStatus1 / data.length) * 100;
    var htmlSystem = /*html*/`
                <div class="col-sm-3 d-flex flex-row">
                    <div class="col-12 mr-2 mb">
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> Overview
                        </div>
                        <hr>
                        <div class="mb-2"> Total number of stations: <b style="font-size: 20px;">${data.length}</b></div>

                        <div class="mb-2"> Operation: <b>${countStatus1}<i style="float: right;">(${totalCountStatus1}%)</i></b></div>
                        <div class="progress progress-sm mr-2 mb-2">
                            <div class="progress-bar bg-info bg-success" role="progressbar"
                                style="width: ${totalCountStatus1}%" aria-valuenow="50" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                        </div>

                        <div class="mb-2"> Disconect : <b>${countStatus0} <i style="float: right;">(${totalCountStatus0}%)</i></b>
                        </div>
                        <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info  bg-danger" role="progressbar"
                                style="width: ${totalCountStatus0}%" aria-valuenow="50" aria-valuemin="0"
                                aria-valuemax="100">
                            </div>
                          </div>
                    </div>
                    <div style="width:150px" class="col mr-2">
                    <canvas id="myCanvas"></canvas>
               </div>
                </div>
            `;

    htmlSystem += `
            <div class="col-sm-5">
            <div class="card">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Operation</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                </table>
                <div style="height: 200px; overflow-y: scroll;">
                    <table class="table table-striped">
                        <tbody>
                        ${renderItemNode(data, 1)}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-sm-4">
        <div class="card">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Disconect </th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
            </table>
            <div style="height: 200px; overflow-y: scroll;">
                <table class="table table-striped">
                    <tbody>
                    ${renderItemNode(data, 0)}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
            `;
    var systemId = document.getElementById('system-' + data.cate_id);
    systemList.innerHTML = htmlSystem;
}

