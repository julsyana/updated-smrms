var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July','Aug','Sept','Oct','Nov','Dec'],
    datasets: [{
        label: 'Student',
        data: [0, 6,10,20],
        backgroundColor: [
            'rgba(255, 99, 132)',
            'rgba(54, 162, 235)',
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)',
            'rgba(255, 159, 64)',
            'rgba(255, 99, 132)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)'
        ],
        borderWidth: 2
    }]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});