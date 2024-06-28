</div>



<!-------complete html----------->






<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="./lib/js/jquery-3.3.1.slim.min.js"></script>
<script src="./lib/js/popper.min.js"></script>
<script src="./lib/js/bootstrap.min.js"></script>
<script src="./lib/js/jquery-3.3.1.min.js"></script>


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

   // Tạo một đối tượng để lưu trữ dữ liệu từ các thẻ <th> của mỗi dòng
   function loadedit(id) {

      const tbody = document.querySelector('tbody.list');

      // Lấy tất cả các thẻ <tr> trong <tbody>
      const trElements = tbody.querySelectorAll('tr');

      // Tạo một mảng để chứa dữ liệu từ các thẻ <th>
      const tableData = [];

      // Lặp qua từng thẻ <tr>
      trElements.forEach((tr) => {
         // Lấy tất cả các thẻ <th> trong <tr> hiện tại
         const thElements = tr.querySelectorAll('th');

         // Tạo một đối tượng để lưu trữ dữ liệu từ các thẻ <th> của mỗi dòng
         const rowData = {};

         // Lặp qua từng thẻ <th> và lấy nội dung
         thElements.forEach((th, index) => {
            // Dùng index của mỗi thẻ <th> để biết nội dung tương ứng
            switch (index) {
               case 1:
                  rowData.product_id = th.textContent.trim();
                  break;
               case 2:
                  rowData.product_name = th.textContent.trim();
                  break;
               case 3:
                  rowData.product_price = th.textContent.trim();
                  break;
               case 4:
                  rowData.product_des = th.textContent.trim();
                  break;
               case 5:
                  rowData.product_quantity = th.textContent.trim();
                  break;
               case 6:
                  rowData.category_id = th.textContent.trim();
                  break;

               default:
                  // Thực hiện gì đó nếu cần thiết
                  break;
            }
         });

         // Thêm đối tượng dữ liệu của dòng hiện tại vào mảng tableData
         tableData.push(rowData);
      });

      var b = tableData.find(obj => obj.product_id == id);


      document.getElementById('pr_name').value = b.product_name;
      document.getElementById('pr_price').value = 100;
      document.getElementById('pr_quantity').value = b.product_quantity;
      document.getElementById('pr_des').value = b.product_des;
      const category = document.getElementById('cate_id');
      const option = 'option[value="' + b.category_id + '"]';

      const optionToSelect = category.querySelector(option);
      if (optionToSelect) {
         optionToSelect.selected = true;
      } else {
         console.error('Option with value "1" not found.');
      }

      // Thiết lập option có value là '1' là selected


   };
</script>





</body>

</html>