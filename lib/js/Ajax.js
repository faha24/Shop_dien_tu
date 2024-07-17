
function get_pr_edit(id){
    var xhr = new XMLHttpRequest();
    var url = "index.php?mode=admin&act=getdata";
 
 xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE) {
         if (xhr.status === 200) {
             var products = JSON.parse(xhr.response);
             console.log(products); 
             loadedit(id,products);
            
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


    var product = tableData.find(obj => obj.id == id);
    if (product) {
        const formMapping = {
            'id_pr': 'id',
            'product_name': 'product_name',
            'product_price': 'price',
            'product_price': 'price',
            'product_quantity': 'stock',
            'product_des': 'product_des'
        };
    
        for (const [formId, productKey] of Object.entries(formMapping)) {
            const formElement = document.getElementById(formId);
            if (formElement) {
                formElement.value = product[productKey];
            }
        }
    }

    // document.getElementById('pr_name').value = b.product_name;
    // document.getElementById('pr_id').value = b.product_id;
    // document.getElementById('pr_price').value = b.product_quantity ;
    // document.getElementById('pr_quantity').value = b.product_quantity;
    // document.getElementById('pr_des').value = b.product_des;
    const category = document.getElementById('cate_id');
    const option = 'option[value="' + product.category_id + '"]';
    console.log(option);

    const optionToSelect = category.querySelector(option);
    if (optionToSelect) {
       optionToSelect.selected = true;
    } else {
       console.error('Option with value "1" not found.');
    }

    // Thiết lập option có value là '1' là selected


 };
 