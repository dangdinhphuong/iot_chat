// System
var countSystem = 4;
function callAPI(callback) {
    $.ajax({
        url: "https://iot-dem-v2.000webhostapp.com/api/cate/With/Node",
        method: "get",
        dataType: "json",
        success: function (response) {
            let data = response;
            console.log(data);
            var html = ``;
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
                <div class="col-xl-3 col-md-6 mb-4 " data-toggle="modal"
                                               data-target="#exampleModalCenter">
                                              <div class="card border-left-primary shadow h-100 py-2">
                                                  <div class="card-body">
                                                      <div class="row no-gutters align-items-center">
                                                          <div class="col mr-2">
                                                              <div class="h5 mb-0 font-weight-bold text-gray-800"> ${data[i].name}
                                                              </div>
                                                              <hr>
                                                              <div id="system-${data[i].id}">
                                                                <div class="mb-2"> Temperature: <b>${temperature}</b> <b>°C</b></div>
                                                                <div class="mb-2"> Humidity: <b>${pressure}</b> <b>pa</b></div>
                                                                <div class="mb-2"> Height above sea level: <b>${altitude_sea}</b> cm<b></b>
                                                                </div>
                                                                <div class="mb-2"> Actual height: <b>${altitude_cm}</b> <b>m</b></div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
              </div>
          `;
            }
            callback(html);
        },
        error: function (xhr, status, error) {
            // Xử lý lỗi ở đây
            console.log(error);
            callback("");
        }
    });
}

var row = document.getElementById('systemList');
callAPI(function (html) {
    row.innerHTML = html;
});




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
    document.getElementById('system-'+data.cate_id).innerHTML = htmlOjb;
}


// const row = document.getElementById('systemList');
// row.innerHTML = callAPI();

// chart

var x1 = [
    '12:30',
    '12:31',
    '12:32',
    '12:33',
    '12:34',
    '12:35',
    '12:36'
]
var y1 = [10000, 50, 0, 60, 90, 890, 542, 6];
var y2 = [10, 50, 10, 610, 290, 890, 542, 5];
var y3 = [1, 50, 220, 640, 970, 890, 42, 4];
var y4 = [];
var labelBtn = "Temperature";
let myChart1;
// Khởi tạo biểu đồ
function createChart() {
    const dataMyChart1 = {
        labels: x1,
        datasets: [
            {
                label: labelBtn + " 1",
                backgroundColor: "rgb(255, 99, 132)",
                borderColor: "rgb(255, 99, 132)",
                data: y1,
                tension: 0.3
            },
            {
                label: labelBtn + " 2",
                backgroundColor: "rgb(205, 0, 255)",
                borderColor: "rgb(205, 0, 255)",
                data: y2,
                tension: 0.3
            },
            {
                label: labelBtn + " 3",
                backgroundColor: "rgb(17, 144, 225)",
                borderColor: "rgb(17, 144, 225)",
                data: y3,
                tension: 0.3
            },
            {
                label: labelBtn + " 4",
                backgroundColor: "rgb(129, 255, 17)",
                borderColor: "rgb(129, 255, 17)",
                data: y4,
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
        dataset.label = labelBtn + " " + count++;
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
setInterval(() => {
    myChart1.data.datasets[0].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
    myChart1.data.datasets[1].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
    myChart1.data.datasets[2].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
    myChart1.data.datasets[3].data = [Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random(), Math.random()];
    myChart1.update();
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var currentTime = hours + ':' + minutes;
    x1.push(currentTime);
    if (x1.length > 7) {
        x1.shift();
    }

    callAPI(function (html) {
        row.innerHTML = html;
    });
    // generateOjb(generateRandomArray())
}, 60000);

// Gọi hàm khởi tạo biểu đồ khi trang web được tải lên
createChart();

// end chart