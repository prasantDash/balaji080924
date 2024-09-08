(()=>{
    let purchesObj = {
        products:[],
        items:[],
        itemChange: $('#item_id'),
        lessWeight: $("#less"),
        weight: $("#weight"),
        netweight: $("#netweight"),
        crate:[],
        optionCaratItem:'',
        getCarate:()=>{
            $.ajax({
                url: APP_URL+'/btob/item/fetchCarateItems',
                type: "POST",
                data : {
                    "_token": $('#csrf-token')[0].content,  //pass the CSRF_TOKEN()
                    "maxData"    :100000,
                    "offsetData" :0
                },
                success: function(data){
                    console.log(data.data);
                    purchesObj.crate = data.data;                    
                }
            });
        },
        getItems: () => {
            $.ajax({
                url: APP_URL+'/btob/item/getItems',
                type: "POST",
                data : {
                    "_token": $('#csrf-token')[0].content,  //pass the CSRF_TOKEN()
                    "maxData"    :100000,
                    "offsetData" :0
                },
                success: function(data){
                    console.log(data.data);
                    purchesObj.items = data.data;
                    let items = '';
                    items += '<option value="">Select</option>';
                    purchesObj.items.map((a)=>{
                        items += '<option value="'+a.id+'">'+a.itemname+'</option>';
                    });
                    $("#item_id").empty().append(items);
                }
            });
        },
        getProducts: ()  =>{
            $.ajax({
                url: APP_URL+'/btob/product/getProducts',
                type: "POST",
                data : {
                    "_token": $('#csrf-token')[0].content,  //pass the CSRF_TOKEN()
                    "maxData"    :100000,
                    "offsetData" :0
                },
                success: function(data){
                    purchesObj.getProducts = data.data;
                    let items = '';
                    items += '<option value="">Select</option>';
                    purchesObj.getProducts.map((a)=>{
                        items += '<option value="'+a.id+'">'+a.proname+'</option>';
                    });
                    $("#product").empty().append(items);
                }
            });
        },
    };
    $(document).ready(function(){
        purchesObj.getProducts();
        purchesObj.getItems();
        purchesObj.getCarate();
    });
    $(purchesObj.itemChange).on('change',function(){
        purchesObj.optionCaratItem = '<option value="">Select</option>';
        purchesObj.crate.map((a)=>{
            if($(this).val() == a.item_id){
                purchesObj.optionCaratItem += '<option value="'+a.id+'">'+a.itemcarat+'</option>';
            }            
        });
        $("#carat_id").empty().append(purchesObj.optionCaratItem);        
    });
    $(purchesObj.lessWeight).on('keyup',function(){
        if($(purchesObj.weight).val() == ''){
            alert("Insert weight");
            $(this).val("");
            return false;
        }else{
            let weight = $(purchesObj.weight).val();
            $(purchesObj.netweight).val(weight - $(this).val());
        }
    });    
})();