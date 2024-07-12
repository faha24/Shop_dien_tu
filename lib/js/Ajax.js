
function get_pr_edit(id){
    var xhr = new XMLHttpRequest();
    var url = "index.php?mode=admin&act=getdata";
 
 xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
             var users = JSON.parse(xhr.response);
             console.log(users); 
             loadedit(id,users);
             return users;
         } else {
             console.error('Request failed. Status: ' + xhr.status);
         }
     }
 };
 xhr.open("GET", url, true);
 xhr.send();


}

function loadedit(id,data) {

    const tbody = document.querySelector('tbody.list');


    const trElements = tbody.querySelectorAll('tr');

   
     const tableData = data;


    var b = tableData.find(obj => obj.id == id);


    document.getElementById('pr_name').value = b.product_name;
    document.getElementById('pr_id').value = b.product_id;
    document.getElementById('pr_price').value = b.product_quantity ;
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
