(()=>{
    let products = {
        maximumRecord:6,
        offsetData:0, 
        maxPageoffset:0,
        getProducts:()=>{
            $.ajax({
                url: APP_URL+'/btob/product/getProducts',
                type: "POST",
                data : {
                    "_token": $('#csrf-token')[0].content,  //pass the CSRF_TOKEN()
                    "maxData"    :100000,
                    "offsetData" :0
                },
                success: function(data){
                    console.log(data);
                    let tableData = '';
                    let tableItem = data.data;
                    tableItem.map((a)=>{
                        dateData = new Date(a.created_at); 
                        createdDate = [dateData.getMonth()+1,dateData.getDate(),dateData.getFullYear()].join('/')+' '+[dateData.getHours(),dateData.getMinutes(),dateData.getSeconds()].join(':');
                        tableData += '<tr>';
                        tableData += '<td>'+a.id+'</td>';
                        tableData += '<td>'+a.proname+'</td>';
                        tableData += '<td>'+createdDate+'</td>';
                        tableData += '<td class="text-center">\
                                        <div class="btn-group">\
                                            <button type="button" class="btn btn-primary btn-xs">Detail</button>\
                                            <button type="button" class="btn btn-danger btn-xs">Delete</button>\
                                            <button type="button" class="btn btn-primary btn-xs">Update</button>\
                                        </div>\
                                    </td>';
                        tableData += '</tr>';
                    });
                    $("#items").empty().append(tableData);
                    let paginationTag = '<li class="page-item page-item-pre" page-item-count="pre"><a class="page-link">Previous</a></li>';
                    
                    for(let i = 1; i <= data.dataCount; i++)
                    {
                        if(i == 1){
                            if(((products.offsetData / products.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }                            
                        }else{
                            if(((products.offsetData / products.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }
                            
                        }
                        
                    }
                    paginationTag += '<li class="page-item page-item-next" page-item-count="next"><a class="page-link">Next</a></li>';
                    $("#carate-pagination").empty().append(paginationTag);
                    products.maxPageoffset = data.dataCount;
                }
            });
        },
    };
    $(document).on("click",".page-item",function(){
        let pageNo = products.offsetData;
        if($($(this)[0]).attr('page-item-count') != 'pre' || $($(this)[0]).attr('page-item-count') != 'next'){
            pageNo = $($(this)[0]).attr('page-item-count') - 1;
        }
        if(isNaN($($(this)[0]).attr('page-item-count')))
        {
            if($($(this)[0]).attr('page-item-count') == 'pre'){
                if(products.offsetData != 0 ){
                    products.offsetData = products.offsetData - products.maximumRecord;
                                       
                }
            }else{
                if((products.offsetData) >= 0 && (products.offsetData < (products.maximumRecord * (products.maxPageoffset - 1)))){
                    products.offsetData = products.offsetData + products.maximumRecord;  
                }
            }
        }else
        {           
            products.offsetData = pageNo * products.maximumRecord;
        }
        console.log(products.offsetData);
        products.getProducts();        
        
    });
    $(document).ready(function(){
        products.getProducts();
    });
})();