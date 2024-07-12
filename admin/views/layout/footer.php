</div>



<!-------complete html----------->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="./lib/js/jquery-3.3.1.slim.min.js"></script>
<script src="./lib/js/popper.min.js"></script>
<script src="./lib/js/bootstrap.min.js"></script>
<script src="./lib/js/jquery-3.3.1.min.js"></script>
<script src="./lib/js/Ajax.js"></script>
<script src="./lib/js/setup.js"></script>


<script type="text/javascript">
   $(document).ready(function() {
      $(".xp-menubar").on('click', function() {
         $("#sidebar").toggleClass('active');
         $("#content").toggleClass('active');
      });

      $('.xp-menubar,.body-overlay').on('click', function() {
         $("#sidebar,.body-overlay").toggleClass('show-nav');
      });

   });

<<<<<<< HEAD

   

   // Tạo một đối tượng để lưu trữ dữ liệu từ các thẻ <th> của mỗi dòng

=======
   

   var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line', // Loại biểu đồ: line, bar, pie, etc.
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
            label: 'Dataset 1',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'Dataset 2',
            data: [28, 48, 40, 19, 86, 27, 90],
            fill: false,
            borderColor: 'rgb(255, 99, 132)',
            tension: 0.1
        },
        {
            label: 'Dataset 3',
            data: [45, 33, 22, 17, 75, 50, 40],
            fill: false,
            borderColor: 'rgb(54, 162, 235)',
            tension: 0.1
        }],
              
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
>>>>>>> 420a674301ecef7cfb84ce9a06116e5530025486
</script>





</body>

</html>